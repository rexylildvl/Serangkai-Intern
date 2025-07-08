<x-app-layout>
    <!-- Hero Section with Carousel -->
    <section class="bg-gradient-to-r from-blue-50 to-indigo-50 py-20 text-center">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4 text-gray-800">Magang Berkualitas di PT Tiga Serangkai</h1>
            <p class="text-gray-600 text-lg mb-8">Raih pengalaman kerja nyata dan bimbingan langsung dari profesional berpengalaman.</p>
            
            <!-- Carousel -->
            <div class="relative max-w-3xl mx-auto">
                <div class="carousel relative overflow-hidden rounded-lg shadow-lg bg-white">
                    <div class="carousel-inner flex transition-transform duration-300 ease-in-out">
                        <!-- Carousel Items -->
                        <div class="carousel-item w-full flex-shrink-0 p-8">
                            <div class="bg-blue-100 h-64 rounded-lg flex items-center justify-center">
                                <p class="text-xl font-medium">Slide 1</p>
                            </div>
                        </div>
                        <div class="carousel-item w-full flex-shrink-0 p-8">
                            <div class="bg-indigo-100 h-64 rounded-lg flex items-center justify-center">
                                <p class="text-xl font-medium">Slide 2</p>
                            </div>
                        </div>
                        <div class="carousel-item w-full flex-shrink-0 p-8">
                            <div class="bg-purple-100 h-64 rounded-lg flex items-center justify-center">
                                <p class="text-xl font-medium">Slide 3</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Carousel Controls -->
                <button class="carousel-prev absolute left-0 top-1/2 -translate-y-1/2 -ml-4 bg-white p-2 rounded-full shadow-md hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button class="carousel-next absolute right-0 top-1/2 -translate-y-1/2 -mr-4 bg-white p-2 rounded-full shadow-md hover:bg-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                
                <!-- Carousel Indicators -->
                <div class="flex justify-center mt-4 space-x-2">
                    <button class="carousel-indicator w-3 h-3 rounded-full bg-gray-300 hover:bg-blue-500"></button>
                    <button class="carousel-indicator w-3 h-3 rounded-full bg-gray-300 hover:bg-blue-500"></button>
                    <button class="carousel-indicator w-3 h-3 rounded-full bg-gray-300 hover:bg-blue-500"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Tentang Program -->
    <section class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-4 md:flex items-center gap-10">
            <div class="md:w-1/2 bg-gray-100 h-64 rounded-lg flex items-center justify-center">
                <p class="text-gray-500">Gambar ilustrasi program magang</p>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0">
                <h2 class="text-3xl font-bold mb-4 text-gray-800">Tentang Program Magang Kami</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Program magang di PT Tiga Serangkai merupakan wadah pembelajaran bagi mahasiswa untuk merasakan pengalaman kerja nyata di dunia industri. 
                    Dikelola oleh Center of Excellent, program ini dirancang untuk mengembangkan keterampilan, kreativitas, dan profesionalisme peserta 
                    dengan bimbingan mentor berpengalaman.
                </p>
                <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full transition duration-300">
                    Daftar Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Alur Pendaftaran -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-10 text-center text-gray-800">Alur Pendaftaran</h2>
            <div class="relative">
                <!-- Connecting Line -->
                <div class="hidden md:block absolute top-8 left-0 right-0 h-1 bg-blue-200 mx-16"></div>
                
                <div class="flex flex-col md:flex-row justify-between items-center gap-6 md:gap-0">
                    @php
                        $steps = [
                            'Isi Formulir' => 'bg-blue-100 text-blue-800',
                            'Unggah Dokumen' => 'bg-indigo-100 text-indigo-800',
                            'Seleksi' => 'bg-purple-100 text-purple-800',
                            'Pengumuman' => 'bg-pink-100 text-pink-800',
                            'Mulai Magang' => 'bg-green-100 text-green-800'
                        ];
                    @endphp
                    
                    @foreach($steps as $step => $colors)
                        <div class="flex flex-col items-center z-10">
                            <div class="w-16 h-16 rounded-full flex items-center justify-center text-xl font-bold {{ $colors }} shadow-md">
                                {{ $loop->iteration }}
                            </div>
                            <p class="mt-3 font-medium text-gray-700 text-center">{{ $step }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Lowongan Magang -->
    <section class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Lowongan Magang Terbaru</h2>
                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                    Semua Lowongan
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            
            <div class="grid md:grid-cols-3 gap-6">
                @foreach([
                    ['title' => 'Magang Desain Grafis', 'period' => 'Agustus 2025', 'location' => 'Surakarta', 'qualification' => 'Mahasiswa DKV/Seni'],
                    ['title' => 'Magang Penerbitan', 'period' => 'September 2025', 'location' => 'Surakarta', 'qualification' => 'Mahasiswa Sastra/Pendidikan'],
                    ['title' => 'Magang Digital Marketing', 'period' => 'Oktober 2025', 'location' => 'Jakarta', 'qualification' => 'Mahasiswa Marketing/Komunikasi']
                ] as $job)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-3 text-gray-800">{{ $job['title'] }}</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                Periode: {{ $job['period'] }}
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                                Lokasi: {{ $job['location'] }}
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                </svg>
                                Kualifikasi: {{ $job['qualification'] }}
                            </li>
                        </ul>
                        <a href="#" class="mt-4 inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                            Lihat Detail
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Berita -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold text-gray-800">Berita Terkini</h2>
                <a href="#" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                    Semua Berita
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
            
            <div class="grid md:grid-cols-3 gap-6">
                @foreach([
                    ['title' => 'Pembukaan Program Magang 2025', 'date' => now()->subDays(2)],
                    ['title' => 'Wawancara Eksklusif dengan Mentor', 'date' => now()->subDays(5)],
                    ['title' => 'Kenalan dengan Divisi Penerbitan', 'date' => now()->subDays(7)],
                    ['title' => 'Testimoni Alumni Magang 2024', 'date' => now()->subDays(9)],
                    ['title' => 'Cerita Hari Pertama Magang', 'date' => now()->subDays(12)],
                    ['title' => 'Karya Terbaik Divisi Desain', 'date' => now()->subDays(15)]
                ] as $news)
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-48 bg-gray-100 flex items-center justify-center text-gray-400">
                        <span>Gambar Berita</span>
                    </div>
                    <div class="p-6">
                        <h3 class="font-semibold text-lg mb-2 text-gray-800">{{ $news['title'] }}</h3>
                        <p class="text-sm text-gray-500 mb-4">
                            {{ $news['date']->translatedFormat('l, d F Y') }}
                        </p>
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Galeri -->
    <section class="bg-white py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-gray-800">Galeri Kegiatan</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                @for($i = 1; $i <= 10; $i++)
                    <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden hover:shadow-md transition duration-300 flex items-center justify-center text-gray-400">
                        Foto {{ $i }}
                    </div>
                @endfor
            </div>
            <div class="text-center mt-8">
                <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full transition duration-300">
                    Lihat Semua Foto
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="bg-gray-50 py-16">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-3xl font-bold mb-10 text-center text-gray-800">Pertanyaan yang Sering Ditanyakan</h2>
            
            <div class="space-y-4">
                @foreach([
                    'Siapa saja yang bisa mendaftar program magang ini?' => 'Program magang kami terbuka untuk mahasiswa aktif dari berbagai jurusan yang sesuai dengan bidang yang kami tawarkan. Minimal semester 4 untuk program magang reguler.',
                    'Apakah program magang ini berbayar atau gratis?' => 'Program magang kami tidak berbayar (gratis) dan peserta bahkan akan mendapatkan uang saku selama mengikuti program magang.',
                    'Apakah semua posisi magang tersedia secara online?' => 'Sebagian besar posisi magang kami bersifat offline di kantor kami, namun beberapa posisi tertentu memungkinkan untuk bekerja hybrid (kombinasi online dan offline).',
                    'Apakah peserta magang akan mendapat sertifikat?' => 'Ya, peserta yang menyelesaikan program magang dengan baik akan mendapatkan sertifikat magang resmi dari PT Tiga Serangkai.',
                    'Bagaimana jika saya belum punya pengalaman kerja sebelumnya?' => 'Tidak masalah. Program magang kami dirancang untuk membantu peserta mendapatkan pengalaman kerja pertama mereka. Yang penting adalah motivasi dan keseriusan untuk belajar.'
                ] as $question => $answer)
                <div x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                    <button 
                        @click="open = !open" 
                        class="w-full px-6 py-4 text-left font-medium text-gray-800 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 flex justify-between items-center"
                    >
                        <span>{{ $question }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 transition-transform duration-200" :class="{ 'transform rotate-180': open }" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="px-6 pb-4 text-gray-600">
                        {{ $answer }}
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-10">
                <p class="text-gray-600 mb-4">Masih ada pertanyaan lain?</p>
                <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full transition duration-300">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Carousel Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Carousel functionality
            const carousel = document.querySelector('.carousel');
            const inner = document.querySelector('.carousel-inner');
            const items = document.querySelectorAll('.carousel-item');
            const prevBtn = document.querySelector('.carousel-prev');
            const nextBtn = document.querySelector('.carousel-next');
            const indicators = document.querySelectorAll('.carousel-indicator');
            
            let currentIndex = 0;
            const itemWidth = items[0].clientWidth;
            const totalItems = items.length;
            
            function updateCarousel() {
                inner.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
                
                // Update indicators
                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('bg-blue-500', index === currentIndex);
                    indicator.classList.toggle('bg-gray-300', index !== currentIndex);
                });
            }
            
            nextBtn.addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % totalItems;
                updateCarousel();
            });
            
            prevBtn.addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + totalItems) % totalItems;
                updateCarousel();
            });
            
            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    currentIndex = index;
                    updateCarousel();
                });
            });
            
            // Auto-rotate carousel (optional)
            let interval = setInterval(() => {
                currentIndex = (currentIndex + 1) % totalItems;
                updateCarousel();
            }, 5000);
            
            carousel.addEventListener('mouseenter', () => {
                clearInterval(interval);
            });
            
            carousel.addEventListener('mouseleave', () => {
                interval = setInterval(() => {
                    currentIndex = (currentIndex + 1) % totalItems;
                    updateCarousel();
                }, 5000);
            });
            
            // Initialize
            updateCarousel();
        });
    </script>
</x-app-layout>