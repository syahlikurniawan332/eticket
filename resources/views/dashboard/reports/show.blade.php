@extends('dashboard.components.auth')

@section('content')
<main class="main-content">
    <nav class="navbar d-flex justify-content-between align-items-center mb-4">
        <h6 class="font-weight-bolder">Detail Laporan</h6>
    </nav>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Detail Laporan #{{ $report->id }}</h4>
            </div>
            <div class="card-body">
                <p><strong>Title:</strong> {{ $report->title }}</p>
                <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($report->date)->format('d M Y') }}</p>
                <p><strong>Complaint:</strong> {{ $report->complaint }}</p>
                <p><strong>Status:</strong> {{ $report->status }}</p>
            </div>
        </div>
    </div>
</main>
@endsection
