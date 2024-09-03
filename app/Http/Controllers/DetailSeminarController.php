<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use App\Models\DetailSeminar;

class DetailSeminarController extends Controller
{
    public function showDetail($id)
    {
        // Ambil seminar berdasarkan ID dan sertakan detail dan tiketnya
        $seminar = Seminar::with('detailSeminar', 'tickets')->findOrFail($id);

        // Jika data sudah berupa string JSON, lakukan json_decode
        $seminar->detailSeminar->foto_seminar = json_decode($seminar->detailSeminar->foto_seminar, true);
        $seminar->detailSeminar->foto_ruangan = json_decode($seminar->detailSeminar->foto_ruangan, true);
        // $seminar->detailSeminar->keuntungan = json_decode($seminar->detailSeminar->keuntungan, true);

        // Hitung total tiket
        $totalTickets = $seminar->tickets->sum('quantity');

        // Di dalam controller, pastikan tanggal diformat dengan benar sebelum dikirim ke view
        $seminarDate = \Carbon\Carbon::parse($seminar->date)->format('Y-m-d');

        // Ambil nama MC dari detail seminar
        $mcName = $seminar->detailSeminar->nama_mc;

        // Ambil seminar mendatang yang diadakan oleh MC yang sama
        $upcomingEvents = Seminar::where('id', '!=', $seminar->id) // Jangan ambil seminar yang sedang ditampilkan
            ->whereHas('detailSeminar', function ($query) use ($mcName) {
                $query->where('nama_mc', $mcName); // Filter berdasarkan nama MC
            })
            ->where('date', '>', now()) // Hanya acara mendatang
            ->orderBy('date', 'asc') // Urutkan berdasarkan tanggal
            ->get();

        // Kirim data ke view
        return view('pageTiket', compact('seminar', 'totalTickets', 'seminarDate', 'upcomingEvents'));
    }

    protected function handleMultipleFileUpload($files)
    {
        $filePaths = [];

        if ($files) {
            foreach ($files as $file) {
                $fileName = time() . '.' . $file->extension();
                $file->move(public_path('images'), $fileName);
                $filePaths[] = $fileName;
            }
        }

        // Mengembalikan string JSON dari array file paths
        return json_encode($filePaths);
    }
}
