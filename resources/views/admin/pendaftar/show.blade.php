@extends('layouts.admin')

@section('title', 'Detail Pendaftar')

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Notifikasi -->
    @if(session('success'))
        <div class="mb-8 bg-green-50 border-l-4 border-green-500 p-4 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-green-700">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="mb-8 bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Detail Pendaftar</h1>
            <p class="text-sm text-gray-500 mt-1">Informasi lengkap pendaftar magang</p>
        </div>
        <div class="flex items-center gap-3">          
            <a href="{{ route('admin.pendaftar.exportPdf', $pendaftar->id) }}" 
            class="inline-flex items-center px-4 py-2 border border-green-600 rounded-md shadow-sm text-sm font-medium text-green-600 bg-white hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Export ke PDF
            </a>

            <a href="{{ route('admin.pendaftar.index')}}" 
            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                ← Kembali ke Daftar
            </a>
        </div>

    </div>

    <!-- Card Utama -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <!-- Header Lowongan -->
        <div class="px-6 py-5 bg-green-50 border-b border-green-100">
            <h3 class="text-lg font-medium text-green-800">Lowongan Magang</h3>
            <p class="mt-1 text-sm text-green-600">{{ $pendaftar->lowongan->judul ?? 'Tidak tersedia' }}</p>
        </div>

        <!-- Informasi Utama -->
        <div class="px-6 py-5 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-medium text-gray-900">{{ $pendaftar->nama_lengkap }}</h3>
                    <p class="mt-1 text-sm text-gray-500">{{ $pendaftar->universitas }} - {{ $pendaftar->jurusan }}</p>
                </div>
                <span class="px-3 py-1 rounded-full text-xs font-medium 
                    @if($pendaftar->status === 'Diterima') bg-green-100 text-green-800
                    @elseif($pendaftar->status === 'Ditolak') bg-red-100 text-red-800
                    @else bg-yellow-100 text-yellow-800 @endif">
                    {{ $pendaftar->status }}
                </span>
            </div>
        </div>

        <!-- Grid Informasi -->
        <div class="px-6 py-5 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Kolom 1 -->
            <div class="space-y-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Email</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $pendaftar->email }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Nomor HP</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $pendaftar->no_hp }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Jenis Kelamin</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $pendaftar->jenis_kelamin }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Tempat, Tanggal Lahir</p>
                    <p class="mt-1 text-sm text-gray-900">
                        {{ $pendaftar->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftar->tanggal_lahir)->translatedFormat('d F Y') }}
                    </p>
                </div>
            </div>

            <!-- Kolom 2 -->
            <div class="space-y-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Jenjang & Semester</p>
                    <p class="mt-1 text-sm text-gray-900">
                        {{ $pendaftar->jenjang }} (Semester {{ $pendaftar->semester }})
                    </p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Bidang Minat</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $pendaftar->bidang }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Periode Magang</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $pendaftar->periode }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Alamat</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $pendaftar->alamat }}</p>
                </div>
            </div>
        </div>

        <!-- Informasi Tambahan -->
        <div class="px-6 py-5 border-t border-gray-200">
            <div class="space-y-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Tujuan Magang</p>
                    <p class="mt-1 text-sm text-gray-900 whitespace-pre-line">{{ $pendaftar->tujuan }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Keahlian</p>
                    <p class="mt-1 text-sm text-gray-900 whitespace-pre-line">{{ $pendaftar->keahlian }}</p>
                </div>
            </div>
        </div>

        <!-- Form Status -->
        <div class="px-6 py-5 bg-gray-50 border-t border-gray-200">
            <form action="{{ route('admin.pendaftar.updateStatus', $pendaftar->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
                    <div class="w-full sm:w-auto">
                        <label for="status" class="sr-only">Ubah Status</label>
                        <div class="flex items-center gap-3">
                            <span class="text-sm font-medium text-gray-700 whitespace-nowrap">Ubah Status:</span>
                            <select name="status" id="status" class="block w-full min-w-[120px] px-3 py-2 h-9 text-sm border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500">
                                <option value="Menunggu" {{ $pendaftar->status === 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="Diterima" {{ $pendaftar->status === 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                <option value="Ditolak" {{ $pendaftar->status === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="h-9 px-4 py-2 text-sm bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-1 focus:ring-green-500 whitespace-nowrap">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Dokumen Pendukung -->
        <div class="px-6 py-5 bg-white border-t border-gray-200">
            <h4 class="text-sm font-medium text-gray-900 mb-3">Dokumen Pendukung</h4>
            <div class="flex flex-wrap gap-4">
                <a href="{{ asset('storage/' . $pendaftar->cv) }}" target="_blank" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Lihat CV
                </a>
                @if ($pendaftar->portofolio)
                <a href="{{ asset('storage/' . $pendaftar->portofolio) }}" target="_blank" class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <svg class="-ml-0.5 mr-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Lihat Portofolio
                </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection