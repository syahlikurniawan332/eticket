<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class TransactionSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $checkout;
    public $seminar;
    public $qrCodeImage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($checkout, $seminar)
    {
        $this->checkout = $checkout;
        $this->seminar = $seminar;

        // Generate QR code as base64 image
        $qrCode = new QrCode(
            "Order ID: {$checkout->payment_id}, Nama Seminar: {$seminar->title}, Nama Pembeli: {$checkout->buyer_name}, Total Harga: Rp " . number_format($checkout->total_price, 0, ',', '.')
        );
        $qrCode->setSize(200);
        
        $writer = new PngWriter();
        $result = $writer->write($qrCode);

        $this->qrCodeImage = base64_encode($result->getString());
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.transaction_success')
                    ->subject('Payment Successful - Ticket Confirmation');
    }
}
