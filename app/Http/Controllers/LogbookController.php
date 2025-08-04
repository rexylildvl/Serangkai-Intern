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
    public function index(Request $request)
    {
        $query = Logbook::where('user_id', Auth::id())->orderBy('tanggal', 'desc');
        
        // Add search functionality
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('aktivitas', 'like', '%'.$search.'%')
                  ->orWhere('kendala', 'like', '%'.$search.'%')
                  ->orWhere('status', 'like', '%'.$search.'%');
            });
        }

        $logbooks = $query->paginate(10); // Changed from get() to paginate()
        
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

    public function exportExcel(Request $request)
    {
        $search = $request->search;
        return Excel::download(new LogbookExport(Auth::id(), $search), 'logbook.xlsx');
    }
    
    public function exportPdf(Request $request)
    {
        $query = Logbook::where('user_id', Auth::id());
        
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('aktivitas', 'like', '%'.$search.'%')
                  ->orWhere('kendala', 'like', '%'.$search.'%')
                  ->orWhere('status', 'like', '%'.$search.'%');
            });
        }
        
        $logbooks = $query->get();
        $pdf = Pdf::loadView('exports.logbooks-pdf', compact('logbooks'));
        return $pdf->download('logbook.pdf');
    }
}