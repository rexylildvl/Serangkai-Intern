{{-- resources/views/admin/faq/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Data FAQ')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-700">Data FAQ</h2>
        <a href="{{ route('admin.faq.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Tambah FAQ
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="space-y-4">
        @foreach ($faqs as $faq)
            <div class="p-4 border rounded bg-gray-50">
                <div class="flex justify-between items-start">
                    <div>
                        <h3 class="font-semibold text-gray-800">{{ $faq->pertanyaan }}</h3>
                        <div class="text-gray-600 mt-1 faq-content">
                            {!! $faq->jawaban !!}
                        </div>
                    </div>

                    {{-- Checkbox toggle aktif --}}
                    <form action="{{ route('admin.faq.toggle', $faq->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                       <label class="relative inline-flex items-center cursor-pointer mr-3 w-10 h-6">
                            <input type="checkbox" name="is_active" onchange="this.form.submit()" class="sr-only peer" {{ $faq->is_active ? 'checked' : '' }}>
                            
                            {{-- Track background --}}
                            <div class="w-full h-full bg-gray-300 rounded-full peer-checked:bg-green-500 transition-colors duration-300"></div>

                            {{-- Thumb (bulatan putih) --}}
                            <div class="absolute top-[2px] left-[2px] w-5 h-5 bg-white rounded-full shadow-md transform transition-transform duration-300 peer-checked:translate-x-[1.25rem]"></div>
                        </label>
                    </form>

                </div>

                <div class="mt-3 flex gap-2">
                    <a href="{{ route('admin.faq.edit', $faq->id) }}" class="text-sm px-3 py-1 rounded bg-blue-500 text-white hover:bg-blue-600">Edit</a>
                    <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus FAQ ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm px-3 py-1 rounded bg-red-500 text-white hover:bg-red-600">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="mt-6">
        {{ $faqs->links('pagination::tailwind') }}
    </div>
</div>
@endsection




