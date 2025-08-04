<?php

// app/Models/Lowongan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    // Nama tabel khusus
    protected $table = 'lowongan_magangs';

    // Field yang dapat diisi secara massal
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

    // Field yang bertipe array / json
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
