@extends('layouts.app')

@section('title', 'Edit Pendaftar')

@section('title2', 'Edit Pendaftar')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Pendaftar</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('pendaftar.update', $pendaftar->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Same form fields as create view, but pre-filled with data -->
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>
@endsection
