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

            {{-- <h5>Akun User</h5>
            <div class="from-group">
                <label for="akun">Pilih Akun</label>
                <select class="form-control" name="user_id" id="user_id" required>
                    <option value="">-- Pilih User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                
            </div> --}}

            <!-- Data Santri -->
            <h5>Data Santri</h5>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="nama_santri">Nama Santri</label>
                    <input type="text" class="form-control" id="nama_santri" name="nama_santri" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="ttl">Tempat, Tanggal Lahir</label>
                    <input type="text" class="form-control" id="ttl" name="ttl" required>
                </div>
            </div>


           <div class="row">
            <div class="form-group col-md-6">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control col-md-6" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="anak_ke">Anak Ke</label>
                <input type="number" class="form-control" id="anak_ke" name="anak_ke" required>
            </div>
           </div>

           <div class="row">
            <div class="form-group col-md-6">
                <label for="asal_sekolah">Asal Sekolah</label>
                <input class="form-control" type="text" name="asal_sekolah" id="asal_sekolah">
            </div>
            <div class="form-group col-md-6">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
            </div>
           </div>

           <div class="row">
            
            <div class="form-group col-md-6">
                <label for="jenjang">Jenjang Pendidikan</label>
                <select class="form-control" name="jenjang" id="jenjang">
                    <option value="">-- Pilih Sekolah --</option>
                   @foreach ($jenjangs as $sekolah)
                       <option value="{{ $sekolah->id }}">{{ $sekolah->nama_jenjang }}</option>
                   @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="Tahun_ajaran">Tahun ajaran</label>
                <select class="form-control" name="Tahun_ajaran" id="Tahun_ajaran">
                    <option value="">-- Pilih Tahun ajaran --</option>
                    @foreach ($tahunAjarans as $ajaran)
                        <option value="{{ $ajaran->id }}">{{ $ajaran->nama_tahun }}</option>
                    @endforeach
                </select>
            </div>
           </div>


            <div class="form-group">
                <label for="status">Status Pendaftaran</label>
                <select class="form-control" name="status" id="status">
                    <option value="">-- Pilih Status --</option>
                    @foreach ($status as $status)
                        <option value="{{ $status->id }}">{{ $status->status }}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>
@endsection
