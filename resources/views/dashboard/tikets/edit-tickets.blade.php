@extends('dashboard.components.auth')

@section('content')
<main class="main-content">
    <h4 class="font-weight-bolder ms-4">Edit Tiket</h4>
    <div class="content mt-4">
        <form action="{{ route('tickets.update', $ticket->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="seminar_id">Nama Acara</label>
                <select class="form-control" id="seminar_id" name="seminar_id" required>
                    @foreach ($seminars as $seminar)
                    <option value="{{ $seminar->id }}" {{ $seminar->id == $ticket->seminar_id ? 'selected' : '' }}>
                        {{ $seminar->title }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_tiket">Jenis Tiket</label>
                <select class="form-control" id="jenis_tiket" name="jenis_tiket" required>
                    <option value="">Pilih Jenis Tiket</option>
                    <option value="Umum" {{ $ticket->jenis_tiket == 'Umum' ? 'selected' : '' }}>Umum</option>
                    <option value="Mahasiswa" {{ $ticket->jenis_tiket == 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" step="0.01" value="{{ $ticket->harga }}" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $ticket->quantity }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</main>
@endsection