@extends('dashboard.components.auth')

@section('content')
<main class="main-content">

    <div class="container mt-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Manajemen Tiket</h4>
                <a href="{{ route('tickets.create') }}" class="btn btn-primary">Buat Tiket Baru</a>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Acara</th>
                            <th>Jenis Tiket</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                        <tr class="align-middle text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ticket->seminar->title }}</td>
                            <td>{{ $ticket->jenis_tiket }}</td>
                            <td>{{ 'Rp ' . number_format($ticket->harga, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-sm btn-warning mr-2">
                                    <i class="fas fa-edit" style="font-size: 10px;"></i>
                                </a>
                                <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
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