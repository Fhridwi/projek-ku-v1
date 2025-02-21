<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    use HasFactory;
    protected $table = 'wali';
    protected $fillable = ['pendaftaran_id', 'wali', 'nama', 'pekerjaan', 'penghasilan', 'no_hp', 'email'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}