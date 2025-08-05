<x-app-layout>
    <section class="relative bg-cover bg-center bg-no-repeat min-h-screen py-20" style="background-image: url('/images/gelap.jpg')">
        <!-- Background Overlays -->
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/60 via-slate-800/40 to-slate-900/60"></div>
        <div class="absolute inset-0 bg-[#3B3B1A]/10"></div>
        
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Content Container -->
            <div class="bg-white/90 rounded-xl shadow-sm overflow-hidden backdrop-blur-sm">
                <!-- Content Header -->
                <div class="bg-[#626F47] px-6 py-4">
                    <h3 class="text-lg font-bold text-white">Detail Pendaftaran Magang</h3>
                    <p class="text-sm text-gray-300 mt-1">Informasi lengkap pendaftaran magang Anda</p>
                </div>

                <!-- Content Section -->
                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 text-sm">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Personal Information -->
                            <div>
                                <p class="text-xs font-semibold text-[#626F47] uppercase tracking-wider mb-3">Informasi Pribadi</p>
                                <div class="mt-2 space-y-3 pl-4 border-l-2 border-[#AEC8A4]">
                                    <div>
                                        <p class="font-medium text-[#3B3B1A]">Nama Lengkap</p>
                                        <p class="text-[#626F47] mt-1">{{ $pendaftaran->nama_lengkap }}</p>
                                    </div>
                                    <div class="grid grid-cols-2 gap-x-4 gap-y-3">
                                        <div>
                                            <p class="font-medium text-[#3B3B1A]">Jenis Kelamin</p>
                                            <p class="text-[#626F47] mt-1">{{ $pendaftaran->jenis_kelamin }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-[#3B3B1A]">Tempat Lahir</p>
                                            <p class="text-[#626F47] mt-1">{{ $pendaftaran->tempat_lahir ?? '-' }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-[#3B3B1A]">Tanggal Lahir</p>
                                            <p class="text-[#626F47] mt-1">{{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->translatedFormat('d F Y') }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-[#3B3B1A]">Alamat</p>
                                        <p class="text-[#626F47] mt-1">{{ $pendaftaran->alamat }}</p>
                                    </div>
                                    <div class="grid grid-cols-2 gap-x-4 gap-y-3">
                                        <div>
                                            <p class="font-medium text-[#3B3B1A]">No. HP</p>
                                            <p class="text-[#626F47] mt-1">{{ $pendaftaran->no_hp }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-[#3B3B1A]">Email</p>
                                            <p class="text-[#626F47] mt-1">{{ $pendaftaran->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Education Information -->
                            <div>
                                <p class="text-xs font-semibold text-[#626F47] uppercase tracking-wider mb-3">Informasi Pendidikan</p>
                                <div class="mt-2 space-y-3 pl-4 border-l-2 border-[#AEC8A4]">
                                    <div>
                                        <p class="font-medium text-[#3B3B1A]">Universitas</p>
                                        <p class="text-[#626F47] mt-1">{{ $pendaftaran->universitas }}</p>
                                    </div>
                                    <div class="grid grid-cols-2 gap-x-4 gap-y-3">
                                        <div>
                                            <p class="font-medium text-[#3B3B1A]">Jurusan</p>
                                            <p class="text-[#626F47] mt-1">{{ $pendaftaran->jurusan }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-[#3B3B1A]">Jenjang</p>
                                            <p class="text-[#626F47] mt-1">{{ $pendaftaran->jenjang }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-[#3B3B1A]">Semester</p>
                                        <p class="text-[#626F47] mt-1">{{ $pendaftaran->semester }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <div>
                                <p class="text-xs font-semibold text-[#626F47] uppercase tracking-wider mb-3">Informasi Tambahan</p>
                                <div class="mt-2 space-y-4 pl-4 border-l-2 border-[#AEC8A4]">
                                    <div>
                                        <p class="font-medium text-[#3B3B1A]">Tujuan Magang</p>
                                        <p class="text-[#626F47] mt-1 whitespace-pre-line">{{ $pendaftaran->tujuan }}</p>
                                    </div>
                                    <div>
                                        <p class="font-medium text-[#3B3B1A]">Keahlian</p>
                                        <p class="text-[#626F47] mt-1 whitespace-pre-line">{{ $pendaftaran->keahlian }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Internship Information -->
                            <div>
                                <p class="text-xs font-semibold text-[#626F47] uppercase tracking-wider mb-3">Informasi Magang</p>
                                <div class="mt-2 space-y-3 pl-4 border-l-2 border-[#AEC8A4]">
                                    <div>
                                        <p class="font-medium text-[#3B3B1A]">Lowongan</p>
                                        @if ($pendaftaran->lowongan)
                                            <a href="{{ route('lowongan.show', $pendaftaran->lowongan->id) }}"
                                            class="mt-1 inline-block text-sm text-white bg-[#626F47] hover:bg-[#4a5635] px-4 py-1 rounded-lg transition-all duration-200">
                                                {{ $pendaftaran->lowongan->judul }}
                                            </a>
                                        @else
                                            <p class="text-[#8A784E] mt-1 italic">-</p>
                                        @endif
                                    </div>
                                    <div class="grid grid-cols-2 gap-x-4 gap-y-3">
                                        <div>
                                            <p class="font-medium text-[#3B3B1A]">Divisi</p>
                                            <p class="text-[#626F47] mt-1">{{ $pendaftaran->lowongan->divisi ?? '-' }}</p>
                                        </div>
                                        <div>
                                            <p class="font-medium text-[#3B3B1A]">Periode</p>
                                            <p class="text-[#626F47] mt-1">{{ $pendaftaran->periode }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-[#3B3B1A]">Bidang</p>
                                        <p class="text-[#626F47] mt-1">{{ $pendaftaran->bidang }}</p>
                                    </div>
                                    <div>
                                        <p class="font-medium text-[#3B3B1A]">Status</p>
                                        <div class="mt-1">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold leading-4
                                                @if($pendaftaran->status === 'Menunggu') 
                                                    bg-yellow-100 text-yellow-800 border-yellow-300
                                                @elseif($pendaftaran->status === 'Diterima') 
                                                    bg-green-100 text-green-800 border-green-300
                                                @elseif($pendaftaran->status === 'Ditolak') 
                                                    bg-red-100 text-red-800 border-red-300
                                                @endif
                                            ">
                                                {{ $pendaftaran->status }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Documents -->
                            <div>
                                <p class="text-xs font-semibold text-[#626F47] uppercase tracking-wider mb-3">Dokumen</p>
                                <div class="mt-2 space-y-3 pl-4 border-l-2 border-[#AEC8A4]">
                                    <div>
                                        <p class="font-medium text-[#3B3B1A]">Curriculum Vitae</p>
                                        <div class="mt-1 flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#626F47]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            <a href="{{ asset('storage/' . $pendaftaran->cv) }}" target="_blank" class="text-[#626F47] hover:text-[#3B3B1A] hover:underline flex items-center gap-1">
                                                Lihat Dokumen &nbsp;
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-medium text-[#3B3B1A]">Portofolio</p>
                                        <div class="mt-1">
                                            @if ($pendaftaran->portofolio)
                                                <div class="flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#626F47]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                    <a href="{{ asset('storage/' . $pendaftaran->portofolio) }}" target="_blank" class="text-[#626F47] hover:text-[#3B3B1A] hover:underline flex items-center gap-1">
                                                        Lihat Portofolio &nbsp;
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            @else
                                                <p class="text-[#8A784E]/70 italic flex items-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                                    </svg>
                                                    Tidak tersedia
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="mt-8 pt-5 border-t border-[#AEC8A4]/30 flex justify-end">
                        <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 bg-[#626F47] text-white rounded-lg text-sm hover:bg-[#3B3B1A] transition-colors duration-200">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>