<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'news'; 

    protected $fillable = [
        'judul',
        'foto',
        'berita',
        'hari_posting',
        'tanggal_posting',
    ];

    protected $dates = ['tanggal_posting'];
}
