<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function step1(Request $request)
    {
        $id_lowongan = $request->query('id_lowongan');
        return view('pendaftaran.step1', compact('id_lowongan'));
    }

    public function postStep1(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat_domisili' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email',
            'cv' => 'required|file|mimes:pdf|max:2048',
            'portofolio' => 'nullable|file|mimes:pdf|max:2048',
            'id_lowongan' => 'required|integer|exists:lowongan_magang,id',
        ]);


        // Simpan file
        $data['cv'] = $request->file('cv')->store('cv', 'public');
        if ($request->hasFile('portofolio')) {
            $data['portofolio'] = $request->file('portofolio')->store('portofolio', 'public');
        }

        session(['pendaftaran' => $data]);

        return redirect()->route('pendaftaran.step2');
    }

    public function step2()
    {
        if (!session('pendaftaran')) {
            return redirect()->route('pendaftaran.step1');
        }

        return view('pendaftaran.step2');
    }

    public function postStep2(Request $request)
    {
        $data = $request->validate([
            'asal_universitas' => 'required',
            'jurusan' => 'required',
            'jenjang' => 'required',
            'semester' => 'required|numeric|min:1',
        ]);

        $pendaftaran = session('pendaftaran', []);
        session(['pendaftaran' => array_merge($pendaftaran, $data)]);

        return redirect()->route('pendaftaran.step3');
    }

    public function step3()
    {
        if (!session('pendaftaran')) {
            return redirect()->route('pendaftaran.step1');
        }

        return view('pendaftaran.step3');
    }

    public function postStep3(Request $request)
    {
        $data = $request->validate([
            'bidang' => 'required',
            'periode' => 'required|in:2 bulan,3 bulan,4 bulan,5 bulan,6 bulan',
            'tujuan' => 'required',
            'keahlian' => 'required',
        ]);

        $semuaData = array_merge(session('pendaftaran', []), $data);

        // Simpan ke database
        Pendaftaran::create($semuaData);

        // Kosongkan session setelah disimpan
        session()->forget('pendaftaran');

        return redirect()->route('beranda')->with('success', 'Pendaftaran berhasil dikirim!');
    }
}
