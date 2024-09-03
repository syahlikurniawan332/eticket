@extends('dashboard.components.auth')

@section('content')
<main class="main-content">

    <div class="content mt-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Manajemen Seminar</h4>
            <a class="btn btn-primary" href="{{ route('seminars.create') }}">Add New Seminar</a>
        </div>
        <div class="content mt-4">
            @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($seminars as $seminar)
                        <tr class="align-middle">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ Str::limit($seminar->title, 10, '...') }}</td>
                            <td>{{ $seminar->date }}</td>
                            <td>{{ Str::limit($seminar->location, 10, '...') }}</td>
                            <td>
                                {{ Str::limit($seminar->description, 15, '...') }}
                            </td>
                            <td>
                                <a href="{{ route('seminars.show', $seminar->id) }}" class="btn btn-info btn-sm" title="View">
                                    <i class="fas fa-eye" style="font-size: 10px;"></i>
                                </a>
                                <a href="{{ route('seminars.edit', $seminar->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit" style="font-size: 10px;"></i>
                                </a>
                                <form action="{{ route('seminars.destroy', $seminar->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this seminar?')" title="Delete">
                                        <i class="fas fa-trash-alt" style="font-size: 10px;"></i>
                                    </button>
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