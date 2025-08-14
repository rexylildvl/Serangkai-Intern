@extends('layouts.admin')

@section('title', 'Data FAQ')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <h2 class="text-3xl font-bold text-gray-800">Daftar Pertanyaan FAQ</h2>
        <a href="{{ route('admin.faq.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition-all duration-300 flex items-center gap-2 shadow-md hover:shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah FAQ
        </a>
    </div>

    @if (session('success'))
        <div class="mb-8 p-4 bg-green-100 text-green-800 rounded-lg border-l-4 border-green-600 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="space-y-6">
        @foreach ($faqs as $faq)
            <div class="p-6 border border-gray-200 rounded-xl hover:shadow-lg transition-all duration-300 {{ $faq->is_active ? 'bg-white' : 'bg-gray-50' }}">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                    <div class="flex-1">
                        <div class="flex flex-wrap items-center gap-3 mb-3">
                            <h3 class="font-bold text-gray-800 text-xl">{{ $faq->pertanyaan }}</h3>
                            <span class="text-sm px-3 py-1 rounded-full {{ $faq->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-600' }}">
                                {{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                        <div class="prose max-w-none text-gray-700">
                            {!! $faq->jawaban !!}
                        </div>
                    </div>

                    {{-- Toggle Aktif --}}
                    <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center">
                        <form action="{{ route('admin.faq.toggle', $faq->id) }}" method="POST" class="flex-shrink-0">
                            @csrf
                            @method('PATCH')
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" onchange="this.form.submit()" class="sr-only peer" {{ $faq->is_active ? 'checked' : '' }}>
                                <div class="w-12 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                            </label>
                        </form>

                        <div class="flex gap-3">
                            <a href="{{ route('admin.faq.edit', $faq->id) }}" 
                               class="px-5 py-2.5 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition-all duration-300 flex items-center gap-2 shadow hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" 
                                  onsubmit="return confirm('Yakin ingin menghapus FAQ ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-5 py-2.5 rounded-lg bg-red-500 hover:bg-red-600 text-white transition-all duration-300 flex items-center gap-2 shadow hover:shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="mt-8">
        {{ $faqs->links('pagination::tailwind') }}
    </div>
</div>

<style>
    .prose {
        line-height: 1.7;
        font-size: 1.05rem;
    }
    .prose p {
        margin-bottom: 0.75em;
    }
    .prose ul, .prose ol {
        padding-left: 1.75em;
        margin-bottom: 0.75em;
    }
    .prose ol {
        list-style-type: decimal;
    }
    .prose ul {
        list-style-type: disc;
    }
    .prose li {
        margin-bottom: 0.5em;
    }
    .prose a {
        color: #ff9800;
        text-decoration: underline;
    }
    .prose a:hover {
        color: #e68900;
    }
</style>
@endsection
