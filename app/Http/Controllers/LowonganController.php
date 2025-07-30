<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    // Menampilkan daftar lowongan
    public function index()
    {
        $lowongans = Lowongan::latest()->paginate(9);

        if ($lowongans->isEmpty()) {
            return view('lowongan.kosong');
        }

        return view('lowongan.index', compact('lowongans'));
    }



    // Menampilkan detail satu lowongan
    public function show($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        
        $alreadyApplied = false;
        if (auth()->check()) {
            $alreadyApplied = \App\Models\Pendaftaran::where('email', auth()->user()->email)
                ->where('lowongan_id', $id)
                ->exists();
    }
    
    return view('lowongan.show', compact('lowongan', 'alreadyApplied'));
}
    // Menampilkan form tambah lowongan
    public function create()
    {
        return view('lowongan.create');
    }

    // Menyimpan data lowongan baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'divisi' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
            'deadline' => 'required|date',
            'durasi' => 'required|string|max:100',
            'pendidikan' => 'nullable|string',
            'jurusan' => 'nullable|string',
            'kualifikasi' => 'nullable|array',
            'persyaratan_dokumen' => 'nullable|array',
            'skill' => 'nullable|array',
            'tanggung_jawab' => 'nullable|array',
            'benefit' => 'nullable|array',
            'deskripsi' => 'nullable|string',
        ]);

        Lowongan::create($data);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return view('lowongan.edit', compact('lowongan'));
    }

    // Menyimpan perubahan edit
    public function update(Request $request, $id)
    {
        $lowongan = Lowongan::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'divisi' => 'required|string|max:100',
            'lokasi' => 'required|string|max:100',
            'deadline' => 'required|date',
            'durasi' => 'required|string|max:100',
            'pendidikan' => 'nullable|string',
            'jurusan' => 'nullable|string',
            'kualifikasi' => 'nullable|array',
            'persyaratan_dokumen' => 'nullable|array',
            'skill' => 'nullable|array',
            'tanggung_jawab' => 'nullable|array',
            'benefit' => 'nullable|array',
            'deskripsi' => 'nullable|string',
        ]);

        $lowongan->update($data);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil diperbarui.');
    }

    // Menghapus lowongan
    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil dihapus.');
    }
}
