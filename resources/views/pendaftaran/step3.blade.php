<x-app-layout>
    <section class="bg-[#E7EFC7] py-12 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-4xl mx-4 bg-white rounded-xl shadow-md p-6 sm:p-8 border border-[#AEC8A4]">
            
            <!-- Progress Steps -->
            <div class="flex justify-center mb-10">
                @foreach([1 => 'Data Diri', 2 => 'Data Pendidikan', 3 => 'Data Magang'] as $index => $label)
                    <div class="flex flex-col items-center mx-4 sm:mx-6 relative">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-white 
                            {{ $index == 3 ? 'bg-[#3B3B1A] ring-2 ring-[#AEC8A4]' : ($index < 3 ? 'bg-[#8A784E]' : 'bg-[#AEC8A4]') }} 
                            transition-all duration-200">
                            {{ $index }}
                        </div>
                        <span class="text-sm text-[#3B3B1A] mt-2 font-medium whitespace-nowrap">
                            {{ $label }}
                        </span>
                    </div>
                @endforeach
            </div>

            <!-- Form Container -->
            <div class="bg-[#F8FAF3] rounded-lg p-6 border border-[#D9E4CC]">
                <form method="POST" action="{{ route('pendaftaran.submit') }}">
                    @csrf

                    <div class="grid grid-cols-1 gap-6">
                        <!-- Bidang -->
                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">Bidang yang Diminati</label>
                            <input type="text" name="bidang" required
                                class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition">
                        </div>

                        <!-- Periode -->
                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">Periode Magang</label>
                            <select name="periode" required
                                class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition">
                                <option value="" disabled selected>Pilih periode</option>
                                <option value="2 bulan">2 bulan</option>
                                <option value="3 bulan">3 bulan</option>
                                <option value="4 bulan">4 bulan</option>
                                <option value="5 bulan">5 bulan</option>
                                <option value="6 bulan">6 bulan</option>
                            </select>
                        </div>

                        <!-- Tujuan -->
                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">Tujuan Magang</label>
                            <textarea name="tujuan" rows="3" required
                                class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition"></textarea>
                        </div>

                        <!-- Keahlian -->
                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">Keahlian Pendukung</label>
                            <textarea name="keahlian" rows="3" required
                                class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition"></textarea>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between mt-8">
                        <a href="{{ route('pendaftaran.step2') }}" class="px-6 py-2.5 rounded-lg border border-[#AEC8A4] text-[#3B3B1A] hover:bg-[#E7EFC7] transition">
                            ← Kembali
                        </a>
                        <button type="submit" class="bg-[#626F47] hover:bg-[#3B3B1A] text-white px-6 py-2.5 rounded-lg shadow transition flex items-center">
                            Kirim Pendaftaran
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>
