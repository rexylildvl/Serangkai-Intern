<x-app-layout>
    <section class="relative bg-cover bg-center bg-no-repeat min-h-screen py-10" 
        style="background-image: url('/images/gelap.jpg')">
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm z-0"></div>
        <!-- Professional gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/60 via-slate-800/40 to-slate-900/60"></div>
        <div class="absolute inset-0 bg-[#3B3B1A]/10"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
<div class="mb-10">
    <div class="flex flex-col">
        <!-- Professional left-aligned header with subtle decoration -->
        <div class="flex items-center mb-3">
            <div class="w-8 h-0.5 bg-[#AEC8A4] mr-3"></div>
            <span class="text-[#AEC8A4] text-xs font-medium tracking-wider uppercase">Program Magang Mahasiswa Profesional</span>
        </div>
        
        <h1 class="text-2xl md:text-3xl font-bold text-white mb-2 leading-tight">
            Riwayat Pendaftaran Magang
        </h1>
        
        <p class="text-gray-300 text-base font-light max-w-2xl leading-relaxed">
            Daftar lengkap seluruh lowongan magang yang pernah Anda daftar
            di PT Tiga Serangkai Pustaka Mandiri
        </p>
    </div>
</div>
            <!-- Main Content -->
            <div class="bg-white/90 rounded-xl shadow-sm overflow-hidden backdrop-blur-sm">
                @php
                    $pendaftarans = \App\Models\Pendaftaran::with('lowongan')
                        ->where('email', auth()->user()->email)
                        ->latest()
                        ->paginate(10);
                @endphp

                @if($pendaftarans->count())
                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-[#AEC8A4]/30">
                            <thead class="bg-[#626F47]">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Lowongan</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Divisi</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Tanggal Daftar</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-white uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white/80 divide-y divide-[#AEC8A4]/30">
                                @foreach($pendaftarans as $p)
                                <tr class="hover:bg-[#F5F9E8] transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="font-medium text-[#3B3B1A]">{{ $p->lowongan->judul ?? '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#626F47]">
                                        {{ $p->lowongan->divisi ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($p->status === 'Menunggu') 
                                                bg-yellow-100 text-yellow-800
                                            @elseif($p->status === 'Diterima') 
                                                bg-green-100 text-green-800
                                            @elseif($p->status === 'Ditolak') 
                                                bg-red-100 text-red-800
                                            @endif">
                                            @if($p->status === 'Menunggu')
                                                <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-yellow-800" fill="currentColor" viewBox="0 0 8 8">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                            @elseif($p->status === 'Diterima')
                                                <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-800" fill="currentColor" viewBox="0 0 8 8">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                            @else
                                                <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-red-800" fill="currentColor" viewBox="0 0 8 8">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                            @endif
                                            {{ $p->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-[#626F47]">
                                        {{ \Carbon\Carbon::parse($p->created_at)->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('pendaftaran.show', $p->id) }}" class="inline-flex items-center text-[#626F47] hover:text-[#3B3B1A]">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 bg-[#F8FAF0]/80 border-t border-[#AEC8A4]/30 flex items-center justify-between">
                        <div class="text-sm text-[#626F47]">
                            Menampilkan <span class="font-medium">{{ $pendaftarans->firstItem() }}</span> sampai <span class="font-medium">{{ $pendaftarans->lastItem() }}</span> dari <span class="font-medium">{{ $pendaftarans->total() }}</span> pendaftaran
                        </div>
                        <div class="flex space-x-2">
                            {{ $pendaftarans->links() }}
                        </div>
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="px-6 py-12 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-[#AEC8A4]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-[#3B3B1A]">Belum ada riwayat pendaftaran</h3>
                        <p class="mt-1 text-sm text-[#626F47]">Anda belum mendaftar ke lowongan magang manapun</p>
                        <div class="mt-6">
                            <a href="{{ route('lowongan.index') }}" class="inline-flex items-center px-4 py-2 bg-[#626F47] hover:bg-[#3B3B1A] text-white rounded-lg text-sm font-medium transition-colors duration-200 shadow-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                                Cari Lowongan Magang
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-app-layout>