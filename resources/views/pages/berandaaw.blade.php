<x-app-layout>
    <!-- Background Image Overlay -->
    <div class="fixed inset-0 z-0">
        <img src="{{ asset('images/gelap.jpg') }}" alt="Background" class="object-cover w-full h-full">
        <div class="absolute inset-0 bg-black/70"></div>
    </div>

    <!-- Content Wrapper -->
    <div class="relative z-10">
        <!-- Hero Section with Carousel -->
        <section class="relative overflow-hidden">
            <div class="carousel relative w-full h-[600px] overflow-hidden">
                <div class="carousel-inner flex transition-transform duration-700 ease-in-out w-full h-full">
                    @foreach ($banners as $banner)
                        <div class="carousel-item w-full flex-shrink-0 relative">
                            <!-- Gambar -->
                            <img src="{{ Storage::url($banner->gambar) }}" alt="Banner" class="object-cover w-full h-full">
                            
                            <!-- Enhanced Overlay with gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/30"></div>
                            
                            <!-- Enhanced text overlay -->
                            <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white px-4">
                                <div class="backdrop-blur-sm bg-black/20 rounded-2xl p-8 border border-white/20 shadow-2xl">
                                    <h1 class="text-5xl md:text-6xl font-bold mb-6 tracking-tight leading-tight">{{ $banner->judul }}</h1>
                                    @if ($banner->deskripsi)
                                        <p class="text-xl md:text-2xl font-light leading-relaxed max-w-3xl mx-auto opacity-90">{{ $banner->deskripsi }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Enhanced Carousel Indicators -->
                <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-3 z-10">
                    @foreach ($banners as $index => $banner)
                        <button class="carousel-indicator w-4 h-4 rounded-full bg-white/50 hover:bg-white border-2 border-white/30 transition-all duration-300" data-index="{{ $index }}"></button>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Tentang Program -->
        <section class="py-24 relative">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/80"></div>
            <div class="relative max-w-7xl mx-auto px-6">
                <div class="md:flex items-center gap-16">
                    <div class="md:w-1/2 relative group">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-purple-600/20 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>
                        <div class="relative bg-white/10 backdrop-blur-md rounded-2xl p-2 border border-white/20 shadow-2xl">
                            <img src="{{ asset('images/magang.jpg') }}" alt="Program Magang" class="object-cover w-full h-80 rounded-xl">
                        </div>
                    </div>
                    <div class="md:w-1/2 mt-12 md:mt-0">
                        <div class="backdrop-blur-sm bg-white/10 rounded-2xl p-8 border border-white/20 shadow-2xl">
                            <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white leading-tight">Tentang Program Magang Kami</h2>
                            <p class="text-gray-200 mb-8 leading-relaxed text-lg font-light">
                                Program Magang Mahasiswa Profesional di PT Tiga Serangkai merupakan wadah pembelajaran bagi mahasiswa untuk merasakan pengalaman kerja nyata di dunia industri.
                                Dikelola oleh Center of Excellent, program ini dirancang untuk mengembangkan keterampilan, kreativitas, dan profesionalisme peserta
                                dengan bimbingan mentor berpengalaman.
                            </p>
                            <div class="mt-8">
                                <a href="{{ route('lowongan.index') }}">
                                    <button class="px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-xl shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1 border border-white/20">
                                        Lihat Lowongan Magang
                                    </button>
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Alur Pendaftaran -->
        <section class="py-24 relative">
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 to-black/60"></div>
            <div class="relative max-w-6xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">Proses Pendaftaran Magang</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full mb-6"></div>
                    <p class="text-gray-300 max-w-3xl mx-auto text-lg font-light leading-relaxed">Ikuti langkah-langkah berikut untuk bergabung dalam program magang kami</p>
                </div>

                <div class="relative">
                    <!-- Enhanced connecting line -->
                    <div class="hidden md:block absolute top-12 left-20 right-20 h-[3px] bg-gradient-to-r from-transparent via-blue-500 to-transparent z-0 opacity-60"></div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-5 gap-8 sm:gap-6 relative z-10">
                        @php
                            $steps = [
                                [
                                    'title' => 'Isi Formulir',
                                    'desc' => 'Lengkapi data diri',
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>'
                                ],
                                [
                                    'title' => 'Unggah Dokumen',
                                    'desc' => 'Upload berkas persyaratan',
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>'
                                ],
                                [
                                    'title' => 'Seleksi',
                                    'desc' => 'Proses peninjauan',
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>'
                                ],
                                [
                                    'title' => 'Pengumuman',
                                    'desc' => 'Hasil seleksi',
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
                                ],
                                [
                                    'title' => 'Mulai Magang',
                                    'desc' => 'Onboarding program',
                                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
                                ]
                            ];
                        @endphp

                        @foreach($steps as $step)
                        <div class="flex flex-col items-center group">
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-600/30 to-purple-600/30 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-all duration-500"></div>
                                <div class="relative w-20 h-20 md:w-24 md:h-24 rounded-full bg-white/10 backdrop-blur-md flex items-center justify-center shadow-2xl mb-6 border-2 border-white/20 group-hover:border-blue-400/50 group-hover:bg-white/20 transition-all duration-300">
                                    <div class="text-white group-hover:text-blue-300 transition-colors duration-300">
                                        {!! $step['icon'] !!}
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3 class="text-lg md:text-xl font-bold text-white group-hover:text-blue-300 transition-colors duration-300 mb-2">{{ $step['title'] }}</h3>
                                <p class="text-sm text-gray-300 group-hover:text-white mt-2 transition-colors duration-300 leading-relaxed">{{ $step['desc'] }}</p>
                                <div class="text-xs font-semibold text-blue-400 group-hover:text-blue-300 mt-3 px-3 py-1 bg-blue-500/20 rounded-full border border-blue-500/30 transition-colors duration-300">
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
        <section class="py-24 relative">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/80"></div>
            <div class="relative max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-center mb-12">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">Lowongan Magang Terbaru</h2>
                        <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                    </div>
                    <a href="{{ route('lowongan.index') }}" class="text-gray-300 hover:text-white font-semibold flex items-center text-lg transition-colors duration-300 group">
                        Semua Lowongan
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2 group-hover:translate-x-1 transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($lowongans as $job)
                        <div class="bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl hover:shadow-3xl transition-all duration-500 border border-white/20 overflow-hidden group h-full flex flex-col hover:bg-white/15 hover:border-white/30">
                            <!-- Job Header -->
                            <div class="p-6 border-b border-white/20">
                                <div class="flex items-start justify-between mb-4 gap-3">
                                    <h3 class="text-xl font-bold text-white font-serif group-hover:text-blue-300 transition-colors duration-300 line-clamp-2 flex-1 leading-tight">
                                        {{ $job->judul }}
                                    </h3>
                                    @php
                                        $isClosed = $job->status === 'tutup' || \Carbon\Carbon::parse($job->deadline)->isPast();
                                    @endphp
                                    <span class="text-xs font-bold px-3 py-2 rounded-full whitespace-nowrap border
                                        {{ $isClosed ? 'bg-red-500/20 text-red-300 border-red-500/30' : 'bg-green-500/20 text-green-300 border-green-500/30' }}">
                                        {{ $isClosed ? 'Ditutup' : 'Buka' }}
                                    </span>
                                </div>
        
                                <!-- Pendidikan & Jurusan Container -->
                                <div class="flex flex-wrap items-center gap-3 mt-3">
                                    <!-- Pendidikan -->
                                    <div class="flex items-center text-sm text-gray-300">
                                        <svg class="w-5 h-5 mr-2 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                        </svg>
                                        {{ $job->pendidikan ?? 'Semua Pendidikan' }}
                                    </div>
                                    <!-- Jurusan -->
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                        <span class="text-sm text-purple-300 bg-purple-500/20 px-3 py-1 rounded-full border border-purple-500/30">
                                            {{ $job->jurusan ?? 'Semua Jurusan' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- Job Details -->
                            <div class="p-6 flex-grow">
                                <ul class="space-y-4 mb-6">
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 mr-3 mt-1 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                                        </svg>
                                        <div>
                                            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Lokasi</div>
                                            <div class="text-sm text-white font-medium">{{ $job->lokasi }}</div>
                                        </div>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 mr-3 mt-1 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                        <div>
                                            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Deadline</div>
                                            <div class="text-sm text-white font-medium">{{ $job->deadline ? \Carbon\Carbon::parse($job->deadline)->translatedFormat('d F Y') : 'Tidak terbatas' }}</div>
                                        </div>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 mr-3 mt-1 text-orange-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <div>
                                            <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Durasi</div>
                                            <div class="text-sm text-white font-medium">{{ $job->durasi }}</div>
                                        </div>
                                    </li>
                                </ul>

                                <!-- Qualifications -->
                                <div class="mb-6">
                                    <h4 class="text-sm font-bold text-white mb-3 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Kualifikasi
                                    </h4>
                                    <ul class="space-y-2 text-sm text-gray-300">
                                        @foreach($job->kualifikasi as $kualif)
                                        <li class="flex items-start">
                                            <svg class="w-4 h-4 mr-2 mt-0.5 text-green-400 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>
                                            <span class="flex-1 leading-relaxed">{{ $kualif }}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Apply Button -->
                            <div class="p-6 pt-0">
                                <a href="{{ route('lowongan.show', $job->id) }}" class="block w-full text-center bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1 border border-white/20">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Berita -->
        <section class="py-24 relative">
            <div class="absolute inset-0 bg-gradient-to-b from-black/80 to-black/60"></div>
            <div class="relative max-w-7xl mx-auto px-6">
                <div class="flex justify-between items-center mb-12">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">Berita Terkini</h2>
                        <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                    </div>
                    <a href="#" class="text-gray-300 hover:text-white font-semibold flex items-center text-lg transition-colors duration-300 group">
                        Semua Berita
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 ml-2 group-hover:translate-x-1 transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach ($news as $item)
                        <div class="bg-white/10 backdrop-blur-lg rounded-2xl overflow-hidden shadow-2xl hover:shadow-3xl transition-all duration-500 border border-white/20 hover:border-white/30 group hover:bg-white/15">
                            <div class="h-56 overflow-hidden relative">
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" 
                                    class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center text-sm text-blue-400 mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('l, d F Y') }}
                                </div>
                                <h3 class="font-bold text-xl mb-4 text-white leading-tight font-serif group-hover:text-blue-300 transition-colors duration-300">
                                    {{ $item->judul }}
                                </h3>
                                <a href="{{ route('berita.show', $item->id) }}" class="inline-flex items-center text-sm font-semibold text-gray-300 hover:text-white transition-colors duration-300 group-hover:text-blue-300">
                                    Baca Selengkapnya
                                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Galeri -->
        <section class="py-24 relative">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/80"></div>
            <div class="relative max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">Galeri Kegiatan</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-6">
                    @forelse($galeris as $galeri)
                        <div class="aspect-square bg-white/10 backdrop-blur-md rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-500 flex items-center justify-center text-white font-semibold relative group border border-white/20 hover:border-white/30">
                            @if($galeri->foto)
                                <img src="{{ asset('storage/'.$galeri->foto) }}" alt="{{ $galeri->judul }}" class="object-cover w-full h-full group-hover:scale-110 transition-transform duration-700">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                            @else
                            