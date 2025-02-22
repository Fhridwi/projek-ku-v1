@extends('layouts.app')

@section('title', 'Tambah Akun ')
@section('title2', 'Tambah Akun ')


@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title">Tambah Akun</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('status.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="name" id="username" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="role">role</label>
                <select name="role" id="role" class="form-control">
                    <option value="">-- Pilih Role User --</option>
                    <option value="admin">Admin</option>
                    <option value="wali_santri">Wali Santri </option>
                </select>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="passwordConfrim">Password Confrim</label>
                <input type="password" class="form-control" name="passwordConfrim" id="passwordConfrim" required>
                @error('passwordConfrim')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>










            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
</div>
@endsection
