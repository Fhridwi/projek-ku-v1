@extends('layouts.app')

@section('title', 'Tambah Akun')
@section('title2', 'Tambah Akun')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Tambah Akun</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('akun.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name')}}" id="username" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>  
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                    <option value="">-- Pilih Role User --</option>
                    <option value="admin">Admin</option>
                    <option value="wali_santri">Wali Santri</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="passwordConfirm">Konfirmasi Password</label>
                <input type="password" class="form-control @error('passwordConfirm') is-invalid @enderror" name="passwordConfirm" id="passwordConfirm" required>
                @error('passwordConfirm')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
</div>
@endsection
