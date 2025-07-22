<x-app-layout>
    <section class="bg-[#E7EFC7] min-h-screen py-10" x-data="{ open: false, selected: {} }">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-[#3B3B1A] mb-3 font-serif">Berita Magang Terbaru</h2>
                <div class="w-24 h-1 bg-[#AEC8A4] mx-auto mb-4"></div>
                <p class="text-[#626F47] max-w-2xl mx-auto text-lg leading-relaxed">
                    Ikuti cerita dan kabar menarik seputar Program Magang Mahasiswa Profesional di PT Tiga Serangkai.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($allNews as $news)
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border border-[#AEC8A4]/30 hover:border-[#AEC8A4]/60 group">
                        <div class="h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $news->foto) }}" alt="{{ $news->judul }}" 
                                class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-105">
                        </div>
                        <div class="p-6">
                            <div class="flex items-center text-xs text-[#8A784E] mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ \Carbon\Carbon::parse($news->tanggal)->locale('id')->translatedFormat('l, d F Y') }}
                            </div>
                            <h3 class="font-semibold text-lg mb-3 text-[#3B3B1A] leading-tight font-serif">
                                {{ $news->judul }}
                            </h3>
                            <a href="{{ route('berita.show', $news->id) }}" class="inline-flex items-center text-sm font-medium text-[#626F47] hover:text-[#3B3B1A] transition-colors duration-300 group-hover:underline">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>