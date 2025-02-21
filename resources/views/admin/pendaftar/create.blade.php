@extends('layouts.app')

@section('title', 'Tambah Pendaftar')

@section('title2', 'Tambah Pendaftar')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Tambah Pendaftar</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('pendaftar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h5>Akun User</h5>
            <div class="from-group">
                <label for="akun">Pilih Akun</label>
                <select class="form-control" name="user_id" id="user_id" required>
                    <option value="">-- Pilih User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                
            </div>

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

            <!-- Data Orang Tua -->
            <h5 class="mt-4">Data Orang Tua</h5>
            
            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="nama_ayah">Nama Ayah</label>
                    <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                    <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 ">
                    <label for="status_ayah">Status Ayah</label>
                    <select class="form-control" id="status_ayah" name="status_ayah" required>
                        <option value="Hidup">Hidup</option>
                        <option value="Meninggal">Meninggal</option>
                    </select>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="nama_ibu">Nama Ibu</label>
                    <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                    <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="status_ibu">Status Ibu</label>
                    <select class="form-control" id="status_ibu" name="status_ibu" required>
                        <option value="Hidup">Hidup</option>
                        <option value="Meninggal">Meninggal</option>
                    </select>
                </div>
            </div>

            <div class="row">
                
            <div class="form-group col-md-6">
                <label for="no_hp">No HP Orang Tua</label>
                <input type="number" class="form-control" id="no_hp" name="no_hp" required>
            </div>
            <div class="form-group col-md-6">
                <label for="email_ortu">Email Orang Tua</label>
                <input type="email" class="form-control" id="email_ortu" name="email_ortu" required>
            </div>
            </div>

            <div class="form-group">
                <label for="alamat_ortu">alamat Orang Tua</label>
                <input type="text" class="form-control" id="alamat_ortu" name="alamat_ortu" required>
            </div>
            <!-- Data Wali -->
            <h5 class="mt-4">Data Wali</h5>
            <div class="form-group">
                <label for="wali">Wali</label>
                <input type="text" class="form-control" id="wali" name="wali">
            </div>
            <div class="form-group">
                <label for="nama_wali">Nama Wali</label>
                <input type="text" class="form-control" id="nama_wali" name="nama_wali">
            </div>
            <div class="form-group">
                <label for="pekerjaan_wali">Pekerjaan Wali</label>
                <input type="text" class="form-control" id="pekerjaan_wali" name="pekerjaan_wali">
            </div>
            <div class="form-group">
                <label for="penghasilan_wali">Penghasilan Wali</label>
                <input type="text" class="form-control" id="penghasilan_wali" name="penghasilan_wali">
            </div>
            <div class="form-group">
                <label for="no_hp_wali">No HP Wali</label>
                <input type="text" class="form-control" id="no_hp_wali" name="no_hp_wali">
            </div>
            <div class="form-group">
                <label for="email_wali">Email Wali</label>
                <input type="email" class="form-control" id="email_wali" name="email_wali" >
            </div>

            <!-- Upload Dokumen -->
            <h5 class="mt-4">Upload Dokumen</h5>
            <div class="form-group">
                <label for="pas_foto">Pas Foto</label>
                <input type="file" class="form-control" id="pas_foto" name="pas_foto" required>
            </div>
            <div class="form-group">
                <label for="akte_kelahiran">Akte Kelahiran</label>
                <input type="file" class="form-control" id="akte_kelahiran" name="akte_kelahiran" required>
            </div>
            <div class="form-group">
                <label for="scan_kk">Scan Kartu Keluarga</label>
                <input type="file" class="form-control" id="scan_kk" name="scan_kk" required>
            </div>
            <div class="form-group">
                <label for="ktp_ayah">KTP Ayah</label>
                <input type="file" class="form-control" id="ktp_ayah" name="ktp_ayah">
            </div>
            <div class="form-group">
                <label for="ktp_ibu">KTP Ibu</label>
                <input type="file" class="form-control" id="ktp_ibu" name="ktp_ibu">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
</div>
@endsection
