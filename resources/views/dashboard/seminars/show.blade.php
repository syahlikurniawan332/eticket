@extends('dashboard.components.auth')

@section('content')
<main class="main-content">
    <h4 class="font-weight-bolder ms-4">Detail Seminar</h4>
    <div class="content mt-4">
        <h5>{{ $seminar->title }}</h5>
        <p><strong>Date:</strong> {{ $seminar->date }}</p>
        <p><strong>Location:</strong> {{ $seminar->location }}</p>
        <p>{{ $seminar->description }}</p>

        @if($seminar->img)
        <div class="mt-3">
            <img src="{{ asset('images/' . $seminar->img) }}" alt="Seminar Image" class="img-fluid" style="max-width: 400px;">
        </div>
        @endif

        <h5 class="mt-4">Detail Seminar</h5>
        @if($seminar->detailSeminar)
        <p><strong>Nama MC:</strong> {{ $seminar->detailSeminar->nama_mc }}</p>
        <p><strong>Bio MC:</strong> {{ $seminar->detailSeminar->bio_mc }}</p>

        <p><strong>Keuntungan:</strong></p>
        @if(is_array($seminar->detailSeminar->keuntungan) && !empty($seminar->detailSeminar->keuntungan))
        <ul>
            @foreach($seminar->detailSeminar->keuntungan as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
        @else
        <p>No keuntungan available.</p>
        @endif

        <p><strong>Info Tambahan:</strong> {{ $seminar->detailSeminar->info_tambahan }}</p>
        <p><strong>Waktu Mulai:</strong> {{ $seminar->detailSeminar->waktu_mulai }}</p>
        <p><strong>Waktu Berakhir:</strong> {{ $seminar->detailSeminar->waktu_berakhir }}</p>

        @if(is_array($seminar->detailSeminar->foto_seminar))
        <div class="mt-3">
            <h6>Foto Seminar:</h6>
            @foreach($seminar->detailSeminar->foto_seminar as $foto)
            <img src="{{ asset('images/' . $foto) }}" alt="Foto Seminar" class="img-fluid" style="max-width: 200px; margin-right: 10px;">
            @endforeach
        </div>
        @endif

        @if(is_array($seminar->detailSeminar->foto_ruangan))
        <div class="mt-3">
            <h6>Foto Ruangan:</h6>
            @foreach($seminar->detailSeminar->foto_ruangan as $foto)
            <img src="{{ asset('images/' . $foto) }}" alt="Foto Ruangan" class="img-fluid" style="max-width: 200px; margin-right: 10px;">
            @endforeach
        </div>
        @endif
        @else
        <p>Detail tidak tersedia untuk seminar ini.</p>
        @endif

        <a href="{{ route('dashboard.seminarM') }}" class="btn btn-primary mt-3">Kembali ke Daftar</a>
    </div>
</main>
@endsection