<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminBeritaController extends Controller
{
    public function index()
    {
        return view('admin.berita'); 
    }

    public function create()
    {
        return view('admin.berita-create'); 
    }
}
