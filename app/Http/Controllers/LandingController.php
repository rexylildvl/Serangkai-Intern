<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class LandingController extends Controller
{
    public function beranda()
    {
        $banners = Banner::where('is_active', true)->latest()->get();
        return view('pages.beranda', compact('banners'));
    }
}
