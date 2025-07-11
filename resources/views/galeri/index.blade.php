<x-app-layout>
    <!-- Galeri Kegiatan Full Page -->
    <section class="bg-[#E7EFC7] py-10">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-4xl font-bold text-center text-[#3B3B1A] mb-12">Galeri Kegiatan Magang di Tiga Serangkai</h1>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @forelse($galeris as $galeri)
                    <div class="aspect-square bg-[#AEC8A4] rounded-xl overflow-hidden shadow hover:shadow-xl transition duration-300 group relative">
                        <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-[#3B3B1A]/50 opacity-0 group-hover:opacity-100 flex items-center justify-center transition duration-300">
                            <button class="text-white font-medium px-4 py-2 bg-[#626F47] hover:bg-[#8A784E] rounded-full text-sm">
                                Lihat Detail
                            </button>
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
    </section>
</x-app-layout>
