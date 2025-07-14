<x-app-layout>
    <section class="bg-[#E7EFC7] py-12" x-data="{ open: false, selected: {} }">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-3xl md:text-4xl font-bold text-center text-[#3B3B1A] mb-10">
                Galeri Kegiatan Magang di Tiga Serangkai
            </h1>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
                @forelse($galeris as $galeri)
                    <div 
                        class="bg-[#AEC8A4] rounded-xl overflow-hidden shadow hover:shadow-xl transition duration-300 group relative cursor-pointer"
                        @click="open = true; selected = {{ $galeri->toJson() }}"
                    >
                        <img src="{{ asset('storage/' . $galeri->foto) }}" 
                             alt="{{ $galeri->judul }}" 
                             class="w-full h-full object-cover aspect-square transition duration-300">
                        
                        <div class="absolute inset-0 bg-[#3B3B1A]/50 opacity-0 group-hover:opacity-100 flex items-center justify-center transition duration-300">
                            <span class="text-white font-medium px-3 py-1.5 bg-[#626F47] hover:bg-[#8A784E] rounded-full text-xs sm:text-sm">
                                Lihat Detail
                            </span>
                        </div>
                    </div>
                @empty
                    <p class="text-center col-span-full text-[#3B3B1A]">Belum ada foto di galeri.</p>
                @endforelse
            </div>

            <div class="mt-16 text-center">
                <a href="{{ route('beranda') }}" class="inline-block bg-[#626F47] hover:bg-[#3B3B1A] text-white px-8 py-3 rounded-full text-lg shadow-md transition duration-300">
                    Kembali ke Beranda
                </a>
            </div>
        </div>

    <!-- Modal Pop-up -->
    <div 
        x-show="open" 
        x-transition 
        class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50 px-4"
        x-cloak
    >
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-4xl overflow-hidden relative grid grid-cols-1 md:grid-cols-2">
            <!-- Close Button -->
            <button 
                class="absolute top-4 right-4 text-[#3B3B1A] hover:text-red-500 z-10" 
                @click="open = false"
            >
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Image -->
            <div class="bg-[#E7EFC7] p-4 flex items-center justify-center">
                <img 
                    :src="'/storage/' + selected.foto" 
                    alt="" 
                    class="rounded-lg w-full h-auto object-contain max-h-[400px]"
                >
            </div>

            <!-- Detail -->
            <div class="p-6 flex flex-col justify-center bg-[#F5FBE7]">
                <h2 class="text-xl md:text-2xl font-bold text-[#3B3B1A] mb-2" x-text="selected.judul"></h2>
                <span x-text="selected.tanggal_upload.split('-').reverse().join('/')"></span> <!-- Jadi: 14/07/2025 -->
                <p class="text-sm text-[#626F47]" x-text="selected.deskripsi || 'Tidak ada deskripsi tersedia.'"></p>
            </div>
        </div>
    </div>

    </section>
</x-app-layout>
