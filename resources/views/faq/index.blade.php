<x-app-layout>
    <section class="relative bg-cover bg-center bg-no-repeat min-h-screen py-20" 
             style="background-image: url('/images/meeting.jpg')"
             x-data="{ openIndex: null }">

        <!-- Overlay: gelap + blur -->
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm z-0"></div>

        <!-- Professional gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/10 via-slate-800/5 to-slate-900/10"></div>
        <div class="absolute inset-0 bg-[#3B3B1A]/5"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-6">
            <!-- Elegant header section matching previous designs -->
            <div class="text-center mb-10">
                <h1 class="text-4xl md:text-4xl font-serif font-bold text-white mb-4 tracking-tight">
                    Pusat Informasi
                </h1>
                
                <div class="w-24 h-0.5 bg-[#AEC8A4] mx-auto mb-6"></div>
                
                <p class="text-white text-lg max-w-2xl mx-auto leading-relaxed font-light">
                    Temukan jawaban untuk pertanyaan yang sering diajukan tentang Program Magang Mahasiswa Profesional di PT Tiga Serangkai
                </p>
            </div>

            <!-- FAQ Content -->
            <div class="space-y-5">
                @forelse($faqs as $index => $faq)
                    <div 
                        class="bg-white/95 backdrop-blur-sm rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 border-l-4"
                        :class="openIndex === {{ $index }} ? 'border-[#AEC8A4]' : 'border-transparent hover:border-[#AEC8A4]/50'"
                    >
                        <button
                            @click="openIndex === {{ $index }} ? openIndex = null : openIndex = {{ $index }}"
                            class="w-full px-6 py-5 text-left flex justify-between items-center transition group"
                        >
                            <div class="flex items-start space-x-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-[#3B3B1A] text-left transition-colors duration-300"
                                        :class="openIndex === {{ $index }} ? 'text-[#3B3B1A]' : 'group-hover:text-[#626F47]'">
                                        {{ $faq->pertanyaan }}
                                    </h3>
                                </div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#8A784E] transition-transform duration-300"
                                :class="{ 'transform rotate-180': openIndex === {{ $index }} }" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div 
                            x-show="openIndex === {{ $index }}" 
                            x-collapse 
                            class="px-6 pb-6 text-[#626F47] bg-[#F5FBE7] transition-all duration-300"
                        >
                            <div class="pr-4 pt-2 space-y-3">
                                <div class="flex items-start">
                                    <div class="prose faq-content max-w-none text-gray-700">
                                        {!! $faq->jawaban !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="bg-white/95 backdrop-blur-sm rounded-xl p-8 text-center shadow-lg">
                        <svg class="w-12 h-12 mx-auto text-[#AEC8A4]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-[#3B3B1A]">Belum ada pertanyaan</h3>
                        <p class="mt-2 text-[#626F47]">Silakan kembali nanti untuk melihat pertanyaan yang tersedia.</p>
                    </div>
                @endforelse
            </div>

            <!-- PAGINATION -->
            <div class="mt-10">
                {{ $faqs->links('pagination::tailwind') }}
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
    </section>
</x-app-layout>