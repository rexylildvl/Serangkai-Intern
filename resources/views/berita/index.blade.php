<x-app-layout>
    <section class="relative bg-cover bg-center bg-no-repeat min-h-screen py-20" 
        style="background-image: url('/images/putih.jpg')" 
        x-data="{ open: false, selected: {} }">
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm z-0"></div>
        <!-- Professional gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/60 via-slate-800/40 to-slate-900/60"></div>
        <div class="absolute inset-0 bg-[#3B3B1A]/10"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6">
            <!-- Elegant header section -->
            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-4xl font-serif font-bold text-white mb-4 tracking-tight">
                    Berita Terkini Program Magang
                </h1>
                
                <div class="w-24 h-0.5 bg-[#AEC8A4] mx-auto mb-6"></div>
                
                <p class="text-white/90 text-lg max-w-2xl mx-auto leading-relaxed font-light">
                    Ikuti perkembangan seputar Program Magang Mahasiswa Profesional di PT Tiga Serangkai
                </p>
            </div>

            <!-- Elegant search bar -->
            <form method="GET" action="{{ route('berita.index') }}" class="mb-12 flex justify-center">
                <div class="relative max-w-md w-full">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" ...></svg>
                    </div>
                    <input type="text" 
                        name="search"
                        value="{{ request('search') }}"
                        class="block w-full pl-12 pr-4 py-3 bg-white/95 backdrop-blur-sm border border-white/20 rounded-full text-slate-700 placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-[#AEC8A4]/50 focus:border-transparent shadow-lg text-sm"
                        placeholder="Cari berita magang...">
                </div>
            </form>


            <!-- Professional news grid -->
            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">
                @foreach ($allNews as $news)
                <article class="group cursor-pointer flex flex-col h-full">
                    <div class="bg-white/95 backdrop-blur-sm rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 flex flex-col h-full">
                                    
                            <!-- Image section -->
                            <div class="relative h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $news->foto) }}" 
                                     alt="{{ $news->judul }}" 
                                     class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                                
                                <!-- Subtle overlay -->
                                <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors duration-300"></div>
                            </div>

                            <!-- Content section -->
                            <div class="p-6">
                                <!-- Date badge -->
                                <div class="mb-4">
                                    <div class="inline-flex items-center text-xs font-medium text-[#626F47] bg-[#AEC8A4]/10 px-3 py-1.5 rounded-full">
                                        <svg class="w-3 h-3 mr-2 text-[#AEC8A4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($news->tanggal)->locale('id')->translatedFormat('d F Y') }}
                                    </div>
                                </div>

                                <!-- Title - with line clamp to prevent card stretching -->
                                <h2 class="text-lg font-bold text-slate-800 mb-4 leading-tight font-serif group-hover:text-[#3B3B1A] transition-colors duration-300 line-clamp-2">
                                    {{ $news->judul }}
                                </h2>

                                <!-- Excerpt if available -->
                                @if(isset($news->excerpt))
                                <p class="text-slate-600 text-sm mb-5 leading-relaxed line-clamp-3">
                                    {{ $news->excerpt }}
                                </p>
                                @endif

                                <!-- Read more link -->
                                <div class="pt-2 border-t border-slate-100">
                                    <a href="{{ route('berita.show', $news->id) }}" 
                                       class="inline-flex items-center text-sm font-medium text-[#626F47] hover:text-[#3B3B1A] transition-colors duration-300 group/link">
                                        <span>Baca Selengkapnya</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Professional bottom spacing -->
            <div class="mt-16 text-center">
                <div class="w-24 h-px bg-gradient-to-r from-transparent via-white/30 to-transparent mx-auto"></div>
            </div>
        </div>
    </section>
</x-app-layout>