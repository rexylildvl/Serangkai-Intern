<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class AdminBeritaController extends Controller
{
    public function index()
    {
        $news = Berita::latest()->paginate(6);
        return view('admin.berita.index', compact('news'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'berita' => 'required|string',
        ]);

        $path = $request->file('foto')->store('berita', 'public');

        Berita::create([
            'judul' => $request->judul,
            'foto' => $path,
            'berita' => $request->berita,
            'hari_posting' => Carbon::now()->translatedFormat('l'),
            'tanggal_posting' => Carbon::now()->toDateString(),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.show', compact('berita'));
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'berita' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
                Storage::disk('public')->delete($berita->foto);
            }
            $path = $request->file('foto')->store('berita', 'public');
            $berita->foto = $path;
        }

        $berita->judul = $request->judul;
        $berita->berita = $request->berita;
        $berita->save();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
            Storage::disk('public')->delete($berita->foto);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
