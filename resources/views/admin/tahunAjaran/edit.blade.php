@extends('layouts.app')

@section('title', 'Edit Jenjang Pendidikan')

@section('title2', 'Edit Jenjang Pendidikan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Jenjang Pendidikan</h5>
        <a href="{{ route('jenjang.index') }}" class="btn btn-secondary btn-sm float-end">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('jenjang.update', $jenjang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Jenjang Pendidikan</label>
                <input type="text" name="nama_jenjang" class="form-control @error('nama_jenjang') is-invalid @enderror" value="{{ old('nama_jenjang', $jenjang->nama_jenjang) }}">
                @error('nama_jenjang')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection
