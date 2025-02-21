@extends('layouts.app')

@section('title', 'Tahun Ajaran')

@section('title2', 'Tahun Ajaran')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Daftar Tahun Ajaran</h5>
        <a href="{{ route('admin.tahunAjaran.create') }}" class="btn btn-primary btn-sm float-end">
            <i class="bi bi-plus"></i> Tambah Tahun Ajaran
        </a>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun Ajaran</th>
                        <th>Status</th>
                        <th>Kuota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tahunAjaran as $index => $tahun)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tahun->nama_tahun }}</td>
                        <td>
                            <span class="badge {{ $tahun->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($tahun->status) }}
                            </span>
                        </td>
                        <td>{{ $tahun->kouta }}</td>
                        <td>
                            <a href="{{ route('admin.tahunAjaran.edit', $tahun->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.tahunAjaran.destroy', $tahun->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
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
                        <td colspan="5" class="text-center">Tidak ada data tahun ajaran.</td>
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
