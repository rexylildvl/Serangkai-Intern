@extends('layouts.admin')

@section('title', 'Daftar Lowongan Magang')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg shadow-sm flex items-start">
            <svg class="h-5 w-5 text-green-500 flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <div class="ml-3">
                <p class="text-sm text-green-700">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Manajemen Lowongan Magang</h1>
            <p class="text-sm text-gray-500 mt-1">Kelola daftar lowongan magang yang tersedia</p>
        </div>
        <a href="{{ route('admin.lowongan.create') }}"
            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors duration-200">
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Lowongan
        </a>
    </div>

    @if($lowongans->isEmpty())
        <div class="bg-white rounded-xl shadow-sm p-8 text-center border border-gray-100">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="mt-3 text-lg font-medium text-gray-900">Belum ada lowongan</h3>
            <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan lowongan magang baru.</p>
            <div class="mt-6">
                <a href="{{ route('admin.lowongan.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors duration-200">
                    Tambah Lowongan
                </a>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($lowongans as $lowongan)
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition duration-200 ease-in-out">
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-semibold tracking-wide uppercase bg-green-100 text-green-800">
                                {{ $lowongan->divisi }}
                            </span>
                            <span class="text-xs font-medium text-gray-500">
                                <svg class="w-4 h-4 inline mr-1 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $lowongan->lokasi }}
                            </span>
                        </div>
                        
                        <h3 class="text-lg font-semibold text-gray-900 leading-tight mb-2 line-clamp-2">
                            {{ $lowongan->judul }}
                        </h3>

                        <div class="flex items-center justify-between mt-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                {{ \Carbon\Carbon::parse($lowongan->deadline)->format('d M Y') }}
                            </div>
                            
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $lowongan->status === 'tutup' || \Carbon\Carbon::parse($lowongan->deadline)->isPast() ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                {{ $lowongan->status === 'tutup' || \Carbon\Carbon::parse($lowongan->deadline)->isPast() ? 'Ditutup' : 'Buka' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 px-5 py-4 border-t border-gray-100">
                        <div class="flex flex-wrap justify-between items-center gap-3">
                            <div class="flex space-x-2">
                                <a href="{{ route('admin.lowongan.show', $lowongan->id) }}" 
                                   class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors duration-200">
                                    Detail
                                </a>
                                
                                <a href="{{ route('admin.pendaftar.byLowongan', $lowongan->id) }}"
                                   class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors duration-200">
                                    Pendaftar
                                </a>
                            </div>
                            
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.lowongan.edit', $lowongan->id) }}" 
                                   class="p-1.5 text-gray-500 hover:text-yellow-600 rounded-full hover:bg-yellow-50 transition-colors duration-200" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                
                                <form action="{{ route('admin.lowongan.destroy', $lowongan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus lowongan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-gray-500 hover:text-red-600 rounded-full hover:bg-red-50 transition-colors duration-200" title="Hapus">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <div class="mt-3 pt-3 border-t border-gray-200">
                            <form action="{{ route('admin.lowongan.toggle', $lowongan->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium text-gray-700">Status Lowongan:</span>
                                    <div class="flex items-center space-x-4">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="status" value="buka" 
                                                   class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300"
                                                   {{ $lowongan->status === 'buka' && !\Carbon\Carbon::parse($lowongan->deadline)->isPast() ? 'checked' : '' }}
                                                   onchange="this.form.submit()">
                                            <span class="ml-2 text-sm text-gray-700">Aktif</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="status" value="tutup" 
                                                   class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300"
                                                   {{ $lowongan->status === 'tutup' || \Carbon\Carbon::parse($lowongan->deadline)->isPast() ? 'checked' : '' }}
                                                   onchange="this.form.submit()">
                                            <span class="ml-2 text-sm text-gray-700">Tutup</span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        
        @if(method_exists($lowongans, 'links'))
            <div class="mt-8">
                {{ $lowongans->links() }}
            </div>
        @endif
    @endif
</div>
@endsection