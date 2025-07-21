@extends('layouts.admin')

@section('title', 'Edit Banner')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-gray-700 mb-4">Edit Banner</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $banner->judul) }}" class="w-full mt-1 p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="3" class="mt-1 block w-full rounded-md shadow-sm">{{ old('deskripsi', $banner->deskripsi ?? '') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Gambar Saat Ini</label>
            <img src="{{ asset('storage/' . $banner->gambar) }}" alt="Banner" class="w-40 h-auto rounded mt-2">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-600">Ganti Gambar (opsional)</label>
            <input type="file" name="gambar" class="w-full mt-1 p-2 border rounded" accept="image/*">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.banner.index') }}" class="text-sm text-gray-600 hover:underline">← Kembali</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
