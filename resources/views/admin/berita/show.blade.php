@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        {{-- Header Section --}}
        <div class="p-6 sm:p-8 border-b border-gray-100">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">{{ $berita->judul }}</h1>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Diposting: {{ $berita->hari_posting }}, {{ $berita->tanggal_posting }}
                    </div>
                </div>
                <a href="{{ route('admin.berita.edit', $berita->id) }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Edit Berita
                </a>
            </div>
        </div>

        {{-- Featured Image --}}
        <div class="p-6">
            <img src="{{ asset('storage/' . $berita->foto) }}" 
                 alt="{{ $berita->judul }}"
                 class="w-full max-w-2xl mx-auto rounded-lg shadow-md object-cover">
        </div>

        {{-- Content --}}
        <div class="p-6 sm:p-8 pt-0">
            <div class="prose max-w-none text-gray-700">
                {!! nl2br(e($berita->berita)) !!}
            </div>
        </div>

        {{-- Footer Actions --}}
        <div class="bg-gray-50 px-6 py-4 flex flex-col sm:flex-row justify-end items-center gap-3">
            <a href="{{ route('admin.berita.index') }}" 
               class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50">
                Kembali ke Daftar Berita
            </a>
            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Hapus Berita
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
