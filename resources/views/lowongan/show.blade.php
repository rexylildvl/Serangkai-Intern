<x-app-layout>
    <section class="relative bg-cover bg-center bg-no-repeat min-h-screen py-10" 
        style="background-image: url('/images/gelap.jpg')">
    @if(session('success'))
    <div id="successPopup" class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 bg-green-100 border border-green-400 text-green-700 px-6 py-3 rounded-lg shadow-lg flex items-center space-x-3 animate-fade-in-down">
        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
        <span class="font-medium">{{ session('success') }}</span>
    </div>
    <script>
        setTimeout(function() {
            const popup = document.getElementById('successPopup');
            if (popup) popup.style.display = 'none';
        }, 3500);
    </script>
    @endif
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid md:grid-cols-4 gap-8 items-start">
            <!-- Sidebar -->
            <div class="md:col-span-1 bg-white border border-[#E7EFC7] rounded-xl shadow-sm p-6 top-6">
                <div class="mb-6">
                                <h3 class="text-xl font-bold text-[#3B3B1A] mb-2 font-serif">
                                    {{ $lowongan->judul }}
                                </h3>
                                @php
                                    $isClosed = $lowongan->status === 'tutup' || \Carbon\Carbon::parse($lowongan->deadline)->isPast();
                                @endphp
                                <span class="inline-bloc text-xs font-semibold px-3 py-1 rounded-full 
                                    {{ $isClosed ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700' }}">
                                    {{ $isClosed ? 'Ditutup' : 'Buka' }}
                                </span>
                    
                    <span class="inline-block px-3 py-1 text-xs font-semibold text-[#8A784E] bg-[#F0F5E6] rounded-full mb-4">
                        {{ $lowongan->jurusan ?? 'Semua Jurusan' }}
                    </span>
                    <span class="inline-block px-3 py-1 text-xs font-semibold text-[#8A784E] bg-[#F0F5E6] rounded-full mb-4">
                        {{ $lowongan->pendidikan ?? 'Semua Pendidikan' }}
                    </span>
                </div>

                <ul class="space-y-4 mb-6">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5 text-[#8A784E] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        <div>
                            <div class="text-xs font-medium text-[#626F47]">Lokasi</div>
                            <div class="text-sm text-[#3B3B1A]">{{ $lowongan->lokasi }}</div>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5 text-[#8A784E] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                        </svg>
                        <div>
                            <div class="text-xs font-medium text-[#626F47]">Deadline</div>
                            <div class="text-sm text-[#3B3B1A]">{{ $lowongan->deadline ? \Carbon\Carbon::parse($lowongan->deadline)->translatedFormat('d F Y') : 'Tidak terbatas' }}</div>
                        </div>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-3 mt-0.5 text-[#8A784E] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div>
                            <div class="text-xs font-medium text-[#626F47]">Durasi</div>
                            <div class="text-sm text-[#3B3B1A]">{{ $lowongan->durasi }}</div>
                        </div>
                    </li>
                </ul>

                <div class="mb-6">
                    <h4 class="text-sm font-semibold text-[#3B3B1A] mb-3 flex items-center">
                        <svg class="w-4 h-4 mr-2 text-[#8A784E]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Kualifikasi
                    </h4>
                    <ul class="space-y-2 text-sm text-[#626F47]">
                        @foreach($lowongan->kualifikasi as $kualif)
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 text-[#8A784E] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                            </svg>
                            {{ $kualif }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <br>
                @php
                    $isClosed = $lowongan->status === 'tutup' || \Carbon\Carbon::parse($lowongan->deadline)->isPast();
                @endphp

                @if(auth()->check())
                    @if($alreadyApplied)
                        <button class="px-6 py-3 bg-[#AEC8A4] text-[#3B3B1A] font-bold rounded-lg cursor-not-allowed opacity-90" disabled>
                            Sudah Terdaftar
                        </button>
                    @elseif($isClosed)
                        <button class="px-6 py-3 bg-gray-400 text-white font-bold rounded-lg cursor-not-allowed opacity-90" disabled>
                            Lowongan Ditutup
                        </button>
                    @else
                        <a href="{{ route('pendaftaran.index', ['id_lowongan' => $lowongan->id]) }}" 
                        class="px-6 py-3 bg-[#626F47] hover:bg-[#3B3B1A] text-white font-bold rounded-lg transition-colors duration-200 shadow hover:shadow-lg">
                            Daftar Sekarang
                        </a>
                    @endif
                @else
                    @if($isClosed)
                        <button class="px-6 py-3 bg-gray-400 text-white font-medium rounded-lg cursor-not-allowed opacity-90" disabled>
                            Lowongan Ditutup
                        </button>
                    @else
                        <a href="{{ route('login') }}" 
                        class="px-6 py-3 bg-green-600 text-white rounded-lg font-medium hover:bg-green-700 transition-colors duration-200">
                            Login untuk Mendaftar
                        </a>
                    @endif
                @endif

            </div>

            <!-- Main Content -->
            <div class="md:col-span-3 bg-white border border-[#E7EFC7] rounded-xl shadow-sm p-8">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8">
                    <div class="mb-4 sm:mb-0">
                        <h1 class="text-2xl sm:text-3xl font-bold text-[#3B3B1A] font-serif">{{ $lowongan->judul }}</h1>
                        <p class="text-sm text-[#8A784E] mt-1">
                            {{ $lowongan->lokasi }} &middot; Deadline: {{ \Carbon\Carbon::parse($lowongan->deadline)->translatedFormat('d F Y') }}
                        </p>
                    </div>
                    <span class="bg-[#F0F5E6] text-[#8A784E] text-xs font-semibold px-3 py-1.5 rounded-full">
                        {{ $lowongan->durasi }}
                    </span>
                </div>

                <!-- Tabs dengan Vanilla JS -->
                <div class="tabs-container mb-8">
                    <div class="flex border-b border-[#E7EFC7] space-x-6">
                        <button data-tab="deskripsi" class="tab-button active pb-3 font-medium text-sm text-[#3B3B1A] border-b-2 border-[#3B3B1A]">
                            Deskripsi Lowongan
                        </button>
                        <button data-tab="benefit" class="tab-button pb-3 font-medium text-sm text-[#626F47] hover:text-[#3B3B1A]">
                            Benefit & Tanggung Jawab
                        </button>
                    </div>


                <!-- Deskripsi Content -->
                   <div class="tab-content active" id="deskripsi-content">
                        @if($lowongan->deskripsi)
                        <div class="mb-8"><br>
                            <h2 class="text-s font-semibold text-[#3B3B1A] mb-3">Deskripsi Pekerjaan</h2>
                            <p class="leading-relaxed">{{ $lowongan->deskripsi }}</p>
                        </div>
                        @endif

                    @if($lowongan->persyaratan_dokumen)
                    <div class="mb-8">
                        <h2 class="text-s font-semibold text-[#3B3B1A] mb-3">Persyaratan Dokumen</h2>
                        @php
                            $documents = is_array($lowongan->persyaratan_dokumen) 
                                ? $lowongan->persyaratan_dokumen 
                                : explode(';', $lowongan->persyaratan_dokumen);
                        @endphp
                        <ul class="space-y-2">
                            @foreach($documents as $item)
                            <li class="flex items-start">
                                <svg class="w-4 h-4 mr-2 mt-0.5 text-[#8A784E]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                </svg>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($lowongan->skill)
                    <div class="mb-8">
                        <h2 class="text-s font-semibold text-[#3B3B1A] mb-3">Skill yang Diutamakan</h2>
                        @php
                            $skills = is_array($lowongan->skill) ? $lowongan->skill : explode(';', $lowongan->skill);
                        @endphp
                        <div class="flex flex-wrap gap-2">
                            @foreach($skills as $skill)
                            <span class="bg-[#F0F5E6] text-[#8A784E] text-xs font-medium px-3 py-1 rounded-full">
                                {{ $skill }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <div class="tab-content hidden" id="benefit-content">
                    @if($lowongan->benefit)
                    <div class="mb-8"><br>
                        <h2 class="text-s font-semibold text-[#3B3B1A] mb-3">Benefit Magang</h2>
                        <ul class="space-y-2">
                            @php
                                // Handle both array and string cases
                                $benefits = is_array($lowongan->benefit) ? $lowongan->benefit : explode(';', $lowongan->benefit);
                            @endphp
                            @foreach($benefits as $item)
                            <li class="flex items-start">
                                <svg class="w-4 h-4 mr-2 mt-0.5 text-[#8A784E]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
                                </svg>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @if($lowongan->tanggung_jawab)
                    <div class="mb-8">
                        <h2 class="text-s font-semibold text-[#3B3B1A] mb-3">Tanggung Jawab</h2>
                        @php
                            $tanggungJawab = is_array($lowongan->tanggung_jawab) ? $lowongan->tanggung_jawab : explode(';', $lowongan->tanggung_jawab);
                        @endphp
                        <ul class="space-y-2">
                            @foreach($tanggungJawab as $item)
                            <li class="flex items-start">
                                <svg class="w-4 h-4 mr-2 mt-0.5 text-[#8A784E] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                <span>{{ $item }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
        <style>
        /* Style untuk tabs */
        .tab-content {
            display: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .tab-content.active {
            display: block;
            opacity: 1;
        }
        .tab-button {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .tab-button.active {
            color: #3B3B1A;
            border-bottom: 2px solid #3B3B1A;
        }
    </style>

    <script>
        // Inisialisasi tabs
        document.addEventListener('DOMContentLoaded', function() {
            // Tangani success popup
            const successPopup = document.getElementById('successPopup');
            if (successPopup) {
                setTimeout(() => {
                    successPopup.style.display = 'none';
                }, 3500);
            }

            // Fungsi untuk tabs
            const tabButtons = document.querySelectorAll('.tab-button');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Hapus class active dari semua button dan content
                    document.querySelectorAll('.tab-button').forEach(btn => {
                        btn.classList.remove('active');
                        btn.classList.add('text-[#626F47]');
                        btn.classList.remove('text-[#3B3B1A]');
                        btn.classList.remove('border-b-2');
                        btn.classList.remove('border-[#3B3B1A]');
                    });
                    
                    document.querySelectorAll('.tab-content').forEach(content => {
                        content.classList.remove('active');
                        content.classList.add('hidden');
                    });

                    // Tambah class active ke button yang diklik
                    this.classList.add('active');
                    this.classList.remove('text-[#626F47]');
                    this.classList.add('text-[#3B3B1A]');
                    this.classList.add('border-b-2');
                    this.classList.add('border-[#3B3B1A]');

                    // Tampilkan content yang sesuai
                    const tabId = this.getAttribute('data-tab');
                    const content = document.getElementById(`${tabId}-content`);
                    content.classList.remove('hidden');
                    content.classList.add('active');
                });
            });
        });
    </script>
</x-app-layout>