<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\LogbookExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class LogbookController extends Controller
{
    public function index()
    {
        $logbooks = Logbook::where('user_id', Auth::id())->orderBy('tanggal', 'desc')->get();
        return view('logbooks.index', compact('logbooks'));
    }

    public function create()
    {
        return view('logbooks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'aktivitas' => 'required|string',
            'kendala' => 'nullable|string',
            'progress' => 'required|integer|min:0|max:100',
            'status' => 'required|in:On Progress,Done',
        ]);

        Logbook::create([
            'user_id' => Auth::id(),
            'tanggal' => $request->tanggal,
            'aktivitas' => $request->aktivitas,
            'kendala' => $request->kendala,
            'progress' => $request->progress,
            'status' => $request->status,
        ]);

        return redirect()->route('logbooks.index')->with('success', 'Logbook berhasil ditambahkan.');
    }

    public function edit(Logbook $logbook)
    {
        // Cegah edit logbook milik orang lain
        $this->authorizeLogbook($logbook);

        return view('logbooks.edit', compact('logbook'));
    }

    public function update(Request $request, Logbook $logbook)
    {
        $this->authorizeLogbook($logbook);

        $request->validate([
            'tanggal' => 'required|date',
            'aktivitas' => 'required|string',
            'kendala' => 'nullable|string',
            'progress' => 'required|integer|min:0|max:100',
            'status' => 'required|in:On Progress,Done',
        ]);

        $logbook->update($request->all());

        return redirect()->route('logbooks.index')->with('success', 'Logbook berhasil diperbarui.');
    }

    private function authorizeLogbook(Logbook $logbook)
    {
        if ($logbook->user_id !== Auth::id()) {
            abort(403, 'Akses ditolak.');
        }
    }
    public function destroy(Logbook $logbook)
    {
        $this->authorizeLogbook($logbook);

        $logbook->delete();

        return redirect()->route('logbooks.index')->with('success', 'Logbook berhasil dihapus.');
    }

    public function exportExcel()
    {
        return Excel::download(new LogbookExport(Auth::id()), 'logbook.xlsx');
    }
    
    public function exportPdf()
    {
        $logbooks = Logbook::where('user_id', Auth::id())->get();
        $pdf = Pdf::loadView('exports.logbooks-pdf', compact('logbooks'));
        return $pdf->download('logbook.pdf');
    }


}
