@php
use Illuminate\Support\Facades\Storage;
@endphp

<x-app-layout>
    <!-- Hero Section with Carousel -->
    <section class="relative overflow-hidden">
        <div class="carousel relative w-full h-[570px] overflow-hidden">
            <div class="carousel-inner flex transition-transform duration-700 ease-in-out w-full h-full">
                @foreach ($banners as $banner)
                    <div class="carousel-item w-full flex-shrink-0 relative">
                        <!-- Gambar -->
                        <img src="{{ Storage::url($banner->gambar) }}" alt="Banner" class="object-cover w-full h-full">
                        
                        <!-- Overlay teks judul dan deskripsi -->
                        <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white bg-black/40 px-4">
                            <h1 class="text-4xl font-bold mb-4">{{ $banner->judul }}</h1>
                            @if ($banner->deskripsi)
                                <p class="text-lg">{{ $banner->deskripsi }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Indicators -->
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
                @foreach ($banners as $index => $banner)
                    <button class="carousel-indicator w-3 h-3 rounded-full bg-white/70 hover:bg-white" data-index="{{ $index }}"></button>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Tentang Program -->
    <section class="bg-[#E7EFC7] py-20">
        <div class="max-w-6xl mx-auto px-4 md:flex items-center gap-10">
            <div class="md:w-1/2 bg-[#AEC8A4] h-64 rounded-lg flex items-center justify-center">
                <img src="{{ asset('images/magang.jpg') }}" alt="Program Magang" class="object-cover w-full h-full rounded-lg">
                <!-- <p class="text-[#3B3B1A] font-medium">Gambar ilustrasi program magang</p> -->
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0">
                <h2 class="text-3xl font-bold mb-4 text-[#3B3B1A]">Tentang Program Magang Kami</h2>
                <p class="text-[#626F47] mb-6 leading-relaxed">
                    Program Magang Mahasiswa Profesional di PT Tiga Serangkai merupakan wadah pembelajaran bagi mahasiswa untuk merasakan pengalaman kerja nyata di dunia industri.
                    Dikelola oleh Center of Excellent, program ini dirancang untuk mengembangkan keterampilan, kreativitas, dan profesionalisme peserta
                    dengan bimbingan mentor berpengalaman.
                </p>
                <div class="mt-0">
                    <a href="{{ route('lowongan.index') }}">
                    <button class="px-6 py-2 bg-[#3B3B1A] hover:bg-[#626F47] text-white text-sm font-medium rounded-md shadow hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5">
                        Lihat Lowongan Magang
                    </button>
                    </a> 
                </div>
            </div>
        </div>
    </section>

    <!-- Alur Pendaftaran -->
    <section class="bg-[#AEC8A4] py-16 px-4">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-[#3B3B1A] mb-3">Proses Pendaftaran Magang</h2>
                <p class="text-[#626F47] max-w-2xl mx-auto">Ikuti langkah-langkah berikut untuk bergabung dalam program magang kami</p>
            </div>

            <div class="relative">
                <!-- Garis penghubung -->
                <div class="hidden md:block absolute top-8 left-20 right-20 h-[2px] bg-gradient-to-r from-transparent via-[#8A784E] to-transparent z-0"></div>
                
                <div class="grid grid-cols-1 sm:grid-cols-5 gap-6 sm:gap-4 relative z-10">
                    @php
                        $steps = [
                            [
                                'title' => 'Isi Formulir',
                                'desc' => 'Lengkapi data diri',
                                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>'
                            ],
                            [
                                'title' => 'Unggah Dokumen',
                                'desc' => 'Upload berkas persyaratan',
                                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>'
                            ],
                            [
                                'title' => 'Seleksi',
                                'desc' => 'Proses peninjauan',
                                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>'
                            ],
                            [
                                'title' => 'Pengumuman',
                                'desc' => 'Hasil seleksi',
                                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
                            ],
                            [
                                'title' => 'Mulai Magang',
                                'desc' => 'Onboarding program',
                                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
                            ]
                        ];
                    @endphp

                    @foreach($steps as $step)
                    <div class="flex flex-col items-center group">
                        <div class="w-14 h-14 md:w-16 md:h-16 rounded-full bg-white flex items-center justify-center shadow-md mb-3 border-2 border-[#8A784E] group-hover:border-[#3B3B1A] group-hover:bg-[#E7EFC7] transition-colors duration-200">
                            <div class="text-[#626F47] group-hover:text-[#3B3B1A] transition-colors duration-200">
                                {!! $step['icon'] !!}
                            </div>
                        </div>
                        <div class="text-center">
                            <h3 class="text-sm md:text-base font-semibold text-[#3B3B1A] group-hover:text-[#2a2a12] transition-colors duration-200">{{ $step['title'] }}</h3>
                            <p class="text-xs text-[#626F47] group-hover:text-[#3B3B1A] mt-1 transition-colors duration-200">{{ $step['desc'] }}</p>
                            <div class="text-xs font-medium text-[#8A784E] group-hover:text-[#3B3B1A] mt-1 transition-colors duration-200">
                                Step {{ $loop->iteration }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Lowongan Magang -->
    <section class="bg-[#E7EFC7] py-20">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-[#3B3B1A]">Lowongan Magang Terbaru</h2>
                <a href="{{ route('lowongan.index') }}" class="text-[#626F47] hover:text-[#3B3B1A] font-medium flex items-center">
                    Semua Lowongan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($lowongans as $job)
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-all duration-300 border border-[#E7EFC7] overflow-hidden group h-full flex flex-col">
                        <!-- Job Header -->
                        <div class="p-4 sm:p-5 border-b border-[#E7EFC7]">
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
                            <div class="flex flex-wrap items-center gap-2 mt-2">
                                <!-- Pendidikan -->
                                <div class="flex items-center text-sm text-[#3B3B1A]">
                                    <svg class="w-4 h-4 mr-1 text-[#8A784E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                    </svg>
                                    {{ $job->pendidikan ?? 'Semua Pendidikan' }}
                                </div>
                                <!-- Jurusan -->
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-[#8A784E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                    <span class="text-sm text-[#8A784E] bg-[#F0F5E6] px-2.5 py-0.5 rounded-full">
                                        {{ $job->jurusan ?? 'Semua Jurusan' }}
                                    </span>
                                </div>
                            </div>
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
        </div>
    </div>
</section>


    <!-- Berita -->
    <section class="bg-[#E7EFC7] py-10">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-[#3B3B1A]">Berita Terkini</h2>
                <a href="#" class="text-[#626F47] hover:text-[#3B3B1A] font-medium flex items-center">
                    Semua Berita
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($news as $item)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-[#AEC8A4]/30 hover:border-[#AEC8A4]/60 group">
                        <div class="h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" 
                                class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center text-xs text-[#8A784E] mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('l, d F Y') }}
                            </div>
                            <h3 class="font-semibold text-lg mb-3 text-[#3B3B1A] leading-tight font-serif">
                                {{ $item->judul }}
                            </h3>
                            <a href="{{ route('berita.show', $item->id) }}" class="inline-flex items-center text-sm font-medium text-[#626F47] hover:text-[#3B3B1A] transition-colors duration-300 group-hover:underline">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Galeri -->
    <section class="bg-[#E7EFC7] py-10">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-[#3B3B1A] text-center">Galeri Kegiatan</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-5">
                @forelse($galeris as $galeri)
                    <div class="aspect-square bg-[#AEC8A4] rounded-xl overflow-hidden hover:shadow-xl transition duration-300 flex items-center justify-center text-[#3B3B1A] font-semibold relative group">
                        @if($galeri->foto)
                            <img src="{{ asset('storage/'.$galeri->foto) }}" alt="{{ $galeri->judul }}" class="object-cover w-full h-full group-hover:scale-105 transition duration-300">
                        @else
                            Foto
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 bg-[#3B3B1A]/60 text-white text-xs py-1 px-2 text-center opacity-0 group-hover:opacity-100 transition">
                            {{ $galeri->judul }}
                        </div>
                    </div>
                @empty
                    <div class="col-span-5 text-center text-[#8A784E]">Belum ada foto galeri.</div>
                @endforelse
            </div>
            <div class="text-center mt-10">
                <a href="{{ route('galeri.index') }}" class="inline-block bg-[#626F47] hover:bg-[#3B3B1A] text-white px-6 py-3 rounded-full transition duration-300 shadow-md">
                    Lihat Semua Foto
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ -->
<!-- FAQ Section -->
<section class="bg-[#E7EFC7] py-16 md:py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-[#3B3B1A] font-serif mb-4">Pertanyaan yang Sering Ditanyakan</h2>
            <div class="w-20 h-1 bg-[#AEC8A4] mx-auto rounded-full"></div>
        </div>

        <!-- FAQ Items -->
            <div class="space-y-4">
                @forelse($faqs as $faq)
                <div x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="border border-[#8A784E] rounded-xl overflow-hidden bg-[#E7EFC7]">
                    <button
                        @click="open = !open"
                        class="w-full px-6 py-5 text-left font-medium text-lg text-[#3B3B1A] hover:bg-[#F5F9E8] focus:outline-none transition duration-200 flex justify-between items-center"
                    >
                        <span>{{ $faq->pertanyaan }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#626F47] transition-transform duration-200" :class="{ 'transform rotate-180': open }" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="px-6 pb-4 text-[#626F47] bg-[#F5FBE7]">
                        {{ $faq->jawaban }}
                    </div>
                </div>
                @empty
                    <p class="text-gray-700">Belum ada pertanyaan yang ditambahkan.</p>
                @endforelse
            </div>

            @if ($faqs->count() > 4)
                <div class="mt-10 flex justify-center">
                    <a href="{{ route('faq.index') }}" class="bg-[#3B3B1A] text-white px-6 py-3 rounded-lg shadow hover:bg-[#2e2e13] transition duration-300 font-medium tracking-wide">
                        Lihat Semua Pertanyaan
                    </a>
                </div>
            @endif

        </div>
    </section>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const inner = document.querySelector('.carousel-inner');
            const items = document.querySelectorAll('.carousel-item');
            const indicators = document.querySelectorAll('.carousel-indicator');
            let currentIndex = 0;

            function updateCarousel() {
                const itemWidth = inner.clientWidth;
                inner.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
                indicators.forEach((el, index) => {
                    el.classList.toggle('bg-white', index === currentIndex);
                    el.classList.toggle('bg-white/70', index !== currentIndex);
                });
            }

            indicators.forEach((btn, i) => {
                btn.addEventListener('click', () => {
                    currentIndex = i;
                    updateCarousel();
                });
            });

            window.addEventListener('resize', updateCarousel);
            updateCarousel();

            let autoSlide = setInterval(() => {
                currentIndex = (currentIndex + 1) % items.length;
                updateCarousel();
            }, 5000);

            inner.closest('.carousel').addEventListener('mouseenter', () => clearInterval(autoSlide));
            inner.closest('.carousel').addEventListener('mouseleave', () => {
                autoSlide = setInterval(() => {
                    currentIndex = (currentIndex + 1) % items.length;
                    updateCarousel();
                }, 5000);
            });
        });
    </script>
</x-app-layout>