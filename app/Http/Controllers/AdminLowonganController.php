<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminLowonganController extends Controller
{
    public function index()
    {
        return view('admin.lowongan.index');
    }
    public function create()
    {
        return view('admin.lowongan.create'); 
    }
}
