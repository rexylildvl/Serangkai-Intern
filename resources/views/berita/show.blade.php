<x-app-layout>
    <section class="relative bg-cover bg-center bg-no-repeat min-h-screen py-20" 
        style="background-image: url('/images/putih.jpg')">
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm z-0"></div>
        <!-- Professional gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/60 via-slate-800/40 to-slate-900/60"></div>
        <div class="absolute inset-0 bg-[#3B3B1A]/10"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6">
            <!-- Article Container -->
            <article class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl border border-white/20 p-8 md:p-12">
                
                <!-- Title and Date -->
                <header class="mb-10">
                    <!-- Category badge -->
                    <div class="inline-flex items-center justify-center mb-6">
                        <span class="bg-[#AEC8A4]/15 text-[#3B3B1A] px-4 py-2 rounded-full text-sm font-medium border border-[#AEC8A4]/30">
                            Program Magang
                        </span>
                    </div>
                    
                    <!-- Publication date -->
                    <div class="flex items-center text-sm text-[#626F47] mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-[#AEC8A4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Dipublikasikan pada {{ \Carbon\Carbon::parse($news->tanggal)->locale('id')->translatedFormat('l, j F Y') }}
                    </div>
                    
                    <!-- Article title -->
                    <h1 class="text-3xl md:text-4xl lg:text-4xl font-bold text-slate-800 leading-tight mb-6 font-serif break-words">
                        {{ $news->judul }}
                    </h1>
                    
                    <!-- Decorative line -->
                    <div class="w-24 h-1 bg-[#AEC8A4] rounded-full"></div>
                </header>

                <!-- Featured Image -->
                @if($news->foto)
                    <figure class="mb-12 rounded-2xl overflow-hidden shadow-xl">
                        <img src="{{ asset('storage/' . $news->foto) }}" alt="{{ $news->judul }}" 
                            class="w-full h-auto max-h-96 object-cover">
                        @if($news->caption)
                            <figcaption class="text-sm text-center text-[#626F47] mt-4 px-4 italic">
                                {{ $news->caption }}
                            </figcaption>
                        @endif
                    </figure>
                @endif

                <!-- Article Content -->
                <div class="prose prose-lg max-w-none text-slate-700 w-full
                          prose-p:mb-6 prose-p:leading-relaxed prose-p:text-slate-700
                          prose-headings:text-slate-800 prose-headings:font-serif prose-headings:font-bold
                          prose-h1:text-3xl prose-h2:text-2xl prose-h3:text-xl
                          prose-a:text-[#626F47] prose-a:underline hover:prose-a:text-[#3B3B1A] prose-a:transition-colors
                          prose-ul:list-disc prose-ul:pl-6 prose-ul:my-6 prose-ul:text-slate-700
                          prose-ol:list-decimal prose-ol:pl-6 prose-ol:my-6 prose-ol:text-slate-700
                          prose-li:mb-2 prose-li:text-slate-700
                          prose-blockquote:border-l-4 prose-blockquote:border-[#AEC8A4] prose-blockquote:pl-6 prose-blockquote:py-2 prose-blockquote:italic prose-blockquote:text-[#626F47] prose-blockquote:bg-[#AEC8A4]/5 prose-blockquote:rounded-r-lg
                          prose-img:max-w-full prose-img:h-auto prose-img:mx-auto prose-img:rounded-lg prose-img:shadow-md
                          prose-strong:text-slate-800 prose-strong:font-bold
                          prose-em:text-slate-600 prose-em:italic
                          break-words whitespace-normal overflow-wrap-anywhere">
                    {!! nl2br(e($news->berita)) !!}
                </div>

                <!-- Article Footer -->
                <footer class="mt-16 pt-8 border-t border-slate-200">
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                        <!-- Back to list -->
                        <a href="{{ route('berita.index') }}" 
                           class="inline-flex items-center bg-gradient-to-r from-[#626F47] to-[#3B3B1A] text-white px-6 py-3 rounded-xl text-sm font-semibold hover:from-[#3B3B1A] hover:to-[#626F47] transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 group">
                            Kembali ke Daftar Berita
                        </a>
                        
                        <!-- Share section (optional) -->
                        <div class="text-sm text-slate-500">
                            <span>Bagikan artikel ini:</span>
                            <div class="flex space-x-3 mt-6">
                                <!-- Facebook Share -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                target="_blank" rel="noopener noreferrer"
                                class="w-8 h-8 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors duration-300"
                                title="Bagikan ke Facebook">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                        <path d="M22 12.07C22 6.48 17.52 2 12 2S2 6.48 2 12.07c0 4.84 3.44 8.86 8 9.8v-6.92H8v-2.88h2V9.41c0-2 1.2-3.1 3.03-3.1.88 0 1.8.16 1.8.16v1.98h-1.01c-.99 0-1.29.62-1.29 1.25v1.51h2.2l-.35 2.88h-1.85v6.92c4.56-.94 8-4.96 8-9.8z" />
                                    </svg>
                                </a>

                                <!-- Twitter Share -->
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($news->judul) }}"
                                target="_blank" rel="noopener noreferrer"
                                class="w-8 h-8 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition-colors duration-300"
                                title="Bagikan ke Twitter">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                        <path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.3 4.3 0 001.88-2.37 8.6 8.6 0 01-2.72 1.04 4.28 4.28 0 00-7.3 3.9 12.14 12.14 0 01-8.8-4.47 4.26 4.26 0 001.32 5.7 4.23 4.23 0 01-1.94-.54v.05a4.29 4.29 0 003.44 4.2 4.27 4.27 0 01-1.93.07 4.29 4.29 0 004 2.97A8.6 8.6 0 012 19.54 12.1 12.1 0 008.29 21c7.55 0 11.68-6.26 11.68-11.68 0-.18 0-.36-.01-.54A8.3 8.3 0 0022.46 6z" />
                                    </svg>
                                </a>

                                <!-- WhatsApp Share -->
                                <a href="https://wa.me/?text={{ urlencode($news->judul . ' ' . request()->fullUrl()) }}"
                                target="_blank" rel="noopener noreferrer"
                                class="w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition-colors duration-300"
                                title="Bagikan ke WhatsApp">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-4 h-4">
                                        <path d="M20.52 3.48A11.79 11.79 0 0012 0C5.37 0 0 5.37 0 12c0 2.11.55 4.15 1.61 5.97L0 24l6.21-1.59A11.9 11.9 0 0012 24c6.63 0 12-5.37 12-12 0-3.2-1.25-6.2-3.48-8.52zM12 21.56c-1.7 0-3.36-.45-4.82-1.31l-.35-.2-3.69.94.98-3.59-.23-.37a9.53 9.53 0 01-1.45-5.04c0-5.29 4.31-9.6 9.6-9.6s9.6 4.31 9.6 9.6-4.31 9.6-9.6 9.6zm5.27-7.48c-.29-.14-1.7-.83-1.96-.92s-.46-.14-.65.14-.75.92-.92 1.1-.34.21-.63.07a7.78 7.78 0 01-2.28-1.41 8.6 8.6 0 01-1.59-1.96c-.17-.29 0-.45.13-.6.14-.14.29-.34.43-.51s.2-.29.3-.48a.53.53 0 00-.03-.51c-.08-.14-.65-1.56-.89-2.15s-.47-.47-.65-.48h-.55a1.06 1.06 0 00-.77.36c-.26.29-1 1-1 2.45s1.02 2.84 1.16 3.04c.14.19 2.02 3.2 4.9 4.48.68.3 1.2.48 1.61.62.67.21 1.27.18 1.75.11.53-.08 1.7-.7 1.95-1.37.24-.67.24-1.24.17-1.37-.08-.13-.27-.21-.56-.35z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </footer>
            </article>
        </div>
    </section>
</x-app-layout>