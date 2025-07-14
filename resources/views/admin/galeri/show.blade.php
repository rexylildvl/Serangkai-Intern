@extends('layouts.admin')

@section('title', 'Detail Galeri')

@section('content')
    <div class="mb-6">
        <a href="{{ route('admin.galeri') }}"
           class="inline-block mb-4 text-sm text-green-700 hover:underline">&larr; Kembali ke Galeri</a>

        <h1 class="text-2xl font-bold mb-4">{{ $galeri->judul }}</h1>

        <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}"
             class="w-full max-w-lg rounded-lg shadow mb-4">

        <p class="text-gray-600">{{ $galeri->deskripsi }}</p>
    </div>
@endsection
