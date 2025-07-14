@extends('layouts.admin')

@section('title', 'Edit Galeri')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Judul</label>
                <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}"
                       class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border border-gray-300 p-2 rounded"
                          rows="4">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Foto (biarkan kosong jika tidak diubah)</label>
                <input type="file" name="gambar" accept="image/*">
                <p class="text-sm text-gray-500 mt-1">Foto saat ini:</p>
                <img src="{{ asset('storage/' . $galeri->foto) }}" class="h-32 mt-1 rounded">
            </div>

            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded">
                Simpan Perubahan
            </button>
        </form>
    </div>
@endsection
