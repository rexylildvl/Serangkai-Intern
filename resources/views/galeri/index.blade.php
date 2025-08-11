<x-app-layout>
    <section class="relative bg-cover bg-center bg-no-repeat min-h-screen py-20" 
             style="background-image: url('/images/meeting.jpg')"
             x-data="{
                open: false, 
                selected: null,
                init() {
                    this.open = false;
                    this.selected = null;
                }
             }">

        <!-- Overlay: gelap + blur -->
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm z-0"></div>

        <!-- Professional gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/10 via-slate-800/5 to-slate-900/10"></div>
        <div class="absolute inset-0 bg-[#3B3B1A]/5"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6">
            <!-- Elegant header section matching previous designs -->
            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-4xl font-serif font-bold text-white mb-4 tracking-tight">
                    Dokumentasi Program Magang
                </h1>
                
                <div class="w-24 h-0.5 bg-[#AEC8A4] mx-auto mb-6"></div>
                
                <p class="text-white text-lg max-w-2xl mx-auto leading-relaxed font-light">
                    Dokumentasi Program Magang Mahasiswa Profesional di PT Tiga Serangkai
                </p>
            </div>

            <!-- Gallery Grid with matching style -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @forelse($galeris as $galeri)
                <article 
                    class="group cursor-pointer"
                    @click="selected = {{ $galeri->toJson() }}; $nextTick(() => { open = true })"
                >
                    <div class="bg-white/95 backdrop-blur-sm rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 h-full flex flex-col">
                        <div class="aspect-square overflow-hidden relative">
                            <img 
                                src="{{ asset('storage/' . $galeri->foto) }}" 
                                alt="{{ $galeri->judul }}" 
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            >
                            <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors duration-300"></div>
                        </div>
                        
                        <div class="p-4 flex-grow">
                            <h3 class="font-medium text-[#3B3B1A] line-clamp-2">{{ $galeri->judul }}</h3>
                            <div class="flex items-center mt-2 text-sm text-[#8A784E]">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($galeri->tanggal_upload)->translatedFormat('d M Y') }}
                            </div>
                        </div>
                    </div>
                </article>
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
            <div class="mt-10 flex justify-center">
                <a href="{{ route('beranda') }}" class="group relative bg-gradient-to-r from-[#AEC8A4] to-[#8A9E7F] hover:from-[#8A9E7F] hover:to-[#626F47] text-[#3B3B1A] hover:text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 font-semibold tracking-wide transform hover:-translate-y-1 overflow-hidden">
                    <span class="relative z-10 flex items-center">
                        Kembali ke Beranda
                    </span>
                    <div class="absolute inset-0 bg-gradient-to-r from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
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
                @click.self="open = false"
            >
                <div class="bg-white/95 backdrop-blur-sm rounded-2xl shadow-2xl w-full max-w-5xl overflow-hidden relative flex flex-col md:flex-row max-h-[90vh]">
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
                            class="rounded-lg w-full h-auto max-h-[70vh] object-contain shadow-sm border border-[#E7EFC7]"
                        >
                    </div>

                    <!-- Detail Section -->
                    <div class="p-8 flex flex-col justify-center w-full md:w-1/2 overflow-y-auto">
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
            </div>
        </template>
    </section>
</x-app-layout>