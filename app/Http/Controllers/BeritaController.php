<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // Menampilkan form tambah berita
    public function create()
    {
        return view('news.create'); // pastikan file ini ada
    }

    // Menyimpan berita baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'berita' => 'required|string',
            'tanggal' => 'required|date',
            'hari' => 'required|string|max:20'
        ]);

        // Upload foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads/news', $filename, 'public');
        }

        // Simpan ke database
        News::create([
            'judul' => $validated['judul'],
            'foto' => $path,
            'berita' => $validated['berita'],
            'hari' => $validated['hari'],
            'tanggal' => $validated['tanggal']
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    // Menampilkan semua berita
    public function index()
    {
        $allNews = News::latest()->get();
        return view('berita.index', compact('allNews'));
    }

    // Menampilkan detail satu berita
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('berita.show', compact('news'));
    }
}
