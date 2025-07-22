@php
use Illuminate\Support\Facades\Storage;
@endphp

<x-app-layout>
    <!-- Hero Section with Carousel -->
    <section class="relative overflow-hidden">
        <div class="carousel relative w-full h-[500px] overflow-hidden">
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
                <a href="{{ route('lowongan.index') }}" class="inline-block bg-[#626F47] hover:bg-[#3B3B1A] text-white px-6 py-3 rounded-full transition duration-300">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Alur Pendaftaran -->
    <section class="bg-[#AEC8A4] py-20">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-10 text-center text-[#3B3B1A]">Alur Pendaftaran</h2>
            <div class="relative">
                <div class="hidden md:block absolute top-8 left-0 right-0 h-1 bg-[#8A784E] mx-16"></div>
                <div class="flex flex-col md:flex-row justify-between items-center gap-6 md:gap-0">
                    @php
                        $steps = [
                            'Isi Formulir' => 'bg-[#E7EFC7] text-[#3B3B1A]',
                            'Unggah Dokumen' => 'bg-[#E7EFC7] text-[#3B3B1A]',
                            'Seleksi' => 'bg-[#E7EFC7] text-[#3B3B1A]',
                            'Pengumuman' => 'bg-[#E7EFC7] text-[#3B3B1A]',
                            'Mulai Magang' => 'bg-[#E7EFC7] text-[#3B3B1A]'
                        ];
                    @endphp
                    @foreach($steps as $step => $colors)
                        <div class="flex flex-col items-center z-10">
                            <div class="w-16 h-16 rounded-full flex items-center justify-center text-xl font-bold {{ $colors }} shadow-md">
                                {{ $loop->iteration }}
                            </div>
                            <p class="mt-3 font-medium text-[#3B3B1A] text-center">{{ $step }}</p>
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

            <div class="grid md:grid-cols-3 gap-6">
                @forelse($lowongans as $lowongan)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 p-6 border border-[#AEC8A4]">
                        <h3 class="text-lg font-bold text-[#3B3B1A] mb-1">{{ $lowongan->judul }}</h3>
                        <p class="text-sm text-[#8A784E] mb-4">{{ $lowongan->divisi ?? '-' }}</p>
                        <ul class="text-sm text-[#626F47] space-y-1 mb-4">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 mt-[3px] text-[#3B3B1A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 12.414M6 18V6a2 2 0 012-2h8a2 2 0 012 2v12l-5-5-5 5z"/>
                                </svg>
                                {{ $lowongan->lokasi ?? '-' }}
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 mt-[3px] text-[#3B3B1A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2zm2 4h6"/>
                                </svg>
                                Deadline: {{ \Carbon\Carbon::parse($lowongan->deadline)->translatedFormat('d F Y') }}
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 mt-[3px] text-[#3B3B1A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Durasi: {{ $lowongan->durasi ?? '-' }}
                            </li>
                        </ul>
                        <div class="text-sm text-[#3B3B1A] font-semibold mb-1">Kualifikasi</div>
                        <ul class="text-sm text-[#626F47] space-y-1 mb-4">
                            @foreach(($lowongan->kualifikasi ?? []) as $q)
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 mt-[3px] text-[#3B3B1A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                {{ $q }}
                            </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('lowongan.show', $lowongan->id) }}" class="inline-block w-full text-center bg-[#626F47] hover:bg-[#3B3B1A] text-white font-semibold py-2 rounded-md transition">
                            Lihat Detail
                        </a>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-[#8A784E]">Belum ada lowongan magang.</div>
                @endforelse
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
            
            <div class="grid md:grid-cols-3 gap-6">
                @forelse($news as $item)
                    <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-lg transition duration-300 border border-[#AEC8A4]">
                        <div class="h-48 bg-[#AEC8A4] flex items-center justify-center text-[#3B3B1A] font-medium">
                            @if($item->foto)
                                <img src="{{ asset('storage/'.$item->foto) }}" alt="Berita" class="object-cover w-full h-full">
                            @else
                                <span>Gambar Berita</span>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="font-semibold text-lg mb-2 text-[#3B3B1A]">{{ $item->judul }}</h3>
                            <p class="text-sm text-[#8A784E] mb-4">
                                {{ \Carbon\Carbon::parse($item->tanggal_posting)->translatedFormat('l, d F Y') }}
                            </p>
                            <a href="{{ route('berita.show', $item->id) }}" class="text-[#626F47] hover:text-[#3B3B1A] text-sm font-medium">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-[#8A784E]">Belum ada berita.</div>
                @endforelse
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
    <section class="bg-[#AEC8A4] py-20">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-10 text-center text-[#3B3B1A]">Pertanyaan yang Sering Ditanyakan</h2>

            <div class="space-y-4">
                @forelse($faqs as $faq)
                <div x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="border border-[#8A784E] rounded-xl overflow-hidden bg-[#E7EFC7]">
                    <button
                        @click="open = !open"
                        class="w-full px-6 py-4 text-left font-semibold text-[#3B3B1A] hover:bg-[#DDEBC7] focus:outline-none focus:ring-2 focus:ring-[#626F47] focus:ring-offset-2 transition duration-150 flex justify-between items-center"
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