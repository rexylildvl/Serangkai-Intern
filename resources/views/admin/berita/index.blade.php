@extends('layouts.admin')

@section('title', 'Data Berita')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Data Berita</h1>
    <a href="{{ route('admin.berita.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">+ Tambah Berita</a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
    </div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach($news as $item)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden relative group transition-all duration-300">
            <img src="{{ asset('storage/' . $item->foto) }}" alt="Foto Berita"
                class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">

            <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $item->judul }}</h3>
                <p class="text-sm text-gray-500 mb-4">
                    Diposting: {{ \Carbon\Carbon::parse($item->tanggal_posting)->translatedFormat('l, Y-m-d') }}
                </p>

                <div class="flex items-center justify-between opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <a href="{{ route('admin.berita.show', $item->id) }}"
                        class="text-blue-600 hover:underline text-sm font-medium">Lihat Detail</a>
                    <a href="{{ route('admin.berita.edit', $item->id) }}"
                        class="text-indigo-600 hover:underline text-sm font-medium">Edit</a>
                    <form action="{{ route('admin.berita.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline text-sm font-medium">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
