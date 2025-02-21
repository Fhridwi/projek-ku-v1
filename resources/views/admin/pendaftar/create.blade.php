@extends('layouts.app')

@section('title', 'Tambah Pendaftar')

@section('title2', 'Tambah Pendaftar')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Tambah Pendaftar</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('pendaftar.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_santri">Nama Santri</label>
                <input type="text" class="form-control @error('nama_santri') is-invalid @enderror" id="nama_santri" name="nama_santri" value="{{ old('nama_santri') }}" required>
                @error('nama_santri')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ttl">Tempat, Tanggal Lahir</label>
                <input type="text" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl" value="{{ old('ttl') }}" required>
                @error('ttl')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <!-- Form fields for anak_ke, asal_sekolah, alamat, tahun_ajaran_id, jenjang_id, status_id, user_id go here -->
            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
</div>
@endsection
