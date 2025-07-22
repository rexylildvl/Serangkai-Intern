<x-app-layout>
    <section class="bg-[#E7EFC7] min-h-screen py-8 sm:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-6">
                <h1 class="text-2xl sm:text-3xl font-bold text-[#3B3B1A] mb-3 font-serif">Peluang Magang Terbaru</h1>
                <div class="w-20 h-1 bg-[#AEC8A4] mx-auto mb-3"></div>
                <p class="text-base text-[#626F47] max-w-2xl mx-auto">
                    Temukan kesempatan magang yang sesuai dengan minat dan kompetensi Anda
                </p>
            </div>

            <!-- Job Listings Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($lowongans as $job)
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border border-[#E7EFC7] overflow-hidden group h-full flex flex-col">
                        <!-- Job Header -->
                        <div class="p-4 sm:p-5 border-b border-[#E7EFC7]">
                            <h3 class="text-lg font-bold text-[#3B3B1A] mb-2 font-serif group-hover:text-[#626F47] transition-colors duration-300 line-clamp-2">
                                {{ $job->judul }}
                            </h3>
                            <span class="inline-block px-2.5 py-0.5 text-xs font-medium text-[#8A784E] bg-[#F0F5E6] rounded-full">
                                {{ $job->jurusan ?? 'Semua Jurusan' }}
                            </span>
                        </div>

                        <!-- Job Details -->
                        <div class="p-4 sm:p-5 flex-grow">
                            <ul class="space-y-2 mb-4">
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
                        <div class="p-4 sm:p-5 pt-0">
                            <a href="{{ route('lowongan.show', $job->id) }}" class="block w-full text-center bg-[#AEC8A4] hover:bg-[#8A9E7F] text-[#3B3B1A] font-medium py-2 px-4 rounded-md transition-colors duration-300 text-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
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