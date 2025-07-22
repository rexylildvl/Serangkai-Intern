<x-app-layout>
    {{-- Banner Section --}}
    <section class="relative h-64 bg-cover bg-center" style="background-image: url('{{ asset('images/banner-faq.jpg') }}')">
    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center pl-10">
        <h1 class="text-white text-4xl font-bold leading-snug">
            Pusat<br>Informasi
        </h1>
    </div>
</section>


    {{-- FAQ Section --}}
    <section class="bg-[#E7EFC7] py-12 min-h-screen" x-data="{ openIndex: null }">
        <div class="max-w-4xl mx-auto px-4">
            <div class="text-center mb-16">
                 <h2 class="text-3xl font-bold text-[#3B3B1A] mb-4">Pusat Informasi</h2>
                <p class="text-[#626F47] text-lg">
                    Halaman ini berisi tentang pertanyaan dan jawaban yang sering ditanyakan. Mohon gunakan kotak pencarian untuk menemukan jawaban yang sesuai dengan kebutuhan Anda.
                </p>
            </div>

            <div class="space-y-4">
                @forelse($faqs as $index => $faq)
                    <div class="border border-[#8A784E] rounded-xl overflow-hidden bg-white shadow-sm">
                        <button
                            @click="openIndex === {{ $index }} ? openIndex = null : openIndex = {{ $index }}"
                            class="w-full px-6 py-4 text-left font-semibold text-[#3B3B1A] hover:bg-[#DDEBC7] flex justify-between items-center transition"
                        >
                            <span>{{ $faq->pertanyaan }}</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#626F47] transition-transform duration-200"
                                :class="{ 'transform rotate-180': openIndex === {{ $index }} }" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="openIndex === {{ $index }}" x-collapse class="px-6 pb-4 text-[#626F47] bg-[#F5FBE7] faq-content">
                            {!! $faq->jawaban !!}
                        </div>
                        
                    </div>
                @empty
                    <p class="text-gray-600 text-center">Belum ada pertanyaan yang ditambahkan.</p>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-10">
                
                    {{ $faqs->links('pagination::tailwind') }}
            </div>
            

            {{-- Tombol kembali --}}
            <div class="text-center mt-12">
                <a href="{{ route('beranda') }}"
                   class="inline-block bg-[#626F47] hover:bg-[#3B3B1A] text-white px-6 py-3 rounded-full transition duration-300 shadow-md">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
