<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminPendaftarController;
use App\Http\Controllers\AdminLowonganController;
use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminGaleriController;
use App\Http\Controllers\AdminFaqController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LowonganController;

Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/lowongan', [LowonganController::class, 'index'])->name('lowongan.index');
Route::get('/lowongan/{id}', [LowonganController::class, 'show'])->name('lowongan.show');
Route::get('/lowongan/create', [LowonganController::class, 'create'])->name('lowongan.create');
Route::post('/lowongan', [LowonganController::class, 'store'])->name('lowongan.store');


Route::get('/center-of-excellence', function () {
    return view('coe.index');
})->name('coe.index');


Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/beranda', function () {
    return view('pages.beranda');
})->name('beranda');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
Route::get('/galeri/{id}', [GaleriController::class, 'show'])->name('galeri.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/pendaftar', [AdminPendaftarController::class, 'index'])->name('admin.pendaftar');
    Route::get('/admin/lowongan', [AdminLowonganController::class, 'index'])->name('admin.lowongan');
    Route::get('/admin/lowongan/create', [AdminLowonganController::class, 'create'])->name('admin.lowongan.create');
    Route::get('/admin/berita', [AdminBeritaController::class, 'index'])->name('admin.berita.index');
    Route::get('/admin/berita/create', [AdminBeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/admin/berita', [AdminBeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/admin/berita/{id}', [AdminBeritaController::class, 'show'])->name('admin.berita.show');
    Route::get('/admin/berita/{id}/edit', [AdminBeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('/admin/berita/{id}', [AdminBeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('/admin/berita/{id}', [AdminBeritaController::class, 'destroy'])->name('admin.berita.destroy');
    Route::get('/admin/galeri', [AdminGaleriController::class, 'index'])->name('admin.galeri');
    Route::get('/admin/galeri/create', [AdminGaleriController::class, 'create'])->name('admin.galeri.create');
    Route::post('/admin/galeri', [AdminGaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/admin/galeri/{id}', [AdminGaleriController::class, 'show'])->name('admin.galeri.show');
    Route::get('/admin/galeri/{id}/edit', [AdminGaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('/admin/galeri/{id}', [AdminGaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('/admin/galeri/{id}', [AdminGaleriController::class, 'destroy'])->name('admin.galeri.destroy');
    Route::get('/admin/faq', [AdminFaqController::class, 'index'])->name('admin.faq');
});

require __DIR__.'/auth.php';
