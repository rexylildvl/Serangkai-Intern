@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Berita</h1>

@if($errors->any())
    <div class="mb-4 text-red-600">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label for="judul" class="block font-medium">Judul</label>
        <input type="text" name="judul" id="judul" class="w-full border rounded p-2" value="{{ old('judul', $berita->judul) }}">
    </div>
    <div>
        <label for="foto" class="block font-medium">Foto (opsional)</label>
        <input type="file" name="foto" id="foto" class="w-full">
        <img src="{{ asset('storage/' . $berita->foto) }}" class="w-32 mt-2">
    </div>
    <div>
        <label for="berita" class="block font-medium">Isi Berita</label>
        <textarea name="berita" id="berita" rows="6" class="w-full border rounded p-2">{{ old('berita', $berita->berita) }}</textarea>
    </div>
    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection