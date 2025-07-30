<x-app-layout>
    <section class="relative bg-cover bg-center bg-no-repeat min-h-screen py-20" 
        style="background-image: url('/images/gelap.jpg')">
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm z-0"></div>
        <!-- Professional gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/60 via-slate-800/40 to-slate-900/60"></div>
        <div class="absolute inset-0 bg-[#3B3B1A]/10"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6">
            <!-- Elegant header section matching berita.index -->
            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-4xl font-serif font-bold text-white mb-4 tracking-tight">
                    Lowongan Program Magang
                </h1>
                
                <div class="w-24 h-0.5 bg-[#AEC8A4] mx-auto mb-6"></div>
                
                <p class="text-white/90 text-lg max-w-2xl mx-auto leading-relaxed font-light">
                    Temukan kesempatan magang yang sesuai dengan minat dan kompetensi Anda
                </p>
            </div>

            <!-- Job Listings Grid with matching berita.index style -->
            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">
                @foreach($lowongans as $job)
                    <article class="group cursor-pointer flex flex-col h-full">
                        <div class="bg-white/95 backdrop-blur-sm rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 flex flex-col h-full">
                            <!-- Job Header -->
                            <div class="p-6 border-b border-[#E7EFC7]/50">
                                <div class="flex items-start justify-between mb-3 gap-2">
                                    <h3 class="text-lg font-bold text-[#3B3B1A] font-serif group-hover:text-[#626F47] transition-colors duration-300 line-clamp-2 flex-1">
                                        {{ $job->judul }}
                                    </h3>
                                    @php
                                        $isClosed = $job->status === 'tutup' || \Carbon\Carbon::parse($job->deadline)->isPast();
                                    @endphp
                                    <span class="text-xs font-semibold px-2 py-1 rounded-full whitespace-nowrap
                                        {{ $isClosed ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                        {{ $isClosed ? 'Ditutup' : 'Buka' }}
                                    </span>
                                </div>
                                
                                <!-- Pendidikan & Jurusan Container -->
                                <div class="flex flex-wrap items-center gap-3 mt-2">
                                    <!-- Pendidikan -->
                                    <div class="flex items-center text-sm text-[#3B3B1A]">
                                        <svg class="w-4 h-4 mr-1.5 text-[#8A784E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                        <span>{{ $job->pendidikan ?? 'Semua Pendidikan' }}</span>
                                    </div>
                                    
                                    <!-- Separator -->
                                    <span class="text-[#AEC8A4]">•</span>
                                    
                                    <!-- Jurusan -->
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5 text-[#8A784E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                        <span class="text-sm text-[#8A784E] bg-[#F0F5E6] px-2.5 py-0.5 rounded-full">
                                            {{ $job->jurusan ?? 'Semua Jurusan' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Job Details -->
                            <div class="p-6 flex-grow">
                                <ul class="space-y-3 mb-4">
                                    <li class="flex items-start">
                                        <svg class="w-4 h-4 mr-2 mt-0.5 text-[#8A784E] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                        <div>
                                            <div class="text-xs font-medium text-[#626F47]">Lokasi</div>
                                            <div class="text-sm text-[#3B3B1A]">{{ $job->lokasi }}</div>
                                        </div>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-4 h-4 mr-2 mt-0.5 text-[#8A784E] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                        <div>
                                            <div class="text-xs font-medium text-[#626F47]">Deadline</div>
                                            <div class="text-sm text-[#3B3B1A]">{{ $job->deadline ? \Carbon\Carbon::parse($job->deadline)->translatedFormat('d F Y') : 'Tidak terbatas' }}</div>
                                        </div>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-4 h-4 mr-2 mt-0.5 text-[#8A784E] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div>
                                            <div class="text-xs font-medium text-[#626F47]">Durasi</div>
                                            <div class="text-sm text-[#3B3B1A]">{{ $job->durasi }}</div>
                                        </div>
                                    </li>
                                </ul>

                                <!-- Qualifications -->
                                <div class="mb-4">
                                    <h4 class="text-sm font-semibold text-[#3B3B1A] mb-2 flex items-center">
                                        <svg class="w-3.5 h-3.5 mr-1.5 text-[#8A784E]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Kualifikasi
                                    </h4>
                                    <ul class="space-y-1.5 text-xs text-[#626F47]">
                                        @foreach($job->kualifikasi as $kualif)
                                        <li class="flex items-start">
                                            <svg class="w-3.5 h-3.5 mr-1.5 mt-0.5 text-[#8A784E] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                            <span class="flex-1">{{ $kualif }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Apply Button -->
                            <div class="p-6 pt-0">
                                <a href="{{ route('lowongan.show', $job->id) }}" 
                                   class="block w-full text-center bg-[#AEC8A4] hover:bg-[#8A9E7F] text-[#3B3B1A] font-medium py-2 px-4 rounded-md transition-all duration-300 text-sm shadow-md hover:shadow-lg">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Professional bottom spacing matching berita.index -->
            <div class="mt-16 text-center">
                <div class="w-24 h-px bg-gradient-to-r from-transparent via-white/30 to-transparent mx-auto"></div>
            </div>

            <!-- Pagination -->
            @if($lowongans->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $lowongans->links('vendor.pagination.tailwind') }}
            </div>
            @endif
        </div>
    </section>
</x-app-layout>