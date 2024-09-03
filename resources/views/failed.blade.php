@extends('layouts.app')

@section('title', 'Pembayaran Gagal')

<x-app>
    <div class="container my-5 text-center">
        <h1 class="mb-4">Pembayaran Gagal</h1>
        <p>Maaf, pembayaran Anda tidak berhasil. Silakan coba lagi atau hubungi layanan pelanggan jika masalah berlanjut.</p>
        <a class="btn btn-danger" href="{{ url('/') }}">Kembali ke Beranda</a>
    </div>
</x-app>
@endsection
