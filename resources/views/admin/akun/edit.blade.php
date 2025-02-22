@extends('layouts.app')

@section('title', 'Edit Akun')
@section('title2', 'Edit Akun')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Edit Akun</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('akun.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="username" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                    <option value="">-- Pilih Role User --</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="wali_santri" {{ $user->role == 'wali_santri' ? 'selected' : '' }}>Wali Santri</option>
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password Baru (Opsional)</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="passwordConfirm">Konfirmasi Password</label>
                <input type="password" class="form-control @error('passwordConfirm') is-invalid @enderror" name="passwordConfirm" id="passwordConfirm">
                @error('passwordConfirm')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
