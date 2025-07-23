<?php
namespace App\Exports;

use App\Models\Logbook;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LogbookExport implements FromView
{
    protected $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function view(): View
    {
        return view('exports.logbooks', [
            'logbooks' => Logbook::where('user_id', $this->user_id)->get()
        ]);
    }
}
