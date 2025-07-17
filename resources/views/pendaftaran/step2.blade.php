<x-app-layout>
    <section class="bg-[#E7EFC7] py-12 min-h-screen flex items-center justify-center" x-data="{ step: 2 }">
        <!-- Main container matching step1 style -->
        <div class="w-full max-w-4xl mx-4 lg:mx-auto bg-white rounded-xl shadow-md p-6 sm:p-8 border border-[#AEC8A4]">
            <!-- Progress Steps - matching step1 style -->
            <div class="flex justify-center mb-10">
                @foreach([1 => 'Data Diri', 2 => 'Data Pendidikan', 3 => 'Data Magang'] as $index => $label)
                    <div class="flex flex-col items-center mx-4 sm:mx-6 relative">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-white 
                            {{ $index == 2 ? 'bg-[#3B3B1A] ring-2 ring-[#AEC8A4]' : ($index < 2 ? 'bg-[#8A784E]' : 'bg-[#AEC8A4]') }} 
                            transition-all duration-200">
                            {{ $index }}
                        </div>
                        <span class="text-sm text-[#3B3B1A] mt-2 font-medium whitespace-nowrap">
                            {{ $label }}
                        </span>
                    </div>
                @endforeach
            </div>

            <!-- Form Container matching step1 style -->
            <div class="bg-[#F8FAF3] rounded-lg p-6 border border-[#D9E4CC]">
                <form id="step2Form" action="{{ route('pendaftaran.step2') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Universitas -->
                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">Asal Universitas</label>
                            <input type="text" name="universitas" class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" required>
                        </div>

                        <!-- Jurusan -->
                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">Program Studi/Jurusan</label>
                            <input type="text" name="jurusan" class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" required>
                        </div>

                        <!-- Jenjang Pendidikan -->
                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">Jenjang Pendidikan</label>
                            <select name="jenjang" class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" required>
                                <option value="" disabled selected>Pilih jenjang</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                            </select>
                        </div>

                        <!-- Semester -->
                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">Semester Saat Ini</label>
                            <input type="number" min="4" name="semester" value="{{ old('semester') }}"
                                class="w-full border @error('semester') border-red-500 bg-red-50 @else border-[#AEC8A4] @enderror rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" required>

                            <p id="semesterError" class="text-sm text-red-600 mt-1 hidden">
                                Semester minimal 4 untuk mendaftar magang.
                            </p>

                            @error('semester')
                                <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Navigation Buttons matching step1 style -->
                    <div class="flex justify-between mt-8">
                        <button type="button" onclick="window.location.href='{{ route('pendaftaran.step1') }}'" class="px-6 py-2.5 rounded-lg border border-[#AEC8A4] text-[#3B3B1A] hover:bg-[#E7EFC7] transition">
                            Kembali
                        </button>
                        <button type="submit" class="bg-[#626F47] hover:bg-[#3B3B1A] text-white px-6 py-2.5 rounded-lg shadow transition flex items-center">
                            Selanjutnya
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            // Validasi semester minimal 4
            function validateSemester(input) {
                const semesterError = document.getElementById('semesterError');
                if (input.value < 4) {
                    input.classList.add('border-red-500', 'bg-red-50');
                    semesterError.classList.remove('hidden');
                } else {
                    input.classList.remove('border-red-500', 'bg-red-50');
                    semesterError.classList.add('hidden');
                }
            }

            // Validasi form lengkap
            function validateForm() {
                const form = document.getElementById('step2Form');
                let isValid = true;
                
                // Validasi field required
                const requiredFields = form.querySelectorAll('[required]');
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('border-red-500', 'bg-red-50');
                        isValid = false;
                    } else {
                        field.classList.remove('border-red-500', 'bg-red-50');
                    }
                });
                
                // Validasi khusus semester
                const semesterField = form.querySelector('input[name="semester"]');
                if (semesterField && semesterField.value < 4) {
                    semesterField.classList.add('border-red-500', 'bg-red-50');
                    document.getElementById('semesterError').classList.remove('hidden');
                    isValid = false;
                }
                
                if (!isValid) {
                    showAlert('Validasi Gagal', 'Semester minimal 4 untuk magang dan semua field wajib diisi');
                    
                    // Scroll ke error pertama
                    const firstError = form.querySelector('.border-red-500');
                    if (firstError) {
                        firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        firstError.focus();
                    }
                    
                    return false;
                }
                
                return true;
            }

            // Fungsi alert yang cantik
            function showAlert(title, message) {
                const alertDiv = document.createElement('div');
                alertDiv.className = 'fixed top-6 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md';
                alertDiv.innerHTML = `
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-lg shadow-lg flex items-start animate-fade-in">
                        <svg class="w-6 h-6 flex-shrink-0 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h3 class="font-bold">${title}</h3>
                            <p class="text-sm">${message}</p>
                        </div>
                        <button onclick="this.parentElement.parentElement.remove()" class="ml-auto text-red-500 hover:text-red-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                `;
                
                document.body.appendChild(alertDiv);
                
                // Auto remove setelah 5 detik
                setTimeout(() => {
                    alertDiv.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                    setTimeout(() => alertDiv.remove(), 300);
                }, 5000);
            }

            // Inisialisasi validasi form
            document.getElementById('step2Form').addEventListener('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault();
                }
            });
        </script>
    </section>
</x-app-layout>