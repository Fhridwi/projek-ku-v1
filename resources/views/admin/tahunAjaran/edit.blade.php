@extends('layouts.app')

@section('title', 'Edit Jenjang Pendidikan')

@section('title2', 'Edit Jenjang Pendidikan')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Form Edit Tahun Ajaran</h5>
        <a href="{{ route('jenjang.index') }}" class="btn btn-secondary btn-sm float-end">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.tahunAjaran.update', $tahunAjaran->id) }}" method="POST">
            @csrf
            @method('PUT')

           <div class="row">
            <div class="mb-3 col-md-3">
                <label class="form-label">Jenjang Pendidikan</label>
                <input type="text" name="nama_tahun" id="nama_tahun" class="form-control " value="{{ $tahunAjaran->nama_tahun }}" >
            </div>
           </div>
           <div class="row">
            <div class="mb-3 col-md-3">
                <label class="form-label">Status Pendidikan</label>
                <input type="text" name="status" id="status" class="form-control" value="{{ $tahunAjaran->status }}" >
            </div>
           </div>
           <div class="row">
            <div class="mb-3 col-md-3">
                <label class="form-label">Kouta</label>
                <input type="text" name="kouta" id="kouta" class="form-control " value="{{ $tahunAjaran->kouta }}" >
            </div>
           </div>

            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Update</button>
        </form>
    </div>
</div>
@endsection
