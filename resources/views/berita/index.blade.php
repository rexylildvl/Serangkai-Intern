<x-app-layout>
    <section class="bg-[#E7EFC7] py-10">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-[#3B3B1A] mb-4">Berita Magang Terbaru</h2>
                <p class="text-[#626F47] mb-6">
                    Ikuti cerita dan kabar menarik seputar Program Magang Mahasiswa Profesional di PT Tiga Serangkai.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                @foreach ($allNews as $news)
                    <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-lg transition duration-300 border border-[#AEC8A4]">
                        <div class="h-40 bg-gray-100 overflow-hidden">
                            <img src="{{ asset('storage/' . $news->foto) }}" alt="{{ $news->judul }}" class="object-cover w-full h-full">
                        </div>
                        <div class="p-5">
                            <h3 class="font-semibold text-md mb-2 text-[#3B3B1A] leading-snug">
                                {{ $news->judul }}
                            </h3>
                            <p class="text-sm text-[#8A784E] mb-2">
                                {{ \Carbon\Carbon::parse($news->tanggal)->translatedFormat('l, d F Y') }}
                            </p>
                            <a href="{{ route('berita.show', $news->id) }}" class="text-sm font-medium text-[#626F47] hover:text-[#3B3B1A]">
                                Baca Selengkapnya →
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
