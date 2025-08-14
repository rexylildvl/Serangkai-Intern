<?php

// app/Models/Lowongan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $table = 'lowongan_magangs';

    protected $fillable = [
        'judul',
        'divisi',
        'lokasi',
        'deadline',
        'durasi',
        'pendidikan',
        'jurusan',
        'kualifikasi',
        'persyaratan_dokumen',
        'skill',
        'tanggung_jawab',
        'benefit',
        'deskripsi',
        'status',
    ];

    protected $casts = [
        'kualifikasi' => 'array',
        'persyaratan_dokumen' => 'array',
        'skill' => 'array',
        'tanggung_jawab' => 'array',
        'benefit' => 'array',
    ];

    public function pendaftarans()
{
    return $this->hasMany(Pendaftaran::class, 'id_lowongan');
}

}
