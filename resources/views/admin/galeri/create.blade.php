@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Galeri</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
            <ul class="list-disc pl-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded-xl shadow-md border border-gray-200">
        @csrf

        <div>
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="judul" id="judul" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('judul') }}" required>
        </div>

        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('deskripsi') }}</textarea>
        </div>

        <div>
            <label for="foto" class="block text-sm font-medium text-gray-700">Foto</label>
            <input type="file" name="foto" id="foto" class="mt-1 block w-full" accept="image/*" required>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-[#7aa06e] hover:bg-[#678a5c] text-white text-sm font-semibold rounded-lg shadow">
                Simpan
            </button>
        </div>
    </form>
@endsection
