<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\Lowongan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\PendaftarExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminPendaftarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $pendaftars = Pendaftaran::with('lowongan')
            ->when($search, function ($query) use ($search) {
                $query->where('nama_lengkap', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhere('universitas', 'like', '%'.$search.'%')
                    ->orWhere('status', 'like', '%'.$search.'%');
            })
            ->latest()
            ->paginate(10);

        return view('admin.pendaftar.index', compact('pendaftars'));
    }

    public function show($id)
    {
        $pendaftar = Pendaftaran::with('lowongan')->findOrFail($id);
        return view('admin.pendaftar.show', compact('pendaftar'));
    }

    public function edit($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        return view('admin.pendaftar.edit', compact('pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->update($request->all());
        return redirect()->route('admin.pendaftar.index')->with('success', 'Data pendaftar diperbarui.');
    }

    public function destroy($id)
    {
        $pendaftar = Pendaftaran::findOrFail($id);
        $pendaftar->delete();
        return back()->with('success', 'Data pendaftar dihapus.');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Menunggu,Diterima,Ditolak'
        ]);

        try {
            $pendaftar = Pendaftaran::findOrFail($id);
            $oldStatus = $pendaftar->status;
            $pendaftar->status = $request->status;
            $pendaftar->save();

            // Cek jika status berubah ke "Diterima" dan user_id tidak null
            if ($request->status === 'Diterima' && $pendaftar->user_id) {
                $user = \App\Models\User::find($pendaftar->user_id);
                if ($user) {
                    $user->kategori = 'magang';
                    $user->save();
                }
            }

            $message = sprintf(
                'Status pendaftar %s berhasil diubah dari %s menjadi %s',
                $pendaftar->nama_lengkap,
                $oldStatus,
                $request->status
            );

            return back()->with('success', $message);

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memperbarui status: ' . $e->getMessage());
        }
    }


    public function byLowongan($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        $pendaftars = Pendaftaran::where('lowongan_id', $id)->latest()->get();

        return view('admin.pendaftar.by-lowongan', compact('lowongan', 'pendaftars'));
    }

    public function exportPdf($id)
    {
        $pendaftar = Pendaftaran::with('lowongan')->findOrFail($id);

        $pdf = Pdf::loadView('admin.pendaftar.pdf', compact('pendaftar'));

        return $pdf->download('detail-pendaftar-' . $pendaftar->nama_lengkap . '.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new PendaftarExport, 'data_pendaftar.xlsx');
    }

}
