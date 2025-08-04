<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AdminGaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::latest()->paginate(12); 
        return view('admin.galeri.index', compact('galeri'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $path = $request->file('foto')->store('galeri', 'public');

        \App\Models\Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $path,
            'tanggal_upload' => Carbon::now(),
        ]);

        return redirect()->route('admin.galeri')->with('success', 'Gambar berhasil ditambahkan');
    }

    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.show', compact('galeri'));
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        // Jika ada gambar baru diunggah
        if ($request->hasFile('foto')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($galeri->foto);

            // Simpan gambar baru
            $path = $request->file('foto')->store('galeri', 'public');
            $galeri->foto = $path;
        }

        $galeri->judul = $validated['judul'];
        $galeri->deskripsi = $validated['deskripsi'] ?? '';
        $galeri->save();

        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus file gambar dari storage
        Storage::disk('public')->delete($galeri->foto);

        $galeri->delete();

        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil dihapus.');
    }

}
