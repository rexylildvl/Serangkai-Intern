<?php

namespace App\Http\Controllers;

use App\Models\CoeVideo;
use Illuminate\Http\Request;

class CoeVideoController extends Controller
{
    public function index()
    {
        $video = CoeVideo::latest()->first(); // ambil video terbaru
        return view('coe.index', compact('video'));
    }

    public function create()
    {
        return view('coe.create');
    }
    public function show($id)
    {
        $video = CoeVideo::findOrFail($id);
        return view('coe.show', compact('video'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'video' => 'required|mimes:mp4,mov,avi,webm|max:51200' // max 50MB
        ]);

        $path = $request->file('video')->store('videos', 'public');

        CoeVideo::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'video_path' => $path
        ]);

        return redirect()->route('coe.index')->with('success', 'Video berhasil ditambahkan.');
    }
}
