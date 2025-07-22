<x-app-layout>
    <div class="py-10 bg-[#E7EFC7] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row gap-6">
                <!-- Sidebar Navigation - Slimmer and More Elegant -->
                <div class=" md:w-48 flex-shrink-0">
                    <div class="bg-white shadow-sm rounded-lg border border-[#AEC8A4] p-2 sticky top-4">
                        <nav class="space-y-1">
                            <a href="#akun" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-[#3B3B1A] text-sm font-medium hover:bg-[#E7EFC7]/60 transition-colors duration-200 {{ request()->is('profile#akun') || !request()->has('tab') ? 'bg-[#AEC8A4]/20 border-l-3 border-[#626F47] text-[#3B3B1A]' : 'text-[#626F47]' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                <span class="truncate">Akun Saya</span>
                            </a>
                            <a href="#pendaftaran" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-[#3B3B1A] text-sm font-medium hover:bg-[#E7EFC7]/60 transition-colors duration-200 {{ request()->is('profile#pendaftaran') ? 'bg-[#AEC8A4]/20 border-l-3 border-[#626F47] text-[#3B3B1A]' : 'text-[#626F47]' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                </svg>
                                <span class="truncate">Pendaftaran</span>
                            </a>
                            <a href="#logbook" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-[#3B3B1A] text-sm font-medium hover:bg-[#E7EFC7]/60 transition-colors duration-200 {{ request()->is('profile#logbook') ? 'bg-[#AEC8A4]/20 border-l-3 border-[#626F47] text-[#3B3B1A]' : 'text-[#626F47]' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                                <span class="truncate">LogBook</span>
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Main Content - Enhanced Visual Hierarchy -->
                <div class="flex-1 space-y-6">
                    <!-- Akun Section -->
                    <div id="akun" class="space-y-6">
                        <!-- Profile Information -->
                        <div class="p-6 bg-white shadow-sm rounded-xl border border-[#AEC8A4]">
                            <div class="flex items-center gap-3 mb-5 pb-3 border-b border-[#AEC8A4]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#626F47]" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                <h2 class="text-lg font-bold text-[#3B3B1A]">Informasi Profil</h2>
                            </div>
                            <div class="mt-4">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <!-- Update Password -->
                        <div class="p-6 bg-white shadow-sm rounded-xl border border-[#AEC8A4]">
                            <div class="flex items-center gap-3 mb-5 pb-3 border-b border-[#AEC8A4]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#626F47]" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                                <h2 class="text-lg font-bold text-[#3B3B1A]">Ubah Password</h2>
                            </div>
                            <div class="mt-4">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <!-- Delete Account -->
                        <div class="p-6 bg-white shadow-sm rounded-xl border border-[#AEC8A4]">
                            <div class="flex items-center gap-3 mb-5 pb-3 border-b border-[#AEC8A4]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8A4E4E]" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                <h2 class="text-lg font-bold text-[#3B3B1A]">Hapus Akun</h2>
                            </div>
                            <div class="mt-4 max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>

              <!-- Status Pendaftaran Section -->
                <div id="pendaftaran" class="hidden p-6 bg-white shadow-sm rounded-xl border border-[#AEC8A4]">
                    <div class="flex items-center gap-3 mb-5 pb-3 border-b border-[#AEC8A4]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#626F47]" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                        </svg>
                        <h2 class="text-lg font-bold text-[#3B3B1A]">Lowongan yang Sudah Didaftar</h2>
                    </div><br>
                    
                    @php
                        $pendaftarans = \App\Models\Pendaftaran::with('lowongan')
                            ->where('email', auth()->user()->email)
                            ->latest()
                            ->get();
                    @endphp

                    @if($pendaftarans->count())
                        <div class="w-full overflow-x-auto rounded-lg border border-[#AEC8A4]/50">
                            <table class="w-full table-auto divide-y divide-[#AEC8A4]/30">
                                <thead class="bg-[#626F47]">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            Lowongan
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            Divisi
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            Tanggal Daftar
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-[#AEC8A4]/30">
                                    @foreach($pendaftarans as $p)
                                    <tr class="hover:bg-[#E7EFC7]/20 transition-colors duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="font-medium text-[#3B3B1A]">{{ $p->lowongan->judul ?? '-' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-[#626F47]">
                                            {{ $p->lowongan->divisi ?? '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border
                                                @if($p->status === 'Menunggu') 
                                                    bg-yellow-100 text-yellow-800 border-yellow-300
                                                @elseif($p->status === 'Diterima') 
                                                    bg-green-100 text-green-800 border-green-300
                                                @elseif($p->status === 'Ditolak') 
                                                    bg-red-100 text-red-800 border-red-300
                                                @endif
                                            ">
                                                {{ $p->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-[#626F47]">
                                            {{ \Carbon\Carbon::parse($p->created_at)->format('d M Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('pendaftaran.show', $p->id) }}" class="text-[#626F47] hover:text-[#3B3B1A] mr-3">Detail</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Pagination (optional) -->
                        <div class="mt-4 flex items-center justify-between border-t border-[#AEC8A4]/30 pt-4">
                            <div class="text-sm text-[#626F47]">
                                Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">5</span> dari <span class="font-medium">{{ $pendaftarans->count() }}</span> pendaftaran
                            </div>
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 rounded-md border border-[#AEC8A4] text-sm text-[#626F47] hover:bg-[#E7EFC7]/30">
                                    Sebelumnya
                                </button>
                                <button class="px-3 py-1 rounded-md border border-[#AEC8A4] text-sm text-[#626F47] hover:bg-[#E7EFC7]/30">
                                    Selanjutnya
                                </button>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-[#8A784E]/60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="mt-3 text-[#8A784E] font-medium">Belum ada pendaftaran magang.</p>
                            <p class="text-sm text-[#8A784E]/70 mt-1">Silakan daftar di halaman lowongan magang</p>
                        </div>
                    @endif
                </div>

                    <!-- LogBook Section -->
                    <div id="logbook" class="hidden p-6 bg-white shadow-sm rounded-xl border border-[#AEC8A4]">
                        <div class="flex items-center gap-3 mb-5 pb-3 border-b border-[#AEC8A4]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#626F47]" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <h2 class="text-lg font-bold text-[#3B3B1A]">LogBook Aktivitas</h2>
                        </div>
                        <div class="text-center py-8"><br>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 mx-auto text-[#8A784E]/50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="mt-4 text-[#8A784E] font-medium">Fitur LogBook dapat diakses jika Anda merupakan bagian dari tim magang.</p>
                            <p class="text-sm text-[#8A784E]/70 mt-2">Fitur logbook digunakan untuk melacak aktivitas magang Anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Fungsi untuk switch tab
        function switchTab(targetId) {
            // Sembunyikan semua section
            document.getElementById('akun').classList.add('hidden');
            document.getElementById('pendaftaran').classList.add('hidden');
            document.getElementById('logbook').classList.add('hidden');
            
            // Tampilkan section yang dipilih
            document.getElementById(targetId).classList.remove('hidden');
            
            // Update active state di sidebar
            document.querySelectorAll('nav a').forEach(link => {
                link.classList.remove('bg-[#AEC8A4]/20', 'border-l-3', 'border-[#626F47]', 'text-[#3B3B1A]');
                link.classList.add('text-[#626F47]');
            });
            
            document.querySelector(`nav a[href="#${targetId}"]`).classList.add('bg-[#AEC8A4]/20', 'border-l-3', 'border-[#626F47]', 'text-[#3B3B1A]');
            document.querySelector(`nav a[href="#${targetId}"]`).classList.remove('text-[#626F47]');
        }

        // Inisialisasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Handle klik menu sidebar
            document.querySelectorAll('nav a').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    switchTab(targetId);
                    history.pushState(null, null, `#${targetId}`);
                });
            });

            // Buka tab berdasarkan hash URL saat pertama load
            const hash = window.location.hash.substring(1);
            if (hash) {
                switchTab(hash);
            } else {
                switchTab('akun');
            }
        });

        // Handle back/forward button
        window.addEventListener('popstate', function() {
            const hash = window.location.hash.substring(1);
            if (hash) {
                switchTab(hash);
            }
        });
    </script>
</x-app-layout>