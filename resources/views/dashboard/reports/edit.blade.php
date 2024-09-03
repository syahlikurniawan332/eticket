@extends('dashboard.components.auth')

@section('content')
<main class="main-content">
    <nav class="navbar d-flex justify-content-between align-items-center mb-4">
        <h6 class="font-weight-bolder">Edit Keluhan</h6>
    </nav>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Edit Keluhan</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.reports.update', $report->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ $report->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" class="form-control" value="{{ $report->date }}" required>
                    </div>
                    <div class="form-group">
                        <label for="complaint">Complaint</label>
                        <textarea id="complaint" name="complaint" class="form-control" required>{{ $report->complaint }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="Belum Selesai" {{ $report->status === 'Belum Selesai' ? 'selected' : '' }}>Belum Selesai</option>
                            <option value="Selesai" {{ $report->status === 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Status</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
