@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Berita</h1>

    {{-- Menampilkan error validasi --}}
    @if($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
            <ul class="list-disc list-inside text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Judul --}}
        <div>
            <label for="judul" class="block font-medium text-sm text-gray-700">Judul</label>
            <input type="text" name="judul" id="judul" required value="{{ old('judul') }}"
                   class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm p-2">
            @error('judul')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Foto --}}
        <div>
            <label for="foto" class="block font-medium text-sm text-gray-700">Foto</label>
            <input type="file" name="foto" id="foto" accept="image/*" required
                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
            @error('foto')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Isi Berita --}}
        <div>
            <label for="berita" class="block font-medium text-sm text-gray-700">Isi Berita</label>
            <textarea name="berita" id="berita" rows="6" required
                      class="w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm p-2">{{ old('berita') }}</textarea>
            @error('berita')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md shadow-sm transition duration-200">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
