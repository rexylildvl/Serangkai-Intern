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

    // Form tambah galeri
    public function create()
    {
        return view('galeri.create');
    }

    // Simpan data galeri
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/galeri', $filename, 'public');
        }

        Galeri::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'] ?? '',
            'foto' => $path,
            'tanggal_upload' => now(), // Pastikan kolom ini ada di migration
        ]);

        return redirect()->route('galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }
}
