@extends('layouts.app')

@section('title', 'Tambah Tahun Ajaran')

@section('title2', 'Tambah Tahun Ajaran')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Tambah Tahun Ajaran</h5>
        <a href="{{ route('admin.tahunAjaran') }}" class="btn btn-secondary btn-sm float-end">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.tahunAjaran.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tahun Ajaran</label>
                <input type="text" name="nama_tahun" class="form-control @error('nama_tahun') is-invalid @enderror" value="{{ old('nama_tahun') }}" placeholder="Contoh: 2024/2025">
                @error('nama_tahun')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror">
                    <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kouta</label>
                <input type="number" name="kouta" class="form-control @error('kouta') is-invalid @enderror" value="{{ old('kouta') }}" placeholder="Masukkan jumlah kouta">
                @error('kouta')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection
