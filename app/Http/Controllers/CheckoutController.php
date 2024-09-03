<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Ticket;
use App\Models\Seminar;
use App\Models\Checkout;
use App\Models\Revenue;
use Midtrans\Snap;
use App\Mail\CheckoutNotification;
use App\Mail\TransactionSuccess;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $quantity = $request->input('quantity', 1);

        // Dapatkan seminar dan tiket dari request
        $seminar = Seminar::findOrFail($request->input('seminar_id'));
        $ticket = Ticket::findOrFail($request->input('ticket_id'));

        return view('checkout', compact('seminar', 'ticket', 'quantity'));
    }

    public function process(Request $request)
    {
        // Validasi input
        $request->validate([
            'seminar_id' => 'required|exists:seminars,id',
            'ticket_id' => 'required|exists:tickets,id',
            'quantity' => 'required|integer|min:1',
            'buyer_name' => 'required|string',
            'buyer_email' => 'required|email',
            'buyer_phone' => 'required|string',
        ]);

        // Set konfigurasi Midtrans
        \Midtrans\Config::$serverKey = 'SB-Mid-server-_dxwIVpJXpgoZa6Sa3C4vOLP';
        \Midtrans\Config::$clientKey = 'SB-Mid-client-io_wYPcSlLKVXoC6';
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $ticket = Ticket::findOrFail($request->ticket_id);
        $seminar = Seminar::findOrFail($request->seminar_id);
        $quantity = $request->input('quantity', 1);
        $grossAmount = $quantity * $ticket->harga;

        // Simpan data transaksi ke database dengan status pending
        $checkout = Checkout::create([
            'seminar_id' => $seminar->id,
            'ticket_id' => $ticket->id,
            'quantity' => $quantity,
            'total_price' => $grossAmount,
            'buyer_name' => $request->input('buyer_name'),
            'buyer_email' => $request->input('buyer_email'),
            'buyer_phone' => $request->input('buyer_phone'),
            'payment_status' => 'pending',
        ]);

        // Data transaksi untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $checkout->id,
                'gross_amount' => $grossAmount,
            ],
            'item_details' => [
                [
                    'id' => $ticket->id,
                    'price' => $ticket->harga,
                    'quantity' => $quantity,
                    'name' => $seminar->title,
                ],
            ],
            'customer_details' => [
                'first_name' => $checkout->buyer_name,
                'email' => $checkout->buyer_email,
                'phone' => $checkout->buyer_phone,
            ],
            'callbacks' => [
                'finish' => route('checkout.success')
            ],
        ];

        try {
            // Buat transaksi dengan Midtrans dan dapatkan redirect URL
            $transaction = Snap::createTransaction($params);

            // Simpan token transaksi ke dalam checkout
            $checkout->payment_id = $transaction->token;
            $checkout->save();

            // Kirim email ke pelanggan setelah transaksi berhasil dibuat
            Mail::to($checkout->buyer_email)->send(new CheckoutNotification($checkout, $transaction->redirect_url));

            // Redirect ke halaman pembayaran Midtrans
            return redirect($transaction->redirect_url);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function notificationHandler(Request $request)
    {
        // Ambil notifikasi dari Midtrans
        $json = json_decode($request->getContent(), true);

        $transactionStatus = $json['transaction_status'];
        $orderId = $json['order_id'];

        // Cari checkout berdasarkan order_id
        $checkout = Checkout::find($orderId);

        if ($checkout) {
            switch ($transactionStatus) {
                case 'capture':
                case 'settlement':
                    $checkout->payment_status = 'success';
                    break;
                case 'pending':
                    $checkout->payment_status = 'pending';
                    break;
                case 'deny':
                case 'expire':
                case 'cancel':
                    $checkout->payment_status = 'failed';
                    break;
            }

            // Simpan status terbaru ke database
            $checkout->save();
        }

        return response()->json(['status' => 'OK']);
    }

    public function success(Request $request)
{
    // Ambil order_id dari request
    $order_id = $request->input('order_id');

    // Temukan data checkout berdasarkan order_id
    $checkout = Checkout::where('id', $order_id)->first();

    if ($checkout) {
        // Update status pembayaran di tabel checkout
        $checkout->payment_status = 'success';
        $checkout->save();

        // Ambil tiket yang terkait dengan transaksi
        $ticket = Ticket::find($checkout->ticket_id);

        if ($ticket) {
            // Kurangi stok tiket berdasarkan quantity yang dibeli
            $ticket->quantity -= $checkout->quantity;
            $ticket->save();
        }

        // Tambahkan data pendapatan ke tabel revenues
        Revenue::create([
            'seminar_id' => $checkout->seminar_id,
            'amount' => $checkout->total_price,
        ]);

        // Ambil seminar terkait
        $seminar = Seminar::find($checkout->seminar_id);

        if ($seminar) {
            // Kirim email konfirmasi
            Mail::to($checkout->buyer_email)->send(new TransactionSuccess($checkout, $seminar));
        }
    } else {
        return redirect('/')->with('error', 'Order not found');
    }

    if (!$seminar) {
        return redirect('/')->with('error', 'Seminar not found');
    }

    // Tentukan halaman sukses berdasarkan status pembayaran
    if ($checkout->payment_status == 'success') {
        return view('success', compact('checkout', 'seminar'));
    } elseif ($checkout->payment_status == 'pending') {
        return view('pending', compact('checkout', 'seminar'));
    } else {
        return view('failed', compact('checkout', 'seminar'));
    }
}

}
