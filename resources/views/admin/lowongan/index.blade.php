@extends('layouts.admin')

@section('title', 'Daftar Lowongan Magang')

@section('content')
<div class="max-w-6xl mx-auto px-4">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Daftar Lowongan Magang</h2>
        <a href="{{ route('admin.banner.create') }}"
            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            + Tambah Lowongan
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @forelse($lowongans as $lowongan)
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-5 flex flex-col justify-between hover:shadow-md transition">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-1">
                        {{ $lowongan->judul }}
                    </h3>
                    <p class="text-sm text-gray-500">{{ $lowongan->divisi }} — {{ $lowongan->lokasi }}</p>
                    <p class="text-sm text-gray-400 mt-2">📅 Deadline: {{ \Carbon\Carbon::parse($lowongan->deadline)->format('d M Y') }}</p>
                </div>

                <div class="mt-4 flex justify-between items-center">
                    <a href="{{ route('admin.lowongan.show', $lowongan->id) }}"
                       class="text-sm text-blue-600 hover:underline">Detail</a>

                    <div class="flex gap-2">
                        <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}"
                           class="inline-flex items-center px-3 py-1.5 text-sm bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200">
                            Edit
                        </a>
                        <form action="{{ route('admin.lowongan.destroy', $lowongan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus lowongan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center px-3 py-1.5 text-sm bg-red-100 text-red-600 rounded hover:bg-red-200">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500 col-span-full">Belum ada lowongan magang yang ditambahkan.</p>
        @endforelse
    </div>
</div>
@endsection