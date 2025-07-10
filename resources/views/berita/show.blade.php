<x-app-layout>
<section class="bg-[#F8FAF4] py-16">
    <div class="max-w-4xl mx-auto px-4">
        <!-- Judul dan Tanggal -->
        <h1 class="text-3xl sm:text-4xl font-bold text-[#3B3B1A] leading-tight mb-2">
            {{ $news->judul }}
        </h1>
        <p class="text-sm text-[#626F47] mb-8">
            Dipublikasikan pada {{ \Carbon\Carbon::parse($news->tanggal)->translatedFormat('l, j F Y') }}
        </p>

        <!-- Gambar -->
        @if($news->foto)
            <div class="mb-8">
                <img src="{{ asset('storage/' . $news->foto) }}" alt="{{ $news->judul }}" class="w-full rounded-lg shadow-md">
            </div>
        @endif

        <!-- Isi Berita -->
        <div class="prose max-w-none text-[#3B3B1A] prose-p:mb-4 prose-p:text-justify prose-p:leading-relaxed">
            {!! nl2br(e($news->berita)) !!}
        </div>
    </div>
</section>
</x-app-layout>
