<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lowongan;
use App\Models\News;
use App\Models\Galeri;

class BerandaController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::latest()->take(6)->get();
        $news = News::latest()->take(6)->get();
        $galeris = Galeri::latest()->take(10)->get();

        return view('pages.beranda', compact('lowongans', 'news', 'galeris'));
    }
}
