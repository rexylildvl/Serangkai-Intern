@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')
<h1 class="text-2xl font-bold mb-4">{{ $berita->judul }}</h1>
<p class="text-sm text-gray-500 mb-2">Diposting: {{ $berita->hari_posting }}, {{ $berita->tanggal_posting }}</p>
<img src="{{ asset('storage/' . $berita->foto) }}" class="w-full max-w-xl mb-4 rounded shadow">
<div class="prose">{!! nl2br(e($berita->berita)) !!}</div>
@endsection
