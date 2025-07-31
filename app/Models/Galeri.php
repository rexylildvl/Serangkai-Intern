<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'tanggal_upload'
    ];

    // Jika ingin tanggal_upload otomatis diisi saat create
    public $timestamps = false;

    protected $casts = [
        'tanggal_upload' => 'datetime',
    ];

}
