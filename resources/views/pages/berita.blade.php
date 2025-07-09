<x-app-layout>
    <section class="bg-[#E7EFC7] py-20">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-[#3B3B1A] mb-4">Cerita Hari Pertama Magang: Antara Grogi dan Antusias</h2>
                <p class="text-[#626F47] mb-6">
                    Hari pertama magang selalu menjadi momen yang mendebarkan bagi banyak mahasiswa
                </p>
                <a href="#" class="inline-block bg-[#626F47] hover:bg-[#3B3B1A] text-white px-6 py-3 rounded-full transition duration-300 shadow-md">
                    Lihat Selengkapnya
                </a>
                <div class="mt-6 flex justify-center space-x-2">
                    <span class="w-2.5 h-2.5 bg-[#3B3B1A] rounded-full"></span>
                    <span class="w-2.5 h-2.5 bg-[#8A784E] rounded-full opacity-50"></span>
                    <span class="w-2.5 h-2.5 bg-[#8A784E] rounded-full opacity-50"></span>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                @foreach([
                    ['title' => 'Pembukaan Program Magang TSIC Periode Agustus 2025', 'date' => 'Selasa, 1 Juli 2025'],
                    ['title' => 'Wawancara Eksklusif dengan Mentor Magang Divisi IT', 'date' => 'Senin, 2 Juni 2025'],
                    ['title' => 'Kenalan dengan Divisi Penerbitan: Apa yang Dipelajari Saat Magang?', 'date' => 'Selasa, 3 Juni 2025'],
                    ['title' => 'Testimoni Alumni Magang: Pengalaman Seru Belajar di Dunia Kerja', 'date' => 'Rabu, 4 Juni 2025'],
                    ['title' => 'Cerita Hari Pertama Magang: Antara Grogi dan Antusias', 'date' => 'Kamis, 5 Juni 2025'],
                    ['title' => 'Kenalan dengan Divisi Penerbitan: Apa yang Dipelajari Saat Magang?', 'date' => 'Jumat, 6 Juni 2025']
                ] as $news)
                <div class="bg-white rounded-xl overflow-hidden shadow hover:shadow-lg transition duration-300 border border-[#AEC8A4]">
                    <div class="h-40 bg-[#AEC8A4] flex items-center justify-center text-[#3B3B1A] font-medium">
                        Gambar Berita
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-md mb-2 text-[#3B3B1A] leading-snug">{{ $news['title'] }}</h3>
                        <p class="text-sm text-[#8A784E] mb-2">{{ $news['date'] }}</p>
                        <a href="#" class="text-sm font-medium text-[#626F47] hover:text-[#3B3B1A]">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
