@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Galeri Foto</h1>
        <a href="{{ route('admin.galeri.create') }}"
           class="inline-flex items-center px-4 py-2 bg-[#7aa06e] hover:bg-[#678a5c] text-white text-sm font-semibold rounded-lg shadow">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Tambah Foto
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if($galeri->isEmpty())
        <p class="text-gray-600">Belum ada foto yang diunggah.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($galeri as $item)
                    <div class="group relative bg-white rounded-lg shadow overflow-hidden border border-gray-200">
                    <!-- Foto -->
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Galeri" class="w-full h-48 object-cover">

                    <!-- Hover Overlay -->
                    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm flex flex-col items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition duration-300 ease-in-out">
                        <!-- Tombol Lihat Detail -->
                        <a href="{{ route('admin.galeri.show', $item->id) }}"
                        class="px-4 py-1 rounded-full text-white bg-yellow-500/80 hover:bg-yellow-600/90 text-sm font-medium shadow-md transition">
                            Lihat Detail
                        </a>

                        <!-- Tombol Edit -->
                        <a href="{{ route('admin.galeri.edit', $item->id) }}"
                        class="px-4 py-1 rounded-full text-white bg-blue-500/80 hover:bg-blue-600/90 text-sm font-medium shadow-md transition">
                            Edit
                        </a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus foto ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-4 py-1 rounded-full text-white bg-red-500/80 hover:bg-red-600/90 text-sm font-medium shadow-md transition">
                                Hapus
                            </button>
                        </form>
                    </div>

                    <!-- Judul -->
                    <div class="p-4">
                        <h3 class="text-sm font-semibold text-gray-800">{{ $item->judul }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
