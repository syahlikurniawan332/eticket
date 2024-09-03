@extends('dashboard.components.auth')

@section('content')
<main class="main-content">

    <div class="container mt-5">
        <!-- Keluhan Belum Selesai -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Keluhan Belum Selesai</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Complaint</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendingReports as $report)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $report->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($report->date)->format('d M Y') }}</td>
                            <td>{{ $report->complaint }}</td>
                            <td>{{ $report->status }}</td>
                            <td>
                                <a href="{{ route('dashboard.reports.show', $report->id) }}" class="btn btn-sm btn-info mr-2">View</a>
                                <a href="{{ route('dashboard.reports.edit', $report->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Keluhan Selesai -->
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Keluhan Selesai</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Complaint</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($completedReports as $report)
                        <tr>
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($report->date)->format('d M Y') }}</td>
                            <td>{{ $report->complaint }}</td>
                            <td>{{ $report->status }}</td>
                            <td>
                                <form action="{{ route('dashboard.reports.destroy', $report->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection