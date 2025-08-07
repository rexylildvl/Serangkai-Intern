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
        'alamat',
        'no_hp',
        'email',
        'cv',
        'portofolio',
        'portofolio_link',
        'universitas',
        'jurusan',
        'jenjang',
        'semester',
        'bidang',
        'periode',
        'status',
        'tujuan',
        'keahlian',
        'lowongan_id',
        'user_id',
        'surat_pengantar',
    ];

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'lowongan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeSearch($query, $term)
    {
        return $query->where(function ($query) use ($term) {
            $query->where('nama_lengkap', 'like', "%$term%")
                ->orWhere('email', 'like', "%$term%")
                ->orWhere('universitas', 'like', "%$term%")
                ->orWhere('status', 'like', "%$term%");
        });
    }

}
