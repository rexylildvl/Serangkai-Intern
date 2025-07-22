<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminPendaftarController extends Controller
{
    public function index()
    {
        $pendaftars = Pendaftaran::latest()->get();
        return view('admin.pendaftar.index', compact('pendaftars'));
    }

    public function show($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        return view('admin.pendaftar.show', compact('pendaftar'));
    }

    public function edit($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        return view('admin.pendaftar.edit', compact('pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            
        ]);

        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->update($request->all());

        return redirect()->route('admin.pendaftar.index')->with('success', 'Data peserta berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->delete();

        return back()->with('success', 'Peserta berhasil dihapus');
    }

    public function updateStatus(Request $request, $id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->status = $request->status;
        $pendaftar->save();

        return back()->with('success', 'Status berhasil diperbarui');
    }
}

