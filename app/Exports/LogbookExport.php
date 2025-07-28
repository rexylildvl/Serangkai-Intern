<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use App\Models\Logbook;

class LogbookExport implements FromView
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function view(): View
    {
        $logbooks = Logbook::where('user_id', $this->userId)
                        ->orderBy('tanggal', 'desc')
                        ->get();

        return view('exports.logbooks-excel', [
            'logbooks' => $logbooks
        ]);
    }

}