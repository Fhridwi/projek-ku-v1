@extends('layouts.app')

@section('title', 'Data Pendaftar')

@section('title2', 'Data Pendaftar')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Daftar Pendaftar</h5>
        <a href="{{ route('pendaftar.create') }}" class="btn btn-primary btn-sm float-end">
            <i class="bi bi-plus"></i> Tambah Pendaftar
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
                        <th>Nama Santri</th>
                        <th>TTL</th>
                        <th>Jenis Kelamin</th>
                        <th>Asal Sekolah</th>
                        <th>Alamat</th>
                        <th>Jenjang</th>
                        <th>Status Pendaftaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendaftar as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama_santri }}</td>
                        <td>{{ $item->ttl }}</td>
                        <td>{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $item->asal_sekolah }}</td> <!-- Ganti 'alamat' dengan 'asal_sekolah' sesuai kolom -->
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->jenjangPendidikan->nama_jenjang ?? 'Tidak ada jenjang' }}</td> <!-- Mengakses relasi JenjangPendidikan -->
                        <td>{{ $item->statusPendaftaran->status ?? 'Tidak ada status' }}</td> <!-- Mengakses relasi StatusPendaftaran -->
                        <td>
                            <a href="{{ route('pendaftar.show', $item->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Lihat
                            </a>
                            <a href="{{ route('pendaftar.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('pendaftar.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($pendaftar->isEmpty()) 
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data pendaftar.</td>
                    </tr>
                    @endif
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
