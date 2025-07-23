@extends('layouts.admin')

@section('title', 'Edit Lowongan')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Lowongan Magang</h2>
        <a href="{{ route('admin.lowongan.index') }}" class="text-sm text-green-600 hover:underline flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali ke Daftar
        </a>
    </div>

    @if ($errors->any())
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

    <form action="{{ route('admin.lowongan.update', $lowongan->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Informasi Dasar -->
        <div class="bg-gray-50 p-5 rounded-lg">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Informasi Dasar Lowongan</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul Lowongan <span class="text-red-500">*</span></label>
                    <input type="text" name="judul" value="{{ old('judul', $lowongan->judul) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Divisi <span class="text-red-500">*</span></label>
                    <input type="text" name="divisi" value="{{ old('divisi', $lowongan->divisi) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi <span class="text-red-500">*</span></label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $lowongan->lokasi) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deadline <span class="text-red-500">*</span></label>
                    <input type="date" name="deadline" value="{{ old('deadline', $lowongan->deadline) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Durasi</label>
                    <input type="text" name="durasi" value="{{ old('durasi', $lowongan->durasi) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Pendidikan Minimal</label>
                    <input type="text" name="pendidikan" value="{{ old('pendidikan', $lowongan->pendidikan) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="bg-gray-50 p-5 rounded-lg">
            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Lowongan</label>
            <textarea name="deskripsi" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500">{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
        </div>

        <!-- Field Dinamis -->
        @php
            $fields = [
                'kualifikasi' => 'Kualifikasi',
                'persyaratan_dokumen' => 'Persyaratan Dokumen',
                'skill' => 'Keahlian yang Dibutuhkan',
                'tanggung_jawab' => 'Tanggung Jawab',
                'benefit' => 'Benefit Magang',
            ];
        @endphp

        @foreach ($fields as $field => $label)
        <div class="bg-gray-50 p-5 rounded-lg">
            <label class="block text-sm font-medium text-gray-700 mb-2">{{ $label }}</label>
            <div id="{{ $field }}-wrapper" class="space-y-3">
                @php
                    $items = old($field, $lowongan->$field ?? []);
                    if (!is_array($items)) $items = [];
                @endphp
                @forelse ($items as $item)
                    <div class="flex gap-3 items-center">
                        <input type="text" name="{{ $field }}[]" value="{{ $item }}" 
                               class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" />
                        <button type="button" onclick="hapusField(this)" 
                                class="text-red-500 hover:text-red-700 p-1 rounded-full hover:bg-red-50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                @empty
                    <div class="flex gap-3 items-center">
                        <input type="text" name="{{ $field }}[]" 
                               class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" />
                        <button type="button" onclick="hapusField(this)" 
                                class="text-red-500 hover:text-red-700 p-1 rounded-full hover:bg-red-50">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                @endforelse
            </div>
            <button type="button" onclick="tambahField('{{ $field }}-wrapper', '{{ $field }}[]')"
                    class="mt-3 inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah {{ $label }}
            </button>
        </div>
        @endforeach

        <!-- Tombol Aksi -->
        <div class="flex justify-between items-center pt-6 border-t border-gray-200">
            <a href="{{ route('admin.lowongan.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Batal
            </a>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    function tambahField(wrapperId, inputName) {
        const wrapper = document.getElementById(wrapperId);
        const div = document.createElement('div');
        div.className = 'flex gap-3 items-center';
        div.innerHTML = `
            <input type="text" name="${inputName}" 
                   class="flex-1 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-green-500 focus:border-green-500" />
            <button type="button" onclick="hapusField(this)" 
                    class="text-red-500 hover:text-red-700 p-1 rounded-full hover:bg-red-50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        `;
        wrapper.appendChild(div);
    }

    function hapusField(button) {
        button.parentElement.remove();
    }
</script>
@endsection