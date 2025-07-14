<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Menampilkan semua galeri
    public function index()
    {
        $galeris = Galeri::orderBy('tanggal_upload', 'desc')->get();
        return view('galeri.index', compact('galeris'));
    }


    // Menampilkan form tambah galeri
    public function create()
    {
        return view('galeri.create'); // buat view ini nanti
    }

    // Menyimpan data galeri
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload foto
        $path = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/galeri', $filename, 'public');
        }

        // Simpan ke database
        Galeri::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? '',
            'foto' => $path,
            'tanggal_upload' => now(),
        ]);

        return redirect()->route('galeri')->with('success', 'Galeri berhasil ditambahkan.');
    }
}
