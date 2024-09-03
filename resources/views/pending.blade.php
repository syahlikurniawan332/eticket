@extends('layouts.app')

@section('title', 'Pembayaran Pending')

<x-app>
    <div class="container my-5 text-center">
        <h1 class="mb-4">Pembayaran Anda Sedang Diproses</h1>
        <p>Mohon tunggu beberapa saat. Pembayaran Anda sedang diproses oleh sistem.</p>
        <a class="btn btn-primary" href="{{ url('/') }}">Kembali ke Beranda</a>
    </div>
</x-app>
@endsection
