@extends('dashboard.components.auth')

@section('content')
<main class="main-content">
    <h4 class="font-weight-bolder ms-4">Create Seminar</h4>
    <div class="content mt-4">
        <form action="{{ route('seminars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" class="form-control" id="img" name="img" accept="image/*">
            </div>

            <!-- Detail Seminar Fields -->
            <div class="form-group">
                <label for="nama_mc">Nama MC</label>
                <input type="text" class="form-control" id="nama_mc" name="nama_mc">
            </div>
            <div class="form-group">
                <label for="bio_mc">Bio MC</label>
                <textarea class="form-control" id="bio_mc" name="bio_mc"></textarea>
            </div>
            <div class="form-group">
                <label for="keuntungan">Keuntungan</label>
                <div id="keuntungan-container">
                    <div class="keuntungan-item mb-2">
                        <input type="text" class="form-control" name="keuntungan[]" placeholder="Keuntungan 1">
                    </div>
                </div>
                <button type="button" id="add-keuntungan" class="btn btn-primary mt-2">Add More</button>
            </div>
            <div class="form-group">
                <label for="info_tambahan">Info Tambahan</label>
                <textarea class="form-control" id="info_tambahan" name="info_tambahan"></textarea>
            </div>
            <div class="form-group">
                <label for="waktu_mulai">Waktu Mulai</label>
                <input type="time" class="form-control" id="waktu_mulai" name="waktu_mulai">
            </div>
            <div class="form-group">
                <label for="waktu_berakhir">Waktu Berakhir</label>
                <input type="time" class="form-control" id="waktu_berakhir" name="waktu_berakhir">
            </div>
            <div class="form-group">
                <label for="foto_seminar">Foto Seminar (Multiple)</label>
                <input type="file" class="form-control" id="foto_seminar" name="foto_seminar[]" multiple>
            </div>
            <div class="form-group">
                <label for="foto_ruangan">Foto Ruangan (Multiple)</label>
                <input type="file" class="form-control" id="foto_ruangan" name="foto_ruangan[]" multiple>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
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