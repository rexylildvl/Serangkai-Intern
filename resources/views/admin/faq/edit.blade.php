@extends('layouts.admin')

@section('title', 'Edit FAQ')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Edit FAQ</h2>

    <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="pertanyaan" class="block font-medium text-gray-700">Pertanyaan</label>
            <input type="text" name="pertanyaan" id="pertanyaan" 
                   value="{{ old('pertanyaan', $faq->pertanyaan) }}" 
                   class="w-full border px-3 py-2 rounded @error('pertanyaan') border-red-500 @enderror">
            @error('pertanyaan')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="jawaban" class="block font-medium text-gray-700">Jawaban</label>
            <textarea name="jawaban" id="jawaban" rows="6" 
                      class="w-full border px-3 py-2 rounded @error('jawaban') border-red-500 @enderror">{{ old('jawaban', $faq->jawaban) }}</textarea>
            @error('jawaban')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Perbarui</button>
        <a href="{{ route('admin.faq.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
    </form>
</div>

<style>
    ol {
        list-style-type: decimal !important;
        margin-left: 1.5rem;
    }
    ul {
        list-style-type: disc !important;
        margin-left: 1.5rem;
    }
</style>
@endsection

@push('scripts')
<!-- CKEditor 5 CDN -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create(document.querySelector('#jawaban'), {
        toolbar: [
            'heading', '|',
            'bold', 'italic', 'bulletedList', 'numberedList', '|',
            'undo', 'redo'
        ]
    })
    .catch(error => {
        console.error(error);
    });
    
</script>
@endpush
