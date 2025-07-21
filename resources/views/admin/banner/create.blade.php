@extends('layouts.admin')

@section('title', 'Tambah Banner')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-gray-700 mb-4">Tambah Banner</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}" class="w-full mt-1 p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full rounded-md shadow-sm">{{ old('deskripsi', $banner->deskripsi ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Gambar</label>
            <input type="file" name="gambar" class="w-full mt-1 p-2 border rounded" accept="image/*" required>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.banner.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
