<x-app-layout>
    @if(session('success'))
        <div id="successPopup" class="fixed top-6 left-1/2 transform -translate-x-1/2 z-50 bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-lg flex items-center space-x-3 animate-fade-in-down">
            <svg class="w-6 h-6 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
            <span class="font-semibold">{{ session('success') }}</span>
        </div>
        <script>
            setTimeout(function() {
                const popup = document.getElementById('successPopup');
                if (popup) popup.style.display = 'none';
            }, 3500);
        </script>
        <style>
            @keyframes fade-in-down {
                0% { opacity: 0; transform: translateY(-20px) scale(0.95);}
                100% { opacity: 1; transform: translateY(0) scale(1);}
            }
            .animate-fade-in-down {
                animation: fade-in-down 0.5s cubic-bezier(.4,0,.2,1);
            }
        </style>
    @endif

    <section class="relative bg-cover bg-center bg-no-repeat min-h-screen py-12" style="background-image: url('/images/gelap.jpg')">
        <!-- Background Overlays -->
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/60 via-slate-800/40 to-slate-900/60"></div>
        <div class="absolute inset-0 bg-[#3B3B1A]/10"></div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Form Container -->
            <div class="bg-white/95 backdrop-blur-sm rounded-xl shadow-lg p-6 sm:p-8 border border-[#AEC8A4]/50">
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-bold text-[#3B3B1A] mb-3 font-serif">
                        Pendaftaran
                        <span class="text-[#626F47]">Lowongan Magang</span>
                    </h2>
                </div>

                <!-- Progress Steps -->
                <div class="flex justify-center mb-10">
                    @foreach([1 => 'Data Diri', 2 => 'Data Pendidikan', 3 => 'Data Magang'] as $index => $label)
                        <div class="flex flex-col items-center mx-4 sm:mx-6 relative">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-white 
                                bg-[#AEC8A4] transition-all duration-200 step-indicator" data-step="{{ $index }}">
                                {{ $index }}
                            </div>
                            <span class="text-sm text-[#3B3B1A] mt-2 font-medium whitespace-nowrap">
                                {{ $label }}
                            </span>
                        </div>
                    @endforeach
                </div>

                <!-- Multi Step Form -->
                <form id="pendaftaranForm" action="{{ route('pendaftaran.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="lowongan_id" value="{{ $id_lowongan }}">

                    <!-- Step 1 -->
                    <div id="step1" class="">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Form Fields -->
                            <div class="space-y-2">
                                <label class="block text-[#3B3B1A] font-medium mb-1">Nama Lengkap</label>
                                <input 
                                    type="text" 
                                    name="nama_lengkap" 
                                    value="{{ auth()->user()->name }}" 
                                    readonly 
                                    class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 bg-gray-100 cursor-not-allowed focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" 
                                    required
                                >
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[#3B3B1A] font-medium mb-1">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" required>
                                    <option value="">Pilih</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[#3B3B1A] font-medium mb-1">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" required>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[#3B3B1A] font-medium mb-1">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" required>
                            </div>

                            <div class="md:col-span-2 space-y-2">
                                <label class="block text-[#3B3B1A] font-medium mb-1">Alamat Domisili</label>
                                <textarea name="alamat" class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" rows="3" required></textarea>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[#3B3B1A] font-medium mb-1">No HP/WA Aktif</label>
                                <input type="text" name="no_hp" class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" required>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-[#3B3B1A] font-medium mb-1">Email Aktif</label>
                                <input 
                                    type="email" 
                                    name="email" 
                                    value="{{ auth()->user()->email }}" 
                                    readonly 
                                    class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 bg-gray-100 cursor-not-allowed focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" 
                                    required
                                >
                            </div>

                            <!-- CV -->
                            <div class="space-y-2">
                                <label class="block text-[#3B3B1A] font-medium mb-1">Upload CV</label>
                                <div class="relative group">
                                    <input type="file" name="cv" accept="application/pdf" class="w-full opacity-0 absolute inset-0 cursor-pointer" id="cvInput" required>
                                    <div class="border border-[#AEC8A4] rounded-lg px-4 py-2.5 bg-white flex justify-between items-center group-hover:border-[#626F47] transition">
                                        <span id="cvFileName" class="text-gray-500 truncate">Pilih file PDF</span>
                                        <span class="bg-[#E7EFC7] text-[#3B3B1A] px-3 py-1 rounded text-sm">Pilih File</span>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Format: PDF (Maks. 5MB)</p>
                            </div>

                            <!-- Portofolio -->
                            <div class="space-y-2">
                                <label class="block text-[#3B3B1A] font-medium mb-1">Portofolio (Opsional)</label>
                                <div class="flex flex-col gap-2">
                                    <!-- Input Link -->
                                    <input type="url" name="portofolio_link" placeholder="Link portofolio (misal: Google Drive, Behance, dsb)" 
                                        class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition">
                                    <span class="text-xs text-gray-500">Atau upload file PDF di bawah ini</span>
                                    <!-- Input File -->
                                    <div class="relative group">
                                        <input type="file" name="portofolio_file" accept="application/pdf" class="w-full opacity-0 absolute inset-0 cursor-pointer" id="portofolioInput">
                                        <div class="border border-[#AEC8A4] rounded-lg px-4 py-2.5 bg-white flex justify-between items-center group-hover:border-[#626F47] transition">
                                            <span id="portofolioFileName" class="text-gray-500 truncate">Pilih file PDF</span>
                                            <span class="bg-[#E7EFC7] text-[#3B3B1A] px-3 py-1 rounded text-sm">Pilih File</span>
                                        </div>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1">Format: PDF (Maks. 5MB)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="flex justify-end mt-8 space-x-4">
                            <button type="button" onclick="nextStep(2)" class="bg-[#626F47] hover:bg-[#3B3B1A] text-white px-6 py-2.5 rounded-lg shadow transition flex items-center">
                                Selanjutnya
                            </button>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div id="step2" class="hidden">
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
                                    <p class="text-xs text-gray-500 mt-1">Minimal semester 4 untuk mendaftar magang.</p>


                                @error('semester')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <!-- Surat Pengantar Magang -->
                            <div class="space-y-2">
                                <label class="block text-[#3B3B1A] font-medium mb-1">Surat Pengantar Magang (PDF, Maks. 5MB)</label>
                                <div class="relative group">
                                    <input type="file" name="surat_pengantar" accept="application/pdf" class="w-full opacity-0 absolute inset-0 cursor-pointer" id="suratPengantarInput" required>
                                    <div class="border border-[#AEC8A4] rounded-lg px-4 py-2.5 bg-white flex justify-between items-center group-hover:border-[#626F47] transition">
                                        <span id="suratPengantarFileName" class="text-gray-500 truncate">Pilih file PDF</span>
                                        <span class="bg-[#E7EFC7] text-[#3B3B1A] px-3 py-1 rounded text-sm">Pilih File</span>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Format: PDF (Maks. 5MB)</p>
                            </div>
                        </div>

                        <!-- Navigation Buttons Step 2 -->
                        <div class="flex justify-between mt-8 space-x-4">
                            <button type="button" onclick="prevStep(1)" class="px-6 py-2.5 rounded-lg border border-[#AEC8A4] text-[#3B3B1A] hover:bg-[#E7EFC7] transition">
                                Kembali
                            </button>
                            <button type="button" onclick="nextStep(3)" class="bg-[#626F47] hover:bg-[#3B3B1A] text-white px-6 py-2.5 rounded-lg shadow transition flex items-center">
                                Selanjutnya
                            </button>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div id="step3" class="hidden">
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
                        <div class="flex justify-between mt-8 space-x-4">
                            <button type="button" onclick="prevStep(2)" class="px-6 py-2.5 rounded-lg border border-[#AEC8A4] text-[#3B3B1A] hover:bg-[#E7EFC7] transition">
                                Kembali
                            </button>
                            <button type="submit" onclick="submitForm()" class="bg-[#626F47] hover:bg-[#3B3B1A] text-white px-6 py-2.5 rounded-lg shadow transition flex items-center">
                                Kirim
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Alert for form errors -->
                <div id="formAlert" class="hidden mb-6 px-4 py-3 rounded-lg border border-red-300 bg-red-50 text-red-700 font-semibold"></div>
            </div>
        </div>
    </section>

    <script>
        function submitForm() {
    let form = document.getElementById('pendaftaranForm');
    let valid = true;
    let messages = [];
    let semesterField = form.querySelector('[name="semester"]');
    let semesterValue = parseInt(semesterField.value);

    // Reset alert
    const alertBox = document.getElementById('formAlert');
    alertBox.classList.add('hidden');
    alertBox.textContent = '';

    // Validasi semua field required
    form.querySelectorAll('[required]').forEach(function(field) {
        if (!field.value.trim()) {
            field.classList.add('border-red-500', 'bg-red-50');
            valid = false;
            messages.push(field.name.replace('_', ' ') + ' wajib diisi.');
        } else {
            field.classList.remove('border-red-500', 'bg-red-50');
        }
    });

    // Validasi khusus semester
    if (semesterField && semesterValue < 4) {
        semesterField.classList.add('border-red-500', 'bg-red-50');
        valid = false;
        messages.push('Semester minimal 4 untuk mendaftar magang.');
    }

    if (!valid) {
        alertBox.textContent = messages.join(' ');
        alertBox.classList.remove('hidden');
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
        return;
    }

    form.submit();
}
        // Navigasi antar step
        function nextStep(step) {
            let currentStep = document.getElementById('step' + (step - 1));
            let valid = true;
            let messages = [];
            const alertBox = document.getElementById('formAlert');
            alertBox.classList.add('hidden');
            alertBox.textContent = '';

            currentStep.querySelectorAll('[required]').forEach(function(field) {
                if (!field.value.trim()) {
                    field.classList.add('border-red-500', 'bg-red-50');
                    valid = false;
                    messages.push(field.name.replace('_', ' ') + ' wajib diisi.');
                } else {
                    field.classList.remove('border-red-500', 'bg-red-50');
                }
            });

            // Validasi khusus semester di step 2
            if (step === 3) {
                let semesterField = document.querySelector('[name="semester"]');
                let semesterValue = parseInt(semesterField.value);
                if (semesterField && semesterValue < 4) {
                    semesterField.classList.add('border-red-500', 'bg-red-50');
                    valid = false;
                    messages.push('Semester minimal 4 untuk mendaftar magang.');
                }
            }

            if (!valid) {
                alertBox.textContent = messages.join(' ');
                alertBox.classList.remove('hidden');
                alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            currentStep.classList.add('hidden');
            document.getElementById('step' + step).classList.remove('hidden');
            updateProgressIndicators(step);
        }

        function prevStep(step) {
            // Sembunyikan semua step
            document.querySelectorAll('[id^="step"]').forEach(function(el) {
                el.classList.add('hidden');
            });
            // Tampilkan step yang diinginkan
            document.getElementById('step' + step).classList.remove('hidden');
            updateProgressIndicators(step);
        }

        function updateProgressIndicators(activeStep) {
            document.querySelectorAll('.step-indicator').forEach(function(el) {
                const stepNumber = parseInt(el.dataset.step);
                if (stepNumber <= activeStep) {
                    el.classList.remove('bg-[#AEC8A4]');
                    el.classList.add('bg-[#3B3B1A]');
                } else {
                    el.classList.remove('bg-[#3B3B1A]');
                    el.classList.add('bg-[#AEC8A4]');
                }
            });
        }

        // Inisialisasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Set step pertama sebagai aktif
            updateProgressIndicators(1);
        });
        

        // Validasi sebelum submit (optional, bisa tambahkan sesuai kebutuhan)
        document.getElementById('pendaftaranForm').addEventListener('submit', function(event) {
            let valid = true;
            let messages = [];
            let semesterField = this.querySelector('[name="semester"]');
            let semesterValue = parseInt(semesterField.value);

            // Reset alert
            const alertBox = document.getElementById('formAlert');
            alertBox.classList.add('hidden');
            alertBox.textContent = '';

            // Validasi semua field required
            this.querySelectorAll('[required]').forEach(function(field) {
                if (!field.value.trim()) {
                    field.classList.add('border-red-500', 'bg-red-50');
                    valid = false;
                    messages.push(field.name.replace('_', ' ') + ' wajib diisi.');
                } else {
                    field.classList.remove('border-red-500', 'bg-red-50');
                }
            });

            // Validasi khusus semester
            if (semesterField && semesterValue < 4) {
                semesterField.classList.add('border-red-500', 'bg-red-50');
                valid = false;
                messages.push('Semester minimal 4 untuk mendaftar magang.');
            }

            if (!valid) {
                event.preventDefault();
                alertBox.textContent = messages.join(' ');
                alertBox.classList.remove('hidden');
                // Scroll ke atas form agar alert terlihat
                alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });

        document.getElementById('cvInput').addEventListener('change', function(e) {
            document.getElementById('cvFileName').textContent = e.target.files[0]?.name || 'Pilih file PDF';
        });
        document.getElementById('portofolioInput').addEventListener('change', function(e) {
            document.getElementById('portofolioFileName').textContent = e.target.files[0]?.name || 'Pilih file PDF';
        });
        document.getElementById('suratPengantarInput').addEventListener('change', function(e) {
    document.getElementById('suratPengantarFileName').textContent = e.target.files[0]?.name || 'Pilih file PDF';
});
    </script>
</x-app-layout>