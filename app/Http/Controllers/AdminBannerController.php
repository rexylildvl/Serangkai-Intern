<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBannerController extends Controller
{
    // Tampilkan semua banner
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    // Tampilkan form tambah banner
    public function create()
    {
        return view('admin.banner.create');
    }

    // Simpan banner baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'required|string|max:500',
        ]);

        // Simpan gambar
        $path = $request->file('gambar')->store('banners', 'public'); 

        Banner::create([
            'judul' => $request->judul,
            'gambar' => $path, 
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    // Update banner
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'judul' => 'required|string|max:500',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($banner->gambar && Storage::disk('public')->exists($banner->gambar)) {
                Storage::disk('public')->delete($banner->gambar);
            }

            $path = $request->file('gambar')->store('banner', 'public');
            $banner->gambar = $path;
        }

        $banner->judul = $request->judul;
        $banner->deskripsi = $request->deskripsi ?? $banner->deskripsi;
        $banner->is_active = $request->has('is_active');
        $banner->save();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diperbarui.');
    }

    // Hapus banner
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);

        if ($banner->gambar && Storage::disk('public')->exists($banner->gambar)) {
            Storage::disk('public')->delete($banner->gambar);
        }

        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus.');
    }

    public function toggle($id)
    {
        $banner = Banner::findOrFail($id);
        $banner->is_active = !$banner->is_active;
        $banner->save();

        return redirect()->route('admin.banner.index')->with('success', 'Status banner diperbarui.');
    }
}
