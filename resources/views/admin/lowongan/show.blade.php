@extends('layouts.admin')

@section('title', 'Detail Lowongan')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Detail Lowongan Magang</h2>
            <p class="text-sm text-gray-500 mt-1">Informasi lengkap lowongan magang</p>
        </div>
        <a href="{{ route('admin.lowongan.index') }}" class="text-sm text-green-600 hover:underline flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </a>
    </div>

    <div class="bg-gray-50 rounded-lg overflow-hidden">
        <!-- Header Informasi -->
        <div class="px-6 py-4 bg-green-50 border-b border-green-100">
            <h3 class="text-lg font-medium text-green-800">{{ $lowongan->judul }}</h3>
            <div class="flex flex-wrap items-center gap-4 mt-2 text-sm text-green-600">
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    {{ $lowongan->divisi }}
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    {{ $lowongan->lokasi }}
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Deadline: {{ \Carbon\Carbon::parse($lowongan->deadline)->format('d M Y') }}
                </span>
            </div>
        </div>

        <!-- Detail Informasi -->
        <div class="p-6 space-y-6">
            @if($lowongan->durasi || $lowongan->pendidikan || $lowongan->jurusan)
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @if($lowongan->durasi)
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Durasi Magang</h4>
                    <p class="mt-1 text-gray-800">{{ $lowongan->durasi }}</p>
                </div>
                @endif
                
                @if($lowongan->pendidikan)
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Pendidikan Minimal</h4>
                    <p class="mt-1 text-gray-800">{{ $lowongan->pendidikan }}</p>
                </div>
                @endif

                @if($lowongan->jurusan)
                <div>
                    <h4 class="text-sm font-medium text-gray-500">Jurusan yang Dibutuhkan</h4>
                    <p class="mt-1 text-gray-800">{{ $lowongan->jurusan }}</p>
                </div>
                @endif
            </div>
            @endif

            @if($lowongan->deskripsi)
            <div>
                <h4 class="text-sm font-medium text-gray-500">Deskripsi Lowongan</h4>
                <div class="mt-2 p-4 bg-white border border-gray-200 rounded-md">
                    <p class="text-gray-700 whitespace-pre-line">{{ $lowongan->deskripsi }}</p>
                </div>
            </div>
            @endif

            <!-- Bagian List -->
            @php
                $sections = [
                    'kualifikasi' => 'Kualifikasi',
                    'persyaratan_dokumen' => 'Persyaratan Dokumen',
                    'skill' => 'Keahlian yang Dibutuhkan',
                    'tanggung_jawab' => 'Tanggung Jawab',
                    'benefit' => 'Benefit Magang'
                ];
            @endphp

            @foreach($sections as $field => $title)
                @if($lowongan->$field && count($lowongan->$field) > 0)
                <div>
                    <h4 class="text-sm font-medium text-gray-500">{{ $title }}</h4>
                    <ul class="mt-2 space-y-2">
                        @foreach($lowongan->$field as $item)
                        <li class="flex items-start">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="ml-2 text-gray-700">{{ $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-6 flex justify-between items-center pt-6 border-t border-gray-200">
        <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}" 
           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
            </svg>
            Edit Lowongan
        </a>
        
        <a href="{{ route('admin.pendaftar.byLowongan', $lowongan->id) }}" 
           class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
            <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            Lihat Pendaftar
        </a>
    </div>
</div>
@endsection