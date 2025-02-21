@extends('layouts.app')

@section('title', 'Status Pendaftaran')

@section('title2', 'Status Pendaftaran')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Daftar Status Pendaftaran</h5>
        <a href="{{ route('status.create') }}" class="btn btn-primary btn-sm float-end">
            <i class="bi bi-plus"></i> Tambah Status Pendaftaran
        </a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive ">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Status Pendaftaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($status as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('status.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('status.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data status pendaftaran.</td>
                    </tr>
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
