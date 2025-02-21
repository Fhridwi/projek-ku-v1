@extends('layouts.app')

@section('title', 'Edit Status Pendaftaran')

@section('title2', 'Edit Status Pendaftaran')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Status Pendaftaran</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('status.update', $status->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Status Pendaftaran</label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status', $status->status) }}" required>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>
@endsection
