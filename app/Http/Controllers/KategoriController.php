<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seminar;

class KategoriController extends Controller
{

    public function index()
    {
        // Ambil seminar dengan kategori Umum dan Mahasiswa
        $seminars = Seminar::with('tickets')->get();

        // Kategorikan seminar berdasarkan jenis tiket
        $categories = [
            'Umum' => $seminars->filter(function ($seminar) {
                return $seminar->tickets->contains('jenis_tiket', 'Umum');
            }),
            'Mahasiswa' => $seminars->filter(function ($seminar) {
                return $seminar->tickets->contains('jenis_tiket', 'Mahasiswa');
            }),
        ];

        return view('kategori', ['categories' => $categories]);
    }
}
