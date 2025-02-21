@extends('layouts.app')

@section('title', 'Edit Jenjang')

@section('content')
<div class="container">

    <form action="{{ route('jenjang.update', $jenjang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama Jenjang</label>
            <input type="text" name="nama_jenjang" class="form-control" value="{{ $jenjang->nama_jenjang }}" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
        <a href="{{ route('jenjang.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
