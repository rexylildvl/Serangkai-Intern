<x-app-layout>
    @if(session('success'))
    <div id="successPopup" class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 animate-fade-in-down">
        <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
        <span class="font-semibold">{{ session('success') }}</span>
    </div>
    <script>
        setTimeout(function() {
            const popup = document.getElementById('successPopup');
            if (popup) popup.style.display = 'none';
        }, 3500);
    </script>
    <style>
        @keyframes fade-in-down {
            0% { opacity: 0; transform: translateY(-20px) scale(0.95);}
            100% { opacity: 1; transform: translateY(0) scale(1);}
        }
        .animate-fade-in-down {
            animation: fade-in-down 0.5s cubic-bezier(.4,0,.2,1);
        }
    </style>
@endif
    <section class="bg-[#E7EFC7] min-h-screen py-12" x-data="{ open: false, selected: {} }">
        <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-3 gap-6 items-start">

        <!-- Sidebar -->
        <div class="bg-white border border-[#AEC8A4] rounded-xl shadow-md p-6 h-fit">
            <h3 class="text-lg font-bold text-[#3B3B1A] mb-1">{{ $lowongan->judul }}</h3>
            <p class="text-sm text-[#8A784E] mb-4">{{ $lowongan->jurusan ?? 'Terbuka untuk semua jurusan' }}</p>

            <ul class="text-sm text-[#626F47] space-y-1 mb-4">
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 mt-[3px] text-[#3B3B1A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 12.414M6 18V6a2 2 0 012-2h8a2 2 0 012 2v12l-5-5-5 5z"/>
                    </svg>
                    {{ $lowongan->lokasi }}
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 mt-[3px] text-[#3B3B1A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2zm2 4h6"/>
                    </svg>
                    Deadline: {{ \Carbon\Carbon::parse($lowongan->deadline)->translatedFormat('d F Y') ?? 'Tidak terbatas' }}
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-4 h-4 mt-[3px] text-[#3B3B1A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Durasi: {{ $lowongan->durasi }}
                </li>
            </ul>

            <div class="text-sm text-[#3B3B1A] font-semibold mb-1">Kualifikasi</div>
            <ul class="text-sm text-[#626F47] space-y-1 mb-4">
                @foreach($lowongan->kualifikasi as $kualif)
                    <li class="flex items-start gap-2">
                        <svg class="w-4 h-4 mt-[3px] text-[#3B3B1A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ $kualif }}
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('pendaftaran.index', ['id_lowongan' => $lowongan->id]) }}" class="inline-block w-full text-center bg-[#626F47] hover:bg-[#3B3B1A] text-white font-semibold py-2 rounded-md transition">
                Daftar Sekarang
            </a>

        </div>

            <!-- Konten Utama -->
            <div class="md:col-span-2 bg-white border border-[#AEC8A4] rounded-xl shadow-md p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-[#3B3B1A]">{{ $lowongan->judul }}</h1>
                        <p class="text-sm text-[#8A784E]">
                            {{ $lowongan->lokasi }} &middot; Deadline: {{ \Carbon\Carbon::parse($lowongan->deadline)->translatedFormat('d F Y') }}
                        </p>
                    </div>
                    <span class="bg-[#AEC8A4] text-[#3B3B1A] text-xs font-semibold px-3 py-1 rounded-full">
                        {{ $lowongan->durasi }}
                    </span>
                </div>

                <!-- Tabs -->
                <div x-data="{ tab: 'deskripsi' }">
                    <div class="flex border-b border-[#AEC8A4] mb-6 space-x-4">
                        <button @click="tab = 'deskripsi'" :class="tab === 'deskripsi' ? 'border-b-2 border-[#3B3B1A] text-[#3B3B1A]' : 'text-[#626F47]'" class="pb-2 text-sm font-medium">
                            Deskripsi Lowongan
                        </button>
                        <button @click="tab = 'benefit'" :class="tab === 'benefit' ? 'border-b-2 border-[#3B3B1A] text-[#3B3B1A]' : 'text-[#626F47]'" class="pb-2 text-sm font-medium">
                            Benefit & Tanggung Jawab
                        </button>
                    </div>

                    <!-- Deskripsi -->
                    <div x-show="tab === 'deskripsi'" class="space-y-6 text-sm text-[#626F47] leading-relaxed">
                        @if($lowongan->deskripsi)
                        <div>
                            <h2 class="font-semibold text-[#3B3B1A] mb-1">Deskripsi</h2>
                            <p>{{ $lowongan->deskripsi }}</p>
                        </div>
                        @endif

                        @if($lowongan->persyaratan_dokumen)
                        <div>
                            <h2 class="font-semibold text-[#3B3B1A] mb-1">Persyaratan Dokumen</h2>
                            @php
                                $dokumen = is_array($lowongan->persyaratan_dokumen) ? $lowongan->persyaratan_dokumen : explode(';', $lowongan->persyaratan_dokumen);
                            @endphp
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($dokumen as $item)
                                <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if($lowongan->skill)
                        <div>
                            <h2 class="font-semibold text-[#3B3B1A] mb-1">Skill yang Diutamakan</h2>
                            @php
                                $skills = is_array($lowongan->skill) ? $lowongan->skill : explode(';', $lowongan->skill);
                            @endphp
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($skills as $skill)
                                <li>{{ $skill }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                    <!-- Benefit & Tanggung Jawab -->
                    <div x-show="tab === 'benefit'" class="space-y-6 text-sm text-[#626F47] leading-relaxed mt-6">
                        @if($lowongan->benefit)
                        <div>
                            <h2 class="font-semibold text-[#3B3B1A] mb-1">Benefit</h2>
                            @php
                                $benefit = is_array($lowongan->benefit) ? $lowongan->benefit : explode(';', $lowongan->benefit);
                            @endphp
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($benefit as $item)
                                <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if($lowongan->tanggung_jawab)
                        <div>
                            <h2 class="font-semibold text-[#3B3B1A] mb-1">Tanggung Jawab</h2>
                            @php
                                $tanggungJawab = is_array($lowongan->tanggung_jawab) ? $lowongan->tanggung_jawab : explode(';', $lowongan->tanggung_jawab);
                            @endphp
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($tanggungJawab as $item)
                                <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
