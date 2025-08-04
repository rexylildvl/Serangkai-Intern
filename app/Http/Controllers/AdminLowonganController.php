<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminLowonganController extends Controller
{
    public function index()
    {
        $lowongans = Lowongan::latest()->get();
        return view('admin.lowongan.index', compact('lowongans'));
    }

    public function create()
    {
        return view('admin.lowongan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'divisi' => 'required|string',
            'lokasi' => 'required|string',
            'deadline' => 'required|date',
            'durasi' => 'nullable|string',
            'pendidikan' => 'nullable|string',
            'jurusan' => 'nullable|string',
            'kualifikasi' => 'nullable|array',
            'persyaratan_dokumen' => 'nullable|array',
            'skill' => 'nullable|array',
            'tanggung_jawab' => 'nullable|array',
            'benefit' => 'nullable|array',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:buka,tutup',
        ]);

        Lowongan::create([
            'judul' => $request->judul,
            'divisi' => $request->divisi,
            'lokasi' => $request->lokasi,
            'deadline' => $request->deadline,
            'durasi' => $request->durasi,
            'pendidikan' => $request->pendidikan,
            'jurusan' => $request->jurusan,
            'deskripsi' => $request->deskripsi,
            'kualifikasi' => $request->kualifikasi,
            'persyaratan_dokumen' => $request->persyaratan_dokumen,
            'skill' => $request->skill,
            'tanggung_jawab' => $request->tanggung_jawab,
            'benefit' => $request->benefit,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil ditambahkan');
    }

    public function show($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return view('admin.lowongan.show', compact('lowongan'));
    }

    public function edit($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        return view('admin.lowongan.edit', compact('lowongan'));
    }

    public function update(Request $request, $id)
    {
        $lowongan = Lowongan::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'divisi' => 'required|string',
            'lokasi' => 'required|string',
            'deadline' => 'required|date',
            'durasi' => 'nullable|string',
            'pendidikan' => 'nullable|string',
            'kualifikasi' => 'nullable|array',
            'persyaratan_dokumen' => 'nullable|array',
            'skill' => 'nullable|array',
            'tanggung_jawab' => 'nullable|array',
            'benefit' => 'nullable|array',
            'deskripsi' => 'nullable|string',
            'status' => 'required|in:buka,tutup',
        ]);

        $lowongan->update([
            'judul' => $request->judul,
            'divisi' => $request->divisi,
            'lokasi' => $request->lokasi,
            'deadline' => $request->deadline,
            'durasi' => $request->durasi,
            'pendidikan' => $request->pendidikan,
            'jurusan' => $request->jurusan,
            'deskripsi' => $request->deskripsi,
            'kualifikasi' => $request->kualifikasi,
            'persyaratan_dokumen' => $request->persyaratan_dokumen,
            'skill' => $request->skill,
            'tanggung_jawab' => $request->tanggung_jawab,
            'benefit' => $request->benefit,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil diperbarui');
    }
    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $lowongan->delete();

        return redirect()->route('admin.lowongan.index')->with('success', 'Lowongan berhasil dihapus');
    }

    public function toggleStatus($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        
        $lowongan->status = $lowongan->status === 'buka' ? 'tutup' : 'buka';
        $lowongan->save();

        return back()->with('success', 'Status lowongan berhasil diperbarui.');
    }
    

}
