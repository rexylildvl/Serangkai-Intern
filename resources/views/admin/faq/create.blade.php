@extends('layouts.admin')

@section('title', 'Tambah FAQ')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Tambah FAQ</h2>

    <form action="{{ route('admin.faq.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="pertanyaan" class="block font-medium text-gray-700">Pertanyaan</label>
            <input type="text" name="pertanyaan" id="pertanyaan" value="{{ old('pertanyaan') }}" class="w-full border px-3 py-2 rounded @error('pertanyaan') border-red-500 @enderror">
            @error('pertanyaan')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="jawaban" class="block font-medium text-gray-700">Jawaban</label>
            <textarea name="jawaban" id="jawaban" rows="6" class="w-full border px-3 py-2 rounded @error('jawaban') border-red-500 @enderror">{{ old('jawaban') }}</textarea>
            @error('jawaban')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        <a href="{{ route('admin.faq.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection

@push('scripts')
<!-- Tambahkan CKEditor dari CDN -->
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
