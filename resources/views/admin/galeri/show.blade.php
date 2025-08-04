@extends('layouts.admin')

@section('title', 'Detail Galeri')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Back Button --}}
    <a href="{{ route('admin.galeri') }}" 
       class="inline-flex items-center text-[#7aa06e] hover:text-[#678a5c] transition duration-200 mb-6">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        Kembali ke Galeri
    </a>

    {{-- Gallery Detail Card --}}
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
        {{-- Header --}}
        <div class="px-6 py-4 border-b border-gray-200">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">{{ $galeri->judul }}</h1>
            <p class="text-sm text-gray-500 mt-1">
                Diunggah pada: {{ \Carbon\Carbon::parse($galeri->tanggal_upload)->format('d M Y H:i') }}
            </p>
        </div>

        {{-- Image --}}
        <div class="p-6">
            <div class="flex justify-center">
                <img src="{{ asset('storage/' . $galeri->foto) }}" 
                     alt="{{ $galeri->judul }}"
                     class="max-w-full h-auto max-h-[500px] rounded-lg shadow-md object-contain">
            </div>
        </div>

        {{-- Description --}}
        <div class="px-6 pb-6">
            <div class="prose max-w-none text-gray-700">
                @if($galeri->deskripsi)
                    {!! nl2br(e($galeri->deskripsi)) !!}
                @else
                    <p class="text-gray-400 italic">Tidak ada deskripsi</p>
                @endif
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="bg-gray-50 px-6 py-4 flex justify-end space-x-3">
            <a href="{{ route('admin.galeri.edit', $galeri->id) }}"
               class="px-4 py-2 border border-[#7aa06e] text-[#7aa06e] hover:bg-[#7aa06e] hover:text-white rounded-lg transition duration-200">
                Edit
            </a>
            <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition duration-200"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                    Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
