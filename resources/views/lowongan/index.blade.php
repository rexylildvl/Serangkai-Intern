<x-app-layout>
    <section class="bg-[#E7EFC7] py-10 min-h-screen">
        <div class="max-w-6xl mx-auto px-4">
            <h1 class="text-4xl font-bold text-[#3B3B1A] text-center mb-12">Semua Lowongan Magang</h1>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach($lowongans as $job)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition duration-300 p-6 border border-[#AEC8A4]">
                        <h3 class="text-lg font-bold text-[#3B3B1A] mb-1">{{ $job->judul }}</h3>
                        <p class="text-sm text-[#8A784E] mb-4">{{ $job->jurusan ?? 'Terbuka untuk semua jurusan' }}</p>
                        <ul class="text-sm text-[#626F47] space-y-1 mb-4">
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 mt-[3px] text-[#3B3B1A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 12.414M6 18V6a2 2 0 012-2h8a2 2 0 012 2v12l-5-5-5 5z"/>
                                </svg>
                                {{ $job->lokasi }}
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 mt-[3px] text-[#3B3B1A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 4h10a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V9a2 2 0 012-2zm2 4h6"/>
                                </svg>
                                Deadline: {{ $job->deadline ?? 'Tidak terbatas' }}
                            </li>
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 mt-[3px] text-[#3B3B1A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Durasi: {{ $job->durasi }}
                            </li>
                        </ul>
                        <div class="text-sm text-[#3B3B1A] font-semibold mb-1">Kualifikasi</div>
                        <ul class="text-sm text-[#626F47] space-y-1 mb-4">
                            @foreach($job->kualifikasi as $kualif)
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 mt-[3px] text-[#3B3B1A]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    {{ $kualif }}
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ route('lowongan.show', $job->id) }}" class="inline-block w-full text-center bg-[#626F47] hover:bg-[#3B3B1A] text-white font-semibold py-2 rounded-md transition">
                            Lihat Detail
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $lowongans->links() }}
            </div>
        </div>
    </section>
</x-app-layout>
