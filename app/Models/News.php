<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'judul',
        'foto',
        'berita',
        'hari',
        'tanggal',
    ];

    // Optional: Jika kamu ingin memformat tanggal otomatis
    protected $casts = [
        'tanggal' => 'date',
    ];
}
