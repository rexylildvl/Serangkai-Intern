<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\LogbookExport;
use Maatwebsite\Excel\Facades\Excel;

class AdminLogbookController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('kategori', 'magang');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('pendaftaran.lowongan', function ($q2) use ($search) {
                      $q2->where('judul', 'like', "%{$search}%");
                  });
            });
        }

        $pesertaMagang = $query->with('pendaftaran.lowongan')->paginate(10);

        return view('admin.logbooks.index', compact('pesertaMagang'));
    }

    public function show($id)
    {
        $user = User::with(['pendaftaran.lowongan', 'logbooks'])->findOrFail($id);
        return view('admin.logbooks.show', compact('user'));
    }

    public function export($id)
    {
        $user = User::findOrFail($id);
        $filename = 'Logbook_' . str_replace(' ', '_', strtolower($user->name)) . '.xlsx';

        return Excel::download(new \App\Exports\LogbookExport($id), $filename);
    }

    
}
