<x-app-layout>
    <section class="py-12 sm:py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Article Container -->
            <article class="bg-white rounded-xl shadow-sm border border-[#E7EFC7] p-6 sm:p-8 md:p-10">
                <!-- Title and Date -->
                <header class="mb-8">
                    <div class="flex items-center text-sm text-[#8A784E] mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Dipublikasikan pada {{ \Carbon\Carbon::parse($news->tanggal)->locale('id')->translatedFormat('l, j F Y') }}
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-bold text-[#3B3B1A] leading-tight mb-6 font-serif">
                        {{ $news->judul }}
                    </h1>
                    <div class="w-20 h-1 bg-[#AEC8A4] rounded-full"></div>
                </header>

                <!-- Featured Image -->
                @if($news->foto)
                    <figure class="mb-10 rounded-lg overflow-hidden shadow-md border border-[#E7EFC7]">
                        <img src="{{ asset('storage/' . $news->foto) }}" alt="{{ $news->judul }}" 
                            class="w-full h-auto max-h-96 object-cover">
                        @if($news->caption)
                            <figcaption class="text-sm text-center text-[#626F47] mt-2 px-4">
                                {{ $news->caption }}
                            </figcaption>
                        @endif
                    </figure>
                @endif

                <!-- Article Content -->
                <div class="prose prose-lg max-w-none text-[#3B3B1A] 
                          prose-p:mb-6 prose-p:leading-relaxed prose-p:text-justify
                          prose-headings:text-[#3B3B1A] prose-headings:font-serif
                          prose-a:text-[#626F47] prose-a:underline hover:prose-a:text-[#3B3B1A]
                          prose-ul:list-disc prose-ul:pl-6 prose-ul:my-4
                          prose-ol:list-decimal prose-ol:pl-6 prose-ol:my-4
                          prose-blockquote:border-l-4 prose-blockquote:border-[#AEC8A4] prose-blockquote:pl-4 prose-blockquote:italic prose-blockquote:text-[#626F47]">
                    {!! nl2br(e($news->berita)) !!}
                </div>

                <!-- Back Button -->
                <footer class="mt-12 pt-6 border-t border-[#E7EFC7]">
                    <a href="{{ route('berita.index') }}" class="inline-flex items-center text-[#626F47] hover:text-[#3B3B1A] transition-colors duration-300">
                        Kembali ke Daftar Berita
                    </a>
                </footer>
            </article>
        </div>
    </section>
</x-app-layout>