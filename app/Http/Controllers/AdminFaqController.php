<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminFaqController extends Controller
{
    public function index()
    {
        return view('admin.faq.index');
    }
}
