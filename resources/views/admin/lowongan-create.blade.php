@extends('layouts.admin')

@section('title', 'Tambah Lowongan')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tambah Lowongan</h1>
<form action="#" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block font-medium">Judul Lowongan</label>
        <input type="text" name="judul" class="w-full border px-4 py-2 rounded">
    </div>
    <div>
        <label class="block font-medium">Deskripsi</label>
        <textarea name="deskripsi" class="w-full border px-4 py-2 rounded"></textarea>
    </div>
    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
