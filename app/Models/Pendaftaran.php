<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran';
    protected $fillable = ['nama_santri', 'ttl', 'jenis_kelamin', 'anak_ke', 'asal_sekolah', 'alamat', 'tahun_ajaran_id', 'jenjang_id', 'status_id', 'user_id'];

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }
    public function jenjangPendidikan()
    {
        return $this->belongsTo(JenjangPendidikan::class);
    }
    public function statusPendaftaran()
    {
        return $this->belongsTo(StatusPendaftaran::class);
    }
    public function orangTua()
    {
        return $this->hasOne(OrangTua::class);
    }
    public function wali()
    {
        return $this->hasOne(Wali::class);
    }
    public function filePendaftaran()
    {
        return $this->hasOne(FilePendaftaran::class);
    }
    public function verifikasiPendaftaran()
    {
        return $this->hasOne(VerifikasiPendaftaran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

