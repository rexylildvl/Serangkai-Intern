<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat_domisili',
        'no_hp',
        'email',
        'cv',
        'portofolio',
        'asal_universitas',
        'jurusan',
        'jenjang',
        'semester',
        'bidang',
        'periode',
        'status',
        'tujuan',
        'keahlian',
    ];
}
