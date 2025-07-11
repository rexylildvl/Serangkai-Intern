@extends('layouts.admin')

@section('title', 'Data Berita')

@section('content')
<h1 class="text-2xl font-bold mb-6">Data Berita</h1>
<a href="{{ route('admin.berita.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Berita</a>

<!-- Nanti bisa ditambahkan tabel berita di sini -->
@endsection
