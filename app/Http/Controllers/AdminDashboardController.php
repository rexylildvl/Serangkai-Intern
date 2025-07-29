<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Lowongan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        $totalPendaftar = Pendaftaran::count();
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $totalLowongan = Lowongan::count();
        
        $statistikBidang = Pendaftaran::select('bidang', \DB::raw('count(*) as total'))
                                ->groupBy('bidang')
                                ->pluck('total', 'bidang')
                                ->toArray();

        return view('admin.dashboard', compact(
            'totalPendaftar',
            'totalBerita',
            'totalGaleri',
            'totalLowongan',
            'statistikBidang'
        ));
    }
}
