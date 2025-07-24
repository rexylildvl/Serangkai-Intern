@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white shadow-md rounded-lg overflow-hidden p-6">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Berita</h1>
            <a href="{{ route('admin.berita.index') }}" class="text-green-600 hover:text-green-800 text-sm font-medium">
                ← Kembali ke Daftar Berita
            </a>
        </div>

        {{-- Menampilkan error validasi --}}
        @if($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-red-500 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <h3 class="text-red-800 font-medium">Terjadi kesalahan:</h3>
                </div>
                <ul class="list-disc list-inside text-red-700 mt-2 ml-8">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Judul --}}
            <div>
                <label for="judul" class="block font-medium text-sm text-gray-700 mb-1">Judul Berita <span class="text-red-500">*</span></label>
                <input type="text" name="judul" id="judul" required
                       value="{{ old('judul', $berita->judul) }}"
                       class="w-full mt-1 border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 rounded-md shadow-sm p-2 transition duration-150">
                @error('judul')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Foto --}}
            <div>
                <label for="foto" class="block font-medium text-sm text-gray-700 mb-1">Foto Berita</label>
                <div class="mt-1 flex items-center">
                    <label class="w-full flex flex-col items-center px-4 py-6 bg-white text-green-700 rounded-lg shadow-sm tracking-wide uppercase border border-green-700 cursor-pointer hover:bg-green-50">
                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"/>
                        </svg>
                        <span class="mt-2 text-base leading-normal">Pilih file</span>
                        <input type="file" name="foto" id="foto" accept="image/*" class="hidden">
                    </label>
                </div>
                @error('foto')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror

                @if($berita->foto)
                    <div class="mt-4">
                        <p class="text-sm text-gray-500 mb-2">Foto saat ini:</p>
                        <div class="relative inline-block">
                            <img src="{{ asset('storage/' . $berita->foto) }}" alt="Foto berita" class="w-48 h-32 object-cover rounded-md shadow">
                            <div class="absolute top-0 right-0">
                                <label class="bg-white rounded-full p-1 shadow-md cursor-pointer" title="Hapus foto">
                                    <input type="checkbox" name="hapus_foto" class="hidden">
                                    <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </label>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Isi Berita --}}
            <div>
                <label for="berita" class="block font-medium text-sm text-gray-700 mb-1">Isi Berita <span class="text-red-500">*</span></label>
                <textarea name="berita" id="berita" rows="10" required
                          class="w-full mt-1 border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 rounded-md shadow-sm p-2 transition duration-150">{{ old('berita', $berita->berita) }}</textarea>
                @error('berita')
                    <p class="text-red-600 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <a href="{{ route('admin.berita.index') }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150">
                    <svg class="-ml-1 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection