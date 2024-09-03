@extends('dashboard.components.auth')

@section('content')
<main class="main-content">

    <div class="container mt-5">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Pengguna</h4>
                <a href="{{ route('dashboard.admins.create') }}" class="btn btn-primary">Tambah Pengguna Baru</a>
            </div>
            <div class="card-body">
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Peran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('dashboard.admins.edit', $user->id) }}" class="btn btn-sm btn-warning mr-2">
                                    <i class="fas fa-edit" style="font-size: 10px;"></i>
                                </a>
                                <form action="{{ route('dashboard.pengguna.destroy', $user->id) }}" method="POST" style="display:inline;">
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