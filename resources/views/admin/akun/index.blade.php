@extends('layouts.app')

@section('title', 'Menejement Akun Wali')
@section('title2', 'Menejement Akun Wali')
    
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Data Akun</h5>
        <a href="{{ route('akun.create') }}" class="btn btn-primary btn-sm float-end">
            <i class="bi bi-plus"></i> Tambah Akun
        </a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Kelompok Admin -->
        <h5>Admin</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin )
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->role }}</td>
                        <td>
                            <a href="{{ route('akun.edit', 1) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="#" method="POST" onsubmit="confirmDelete(event)" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <p>Tidak ada data admin</p>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Kelompok Wali Santri -->
        <h5>Wali Santri</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
               @forelse ($walis as $wali)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $wali->name }}</td>
                    <td>{{ $wali->email }}</td>
                    <td>{{ $wali->role}}</td>
                    <td>
                        <a href="{{ route('akun.edit', 4) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="#" method="POST" onsubmit="confirmDelete(event)" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>

                @empty
                <p>Tidak ada data wali santri</p>
                @endforelse
            </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete(event) {
        event.preventDefault();
        if (confirm("Yakin ingin menghapus data ini?")) {
            event.target.submit();
        }
    }
</script>
@endsection

