@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Tambah Berita Baru</h1>
            <p class="text-sm text-gray-500 mt-1">Isi form berikut untuk menambahkan berita baru</p>
        </div>
        <a href="{{ route('admin.berita.index') }}" 
           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            ← Kembali ke Daftar Berita
        </a>
    </div>

    @if($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Terdapat {{ $errors->count() }} kesalahan dalam pengisian form</h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Judul -->
        <div class="bg-white shadow-sm rounded-lg p-5">
            <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Berita <span class="text-red-500">*</span></label>
            <input type="text" name="judul" id="judul" required value="{{ old('judul') }}"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
            @error('judul')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Foto -->
        <div class="bg-white shadow-sm rounded-lg p-5">
            <label for="foto" class="block text-sm font-medium text-gray-700 mb-1">Foto Berita <span class="text-red-500">*</span></label>
            <div class="mt-1 flex items-center">
                <div class="relative w-full">
                    <input type="file" name="foto" id="foto" accept="image/*" required
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                </div>
            </div>
            <p class="mt-1 text-xs text-gray-500">Format: JPG, PNG (Maksimal 2MB)</p>
            @error('foto')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Isi Berita -->
        <div class="bg-white shadow-sm rounded-lg p-5">
            <label for="berita" class="block text-sm font-medium text-gray-700 mb-1">Isi Berita <span class="text-red-500">*</span></label>
            <textarea name="berita" id="berita" rows="10" required
                      class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">{{ old('berita') }}</textarea>
            @error('berita')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tanggal Posting -->
        <div class="bg-white shadow-sm rounded-lg p-5">
            <label for="tanggal_posting" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Posting <span class="text-red-500">*</span></label>
            <input type="date" name="tanggal_posting" id="tanggal_posting" required value="{{ old('tanggal_posting', now()->format('Y-m-d')) }}"
                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm">
            @error('tanggal_posting')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end gap-4 pt-6">
            <a href="{{ route('admin.berita.index') }}" 
               class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Batal
            </a>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                Simpan Berita
            </button>
        </div>
    </form>
</div>
@endsection