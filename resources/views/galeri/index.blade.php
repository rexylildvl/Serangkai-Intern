<x-app-layout>
    <section class="min-h-screen py-10" 
            x-data="{
                open: false, 
                selected: null,
                init() {
                    // Pastikan state reset saat komponen dimuat
                    this.open = false;
                    this.selected = null;
                }
            }">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Header Section -->
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-3xl font-bold text-[#3B3B1A] mb-4 font-serif">
                    Galeri Kegiatan Magang
                </h1>
                <div class="w-24 h-1 bg-[#AEC8A4] mx-auto mb-4"></div>
                <p class="text-lg text-[#626F47] max-w-2xl mx-auto">
                    Dokumentasi kegiatan magang mahasiswa di PT Tiga Serangkai
                </p>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @forelse($galeris as $galeri)
                <div 
                    class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 group relative cursor-pointer border border-[#E7EFC7]"
                    @click="selected = {{ $galeri->toJson() }}; $nextTick(() => { open = true })"  // Gunakan $nextTick
                >
                        <div class="aspect-square overflow-hidden">
                            <img 
                                src="{{ asset('storage/' . $galeri->foto) }}" 
                                alt="{{ $galeri->judul }}" 
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            >
                        </div>
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-[#3B3B1A]/70 to-transparent opacity-0 group-hover:opacity-100 flex items-end justify-center p-4 transition duration-300">
                            <span class="text-white font-medium text-sm bg-[#626F47] hover:bg-[#8A784E] rounded-full px-3 py-1.5 transition-colors duration-300">
                                Lihat Detail
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 mx-auto text-[#AEC8A4]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <p class="mt-4 text-[#3B3B1A]">Belum ada foto di galeri</p>
                    </div>
                @endforelse
            </div>

            <!-- Back Button -->
            <div class="mt-16 text-center">
                <a href="{{ route('beranda') }}" class="inline-flex items-center bg-[#AEC8A4] hover:bg-[#8A9E7F] text-[#3B3B1A] font-medium px-8 py-3 rounded-full text-lg shadow-sm hover:shadow-md transition-all duration-300">
                    Kembali ke Beranda
                </a>
            </div>
        </div>

        <!-- Modal Pop-up -->
        <template x-if="open && selected">
            <div 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50 px-4 py-8"
            >
            <div class="bg-white rounded-xl shadow-2xl w-full max-w-5xl overflow-hidden relative flex flex-col md:flex-row">
                <!-- Close Button -->
                <button 
                    class="absolute top-4 right-4 bg-white/80 hover:bg-white text-[#3B3B1A] hover:text-red-500 rounded-full p-2 shadow-md z-10 transition-colors duration-300" 
                    @click="open = false"
                >
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Image Section -->
                <div class="bg-[#F5FBE7] p-6 flex items-center justify-center w-full md:w-1/2">
                    <img 
                        :src="'/storage/' + selected.foto" 
                        :alt="selected.judul" 
                        class="rounded-lg w-full h-auto max-h-[500px] object-contain shadow-sm border border-[#E7EFC7]"
                    >
                </div>

                <!-- Detail Section -->
                <div class="p-8 flex flex-col justify-center w-full md:w-1/2 bg-white">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-[#3B3B1A] mb-2 font-serif" x-text="selected.judul"></h2>
                        <div class="flex items-center text-sm text-[#8A784E]">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span x-text="new Date(selected.tanggal_upload).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })"></span>
                        </div>
                    </div>
                    <div class="prose prose-sm text-[#626F47] border-t border-[#E7EFC7] pt-4">
                        <p x-text="selected.deskripsi || 'Tidak ada deskripsi tersedia.'"></p>
                    </div>
                </div>
            </div>
        </template>
    </section>
</x-app-layout>