<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifikasiPendaftaran extends Model
{
    use HasFactory;
    protected $table = 'verifikasi_pendaftaran';
    protected $fillable = ['pendaftaran_id', 'status', 'catatan', 'diverifikasi_oleh'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'diverifikasi_oleh');
    }
}
