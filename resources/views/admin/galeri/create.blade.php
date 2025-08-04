@extends('layouts.admin')

@section('title', 'Tambah Galeri')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    {{-- Header with back button --}}
    <div class="flex items-center mb-8">
        <a href="{{ route('admin.galeri') }}" class="mr-4 text-gray-600 hover:text-gray-900 transition duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
        </a>
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Tambah Galeri Foto</h1>
            <p class="text-sm text-gray-500 mt-1">Tambahkan foto baru ke koleksi galeri</p>
        </div>
    </div>

    {{-- Error Messages --}}
    @if ($errors->any())
    <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-lg shadow-sm">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="text-red-700 font-medium">Terdapat {{ $errors->count() }} kesalahan dalam pengisian:</h3>
        </div>
        <ul class="mt-2 ml-8 list-disc text-sm text-red-600">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
        @csrf

        <div class="p-6 sm:p-8 space-y-6">
            {{-- Judul --}}
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-2">Judul Foto <span class="text-red-500">*</span></label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                       class="block w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#7aa06e] focus:border-[#7aa06e] transition duration-200"
                       placeholder="Contoh: Kegiatan Workshop 2023" required>
                @error('judul')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                          class="block w-full px-4 py-2.5 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#7aa06e] focus:border-[#7aa06e] transition duration-200"
                          placeholder="Deskripsi singkat tentang foto">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Foto Upload --}}
            <div>
                <label for="foto" class="block text-sm font-medium text-gray-700 mb-2">Foto <span class="text-red-500">*</span></label>
                
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-[#7aa06e] transition duration-200">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <label for="foto" class="relative cursor-pointer bg-white rounded-md font-medium text-[#7aa06e] hover:text-[#678a5c]">
                                <span>Upload file</span>
                                <input id="foto" name="foto" type="file" class="sr-only" accept="image/*" required>
                            </label>
                            <p class="pl-1">atau drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, JPEG (maks. 5MB)</p>
                    </div>
                </div>
                
                {{-- Preview --}}
                <div id="preview-container" class="mt-4 hidden">
                    <div class="relative">
                        <img id="preview-foto" class="w-full h-64 object-cover rounded-lg shadow-md border">
                        <button type="button" onclick="removePreview()" class="absolute top-2 right-2 bg-white p-1 rounded-full shadow-md hover:bg-gray-100">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                @error('foto')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Tombol Simpan --}}
        <div class="bg-gray-50 px-6 py-4 flex justify-end">
            <button type="submit" class="px-6 py-2.5 bg-gradient-to-r from-[#7aa06e] to-[#8bb07e] hover:from-[#678a5c] hover:to-[#7aa06e] text-white font-medium rounded-lg shadow-md transition-all duration-200 hover:shadow-lg transform hover:-translate-y-0.5">
                <svg class="w-5 h-5 mr-2 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                </svg>
                Simpan Foto
            </button>
        </div>
    </form>
</div>

{{-- Preview Script --}}
<script>
    const fotoInput = document.getElementById('foto');
    const previewContainer = document.getElementById('preview-container');
    const previewImage = document.getElementById('preview-foto');

    fotoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            };
            
            reader.readAsDataURL(file);
        }
    });

    function removePreview() {
        fotoInput.value = '';
        previewContainer.classList.add('hidden');
        previewImage.src = '';
    }
</script>
@endsection


