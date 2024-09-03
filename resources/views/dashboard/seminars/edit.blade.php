@extends('dashboard.components.auth')

@section('content')
<main class="main-content">
    <h4 class="font-weight-bolder ms-4">Edit Seminar</h4>
    <form action="{{ route('seminars.update', $seminar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $seminar->title) }}">
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $seminar->date) }}">
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $seminar->location) }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $seminar->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" name="img" id="img" class="form-control">
            @if ($seminar->img)
            <img src="{{ asset('images/' . $seminar->img) }}" alt="Seminar Image" style="max-width: 200px; margin-top: 10px;">
            @endif
        </div>

        <!-- Include fields for detail seminar here -->
        <div class="form-group">
            <label for="nama_mc">Nama MC</label>
            <input type="text" name="nama_mc" id="nama_mc" class="form-control" value="{{ old('nama_mc', $detailSeminar->nama_mc ?? '') }}">
        </div>

        <div class="form-group">
            <label for="bio_mc">Bio MC</label>
            <textarea name="bio_mc" id="bio_mc" class="form-control">{{ old('bio_mc', $detailSeminar->bio_mc ?? '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="keuntungan">Keuntungan</label>
            <div id="keuntungan-container">
                @foreach (is_array($detailSeminar->keuntungan) ? $detailSeminar->keuntungan : [] as $index => $item)
                <div class="keuntungan-item mb-2">
                    <input type="text" class="form-control" name="keuntungan[]" value="{{ $item }}" placeholder="Keuntungan {{ $index + 1 }}">
                </div>
                @endforeach
            </div>
            <button type="button" id="add-keuntungan" class="btn btn-primary mt-2">Add More</button>
        </div>

        <div class="form-group">
            <label for="info_tambahan">Info Tambahan</label>
            <textarea name="info_tambahan" id="info_tambahan" class="form-control">{{ old('info_tambahan', $detailSeminar->info_tambahan ?? '') }}</textarea>
        </div>

        <label for="waktu_mulai">Waktu Mulai:</label>
        <input type="time" id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai', $detailSeminar->waktu_mulai ?? '') }}">

        <label for="waktu_berakhir">Waktu Berakhir:</label>
        <input type="time" id="waktu_berakhir" name="waktu_berakhir" value="{{ old('waktu_berakhir', $detailSeminar->waktu_berakhir ?? '') }}">

        <div class="form-group">
            <label for="foto_seminar">Foto Seminar</label>
            <input type="file" name="foto_seminar[]" id="foto_seminar" class="form-control" multiple>
            @if ($detailSeminar && $detailSeminar->foto_seminar)
            @foreach (json_decode($detailSeminar->foto_seminar, true) as $foto)
            <img src="{{ asset('images/' . $foto) }}" alt="Foto Seminar" style="max-width: 100px; margin-top: 10px;">
            @endforeach
            @endif
        </div>

        <div class="form-group">
            <label for="foto_ruangan">Foto Ruangan</label>
            <input type="file" name="foto_ruangan[]" id="foto_ruangan" class="form-control" multiple>
            @if ($detailSeminar && $detailSeminar->foto_ruangan)
            @foreach (json_decode($detailSeminar->foto_ruangan, true) as $foto)
            <img src="{{ asset('images/' . $foto) }}" alt="Foto Ruangan" style="max-width: 100px; margin-top: 10px;">
            @endforeach
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Seminar</button>
    </form>
</main>

<script>
    document.getElementById('add-keuntungan').addEventListener('click', function() {
        const container = document.getElementById('keuntungan-container');
        const newInput = document.createElement('div');
        newInput.className = 'keuntungan-item mb-2';
        newInput.innerHTML = '<input type="text" class="form-control" name="keuntungan[]" placeholder="Keuntungan ' + (container.children.length + 1) + '">';
        container.appendChild(newInput);
    });
</script>
@endsection