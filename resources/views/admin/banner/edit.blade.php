@extends('layouts.admin')

@section('title', 'Edit Banner')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Edit Banner</h2>
        <a href="{{ route('admin.banner.index') }}" class="text-sm text-gray-600 hover:text-gray-800 flex items-center gap-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Kembali ke Daftar
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-lg border border-red-200">
            <h3 class="font-medium mb-2">Terjadi kesalahan:</h3>
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Banner</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $banner->judul) }}" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                   placeholder="Masukkan judul banner" required>
        </div>

        <div>
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4" 
                      class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                      placeholder="Masukkan deskripsi banner">{{ old('deskripsi', $banner->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
            <div class="relative w-full h-48 bg-gray-100 rounded-md overflow-hidden border border-gray-200">
                <img src="{{ asset('storage/' . $banner->gambar) }}" alt="Banner saat ini" 
                     class="w-full h-full object-contain">
                <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-1">
                    Gambar Saat Ini
                </div>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Ganti Gambar (Opsional)</label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center" id="upload-container">
                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true" id="upload-icon">
                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex text-sm text-gray-600 justify-center">
                        <label for="gambar" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                            <span>Upload file baru</span>
                            <input id="gambar" name="gambar" type="file" class="sr-only" accept="image/*" onchange="previewImage(this)">
                        </label>
                        <p class="pl-1">atau drag and drop</p>
                    </div>
                    <p class="text-xs text-gray-500">
                        PNG, JPG, JPEG (Maks. 5MB)
                    </p>
                </div>
                <div id="image-preview" class="hidden text-center w-full">
                    <img id="preview" src="#" alt="Preview Gambar Baru" class="mx-auto h-48 object-contain">
                    <button type="button" onclick="removeImage()" class="mt-2 text-sm text-red-600 hover:text-red-800">
                        Hapus Gambar Baru
                    </button>
                </div>
                <div id="file-info" class="hidden text-sm text-gray-700 mt-2"></div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Update Banner
            </button>
        </div>
    </form>
</div>

<script>
    function previewImage(input) {
        const uploadContainer = document.getElementById('upload-container');
        const imagePreview = document.getElementById('image-preview');
        const preview = document.getElementById('preview');
        const fileInfo = document.getElementById('file-info');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                uploadContainer.classList.add('hidden');
                imagePreview.classList.remove('hidden');
                
                // Show file info
                fileInfo.classList.remove('hidden');
                fileInfo.innerHTML = `
                    <span class="font-medium">File terpilih:</span> ${input.files[0].name}<br>
                    <span class="font-medium">Ukuran:</span> ${(input.files[0].size / 1024 / 1024).toFixed(2)} MB
                `;
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage() {
        const uploadContainer = document.getElementById('upload-container');
        const imagePreview = document.getElementById('image-preview');
        const fileInput = document.getElementById('gambar');
        const fileInfo = document.getElementById('file-info');
        
        fileInput.value = '';
        uploadContainer.classList.remove('hidden');
        imagePreview.classList.add('hidden');
        fileInfo.classList.add('hidden');
    }

    // Handle drag and drop
    const dropArea = document.querySelector('.border-dashed');
    
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        dropArea.classList.add('border-blue-500', 'bg-blue-50');
    }

    function unhighlight() {
        dropArea.classList.remove('border-blue-500', 'bg-blue-50');
    }

    dropArea.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        const fileInput = document.getElementById('gambar');
        
        if (files.length) {
            fileInput.files = files;
            previewImage(fileInput);
        }
    }
</script>
@endsection

