<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPendaftarController;
use App\Http\Controllers\AdminLowonganController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminFaqController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/beranda', function () {
    return view('pages.beranda');
})->name('beranda');

Route::get('/galeri', function () {
    return view('pages.galeri');
})->name('galeri');

Route::get('/berita', function () {
    return view('pages.berita');
})->name('berita');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/pendaftar', [AdminPendaftarController::class, 'index'])->name('admin.pendaftar');
    Route::get('/admin/lowongan', [AdminLowonganController::class, 'index'])->name('admin.lowongan');
    Route::get('/admin/lowongan/create', [AdminLowonganController::class, 'create'])->name('admin.lowongan.create');
    Route::get('/admin/berita', [AdminBeritaController::class, 'index'])->name('admin.berita');
    Route::get('/admin/berita/create', [AdminBeritaController::class, 'create'])->name('admin.berita.create');
    Route::get('/admin/galeri', [AdminGaleriController::class, 'index'])->name('admin.galeri');
    Route::get('/admin/faq', [AdminFaqController::class, 'index'])->name('admin.faq');
});

require __DIR__.'/auth.php';
