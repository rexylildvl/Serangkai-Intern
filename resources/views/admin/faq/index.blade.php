@extends('layouts.admin')

@section('title', 'Data FAQ')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Pertanyaan FAQ</h2>
        <a href="{{ route('admin.faq.create') }}" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah FAQ
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg border border-green-200">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="space-y-4">
        @foreach ($faqs as $faq)
            <div class="p-4 border rounded-lg hover:shadow-md transition-shadow {{ $faq->is_active ? 'bg-white' : 'bg-gray-50' }}">
                <div class="flex justify-between items-start gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3">
                            <h3 class="font-semibold text-gray-800 text-lg">{{ $faq->pertanyaan }}</h3>
                            <span class="text-xs px-2 py-1 rounded-full {{ $faq->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-600' }}">
                                {{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                        <div class="prose max-w-none text-gray-600 mt-2">
                            {!! $faq->jawaban !!}
                        </div>
                    </div>

                    {{-- Toggle Aktif --}}
                    <form action="{{ route('admin.faq.toggle', $faq->id) }}" method="POST" class="flex-shrink-0">
                        @csrf
                        @method('PATCH')
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" onchange="this.form.submit()" class="sr-only peer" {{ $faq->is_active ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                        </label>
                    </form>
                </div>

                <div class="mt-4 flex gap-2">
                    <a href="{{ route('admin.faq.edit', $faq->id) }}" 
                       class="text-sm px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-600 transition-colors flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Edit
                    </a>
                    <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus FAQ ini?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm px-4 py-2 rounded-md bg-red-500 text-white hover:bg-red-600 transition-colors flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="mt-6">
        {{ $faqs->links('pagination::tailwind') }}
    </div>
</div>

<style>
    .prose {
        line-height: 1.6;
    }
    .prose p {
        margin-bottom: 0.5em;
    }
    .prose ul, .prose ol {
        padding-left: 1.5em;
        margin-bottom: 0.5em;
    }
    .prose li {
        margin-bottom: 0.25em;
    }
</style>
@endsection




