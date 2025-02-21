<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePendaftaran extends Model
{
    use HasFactory;
    protected $table = 'file_pendaftaran';
    protected $fillable = ['pendaftaran_id', 'pas_foto', 'akte_kelahiran', 'scan_kk', 'ktp_ayah', 'ktp_ibu'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id');
    }
}

