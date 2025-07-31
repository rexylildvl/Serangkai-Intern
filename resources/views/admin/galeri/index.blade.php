@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Header Section --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Galeri Foto</h1>
            <p class="text-sm text-gray-500 mt-1">Koleksi foto kegiatan dan dokumentasi</p>
        </div>
        <a href="{{ route('admin.galeri.create') }}"
           class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-[#7aa06e] to-[#8bb07e] hover:from-[#678a5c] hover:to-[#7aa06e] text-white text-sm font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:-translate-y-0.5">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Foto
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg shadow-sm">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    {{-- Empty State --}}
    @if($galeri->isEmpty())
        <div class="bg-white rounded-xl shadow-sm p-8 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada foto</h3>
            <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan foto pertama Anda</p>
            <div class="mt-6">
                <a href="{{ route('admin.galeri.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-[#7aa06e] hover:bg-[#678a5c] focus:outline-none">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Foto
                </a>
            </div>
        </div>
    @else
        {{-- Photo Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($galeri as $item)
                <div class="group relative bg-white rounded-xl shadow-md overflow-hidden border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                    {{-- Photo --}}
                    <div class="relative aspect-square overflow-hidden">
                        <img src="{{ asset('storage/' . $item->foto) }}" 
                             alt="{{ $item->judul }}"
                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    </div>

                    {{-- Hover Overlay --}}
                    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm flex flex-col items-center justify-center gap-3 opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out p-4">
                        {{-- View Button --}}
                        <a href="{{ route('admin.galeri.show', $item->id) }}"
                           class="w-full max-w-[160px] flex items-center justify-center px-4 py-2 rounded-lg text-white bg-blue-500/90 hover:bg-blue-600 text-sm font-medium shadow-sm transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Lihat Detail
                        </a>

                        {{-- Edit Button --}}
                        <a href="{{ route('admin.galeri.edit', $item->id) }}"
                           class="w-full max-w-[160px] flex items-center justify-center px-4 py-2 rounded-lg text-white bg-yellow-500/90 hover:bg-yellow-600 text-sm font-medium shadow-sm transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>

                        {{-- Delete Button --}}
                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" class="w-full max-w-[160px]">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="w-full flex items-center justify-center px-4 py-2 rounded-lg text-white bg-red-500/90 hover:bg-red-600 text-sm font-medium shadow-sm transition"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>

                    {{-- Caption --}}
                    <div class="p-4">
                        <h3 class="text-sm font-semibold text-gray-800 truncate">{{ $item->judul }}</h3>
                        <p class="text-xs text-gray-500 mt-1">
                            @if($item->tanggal_upload)
                                {{ \Carbon\Carbon::parse($item->tanggal_upload)->format('d M Y') }}
                            @else
                                Tanggal tidak tersedia
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($galeri->hasPages())
            <div class="mt-8">
                {{ $galeri->links() }}
            </div>
        @endif
    @endif
</div>
@endsection
