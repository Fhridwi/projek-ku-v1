@extends('layouts.app')

@section('title', 'Jenjang Pendidikan')

@section('title2', 'Jenjang Pendidikan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Daftar Jenjang Pendidikan</h5>
        <a href="{{ route('jenjang.create') }}" class="btn btn-primary btn-sm float-end">
            <i class="bi bi-plus"></i> Tambah Jenjang Pendidikan
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
                        <th>Jenjang Pendidikan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jenjang as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_jenjang }}</td>
                        <td>
                            <a href="{{ route('jenjang.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('jenjang.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
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
                        <td colspan="3" class="text-center">Tidak ada data jenjang pendidikan.</td>
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
