<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $id_lowongan = $request->query('id_lowongan');
        return view('pendaftaran.index', compact('id_lowongan'));
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap'    => 'required',
            'jenis_kelamin'   => 'required',
            'tempat_lahir'    => 'required',
            'tanggal_lahir'   => 'required|date',
            'alamat'          => 'required',
            'no_hp'           => 'required',
            'email'           => 'required|email',
            'cv'              => 'required|file|mimes:pdf|max:5120',
            'portofolio'      => 'nullable|file|mimes:pdf|max:5120',
            'universitas'     => 'required',
            'jurusan'         => 'required',
            'jenjang'         => 'required',
            'semester'        => 'required|numeric|min:4',
            'bidang'          => 'required',
            'periode'         => 'required|in:2 bulan,3 bulan,4 bulan,5 bulan,6 bulan',
            'tujuan'          => 'required',
            'keahlian'        => 'required',
            'lowongan_id'     => 'required|integer|exists:lowongan_magangs,id',
        ]);

        // Simpan file
        $data['cv'] = $request->file('cv')->store('cv', 'public');
        if ($request->hasFile('portofolio')) {
            $data['portofolio'] = $request->file('portofolio')->store('portofolio', 'public');
        }

        // Default status
        $data['status'] = 'Menunggu';

        Pendaftaran::create($data);

        return redirect()->route('lowongan.show', $data['lowongan_id'])->with('success', 'Pendaftaran berhasil!');
    }

    public function show($id)
    {
        $pendaftaran = \App\Models\Pendaftaran::with('lowongan')->findOrFail($id);
        return view('pendaftaran.detail', compact('pendaftaran'));
    }
    // Tambahkan ini ke dalam PendaftaranController

    public function riwayat()
    {
        $userEmail = auth()->user()->email;

        $pendaftarans = Pendaftaran::with('lowongan')
            ->where('email', $userEmail)
            ->latest()
            ->get(); // atau ->paginate(5) jika mau pagination

        return view('pendaftaran.histori', compact('pendaftarans'));
    }


}
