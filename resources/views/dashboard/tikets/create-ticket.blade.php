@extends('dashboard.components.auth')

@section('content')
<main class="main-content">
    @if ($errors->has('error'))
    <div class="alert alert-danger">
        {{ $errors->first('error') }}
    </div>
    @endif
    <h4 class="font-weight-bolder ms-4">Tambah Tiket</h4>
    <div class="content mt-4">
        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="seminar_id">Nama Acara</label>
                <select class="form-control" id="seminar_id" name="seminar_id" required>
                    <option value="">Pilih Acara</option>
                    @foreach ($seminars as $seminar)
                    <option value="{{ $seminar->id }}">{{ $seminar->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jenis_tiket">Jenis Tiket</label>
                <select class="form-control" id="jenis_tiket" name="jenis_tiket" required>
                    <option value="">Pilih Jenis Tiket</option>
                    <option value="Umum">Umum</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                </select>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</main>
@endsection