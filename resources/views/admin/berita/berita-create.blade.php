@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tambah Berita</h1>
<form action="#" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block font-medium">Judul</label>
        <input type="text" name="judul" class="w-full border px-4 py-2 rounded">
    </div>
    <div>
        <label class="block font-medium">Isi Berita</label>
        <textarea name="isi" class="w-full border px-4 py-2 rounded"></textarea>
    </div>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
