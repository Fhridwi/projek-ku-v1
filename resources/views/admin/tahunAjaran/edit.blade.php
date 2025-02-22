@extends('layouts.app')

@section('title', 'Edit Tahun Ajaran')

@section('title2', 'Edit Tahun Ajaran')

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
                <label class="form-label">Tahun Ajaran</label>
                <input type="text" name="nama_tahun" id="nama_tahun" class="form-control " value="{{ $tahunAjaran->nama_tahun }}" >
            </div>
           </div>
           <div class="row">
            <div class="mb-3 col-md-3">
                <label class="form-label">Status </label>
               <select name="status" id="status" class="form-control">
                <option value="aktif" {{ $tahunAjaran->status == 'aktif'?'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $tahunAjaran->status == 'nonaktif'?'selected' : '' }}>Tidak Aktif</option>
               </select>
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
