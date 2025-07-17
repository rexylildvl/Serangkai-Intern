<x-app-layout>
    <section class="bg-[#E7EFC7] py-12 min-h-screen flex items-center justify-center">
        <!-- Widened container (90% of viewport on large screens) -->
        <div class="w-full max-w-4xl mx-4 lg:mx-auto bg-white rounded-xl shadow-md p-6 sm:p-8 border border-[#AEC8A4]">
            <!-- Progress Steps -->
            <div class="flex justify-center mb-10">
                @foreach([1 => 'Data Diri', 2 => 'Data Pendidikan', 3 => 'Data Magang'] as $index => $label)
                    <div class="flex flex-col items-center mx-4 sm:mx-6 relative">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-white 
                            {{ request()->routeIs('pendaftaran.step' . $index) ? 'bg-[#3B3B1A] ring-2 ring-[#AEC8A4]' : 'bg-[#AEC8A4]' }} 
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
                <form id="step1Form" action="{{ route('pendaftaran.step1') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Form Fields -->
                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" required>
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
                            <textarea name="alamat_domisili" class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" rows="3" required></textarea>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">No HP/WA Aktif</label>
                            <input type="text" name="no_hp" class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" required>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">Email Aktif</label>
                            <input type="email" name="email" class="w-full border border-[#AEC8A4] rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-[#626F47] focus:border-transparent transition" required>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">Upload CV</label>
                            <div class="relative group">
                                <input type="file" name="cv" accept="application/pdf" class="w-full opacity-0 absolute inset-0 cursor-pointer" id="cvInput" required>
                                <div class="border border-[#AEC8A4] rounded-lg px-4 py-2.5 bg-white flex justify-between items-center group-hover:border-[#626F47] transition">
                                    <span class="text-gray-500 truncate">Pilih file PDF</span>
                                    <span class="bg-[#E7EFC7] text-[#3B3B1A] px-3 py-1 rounded text-sm">Pilih File</span>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Format: PDF (Maks. 5MB)</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[#3B3B1A] font-medium mb-1">Upload Portofolio (Opsional)</label>
                            <div class="relative group">
                                <input type="file" name="portofolio" accept="application/pdf" class="w-full opacity-0 absolute inset-0 cursor-pointer" id="portofolioInput">
                                <div class="border border-[#AEC8A4] rounded-lg px-4 py-2.5 bg-white flex justify-between items-center group-hover:border-[#626F47] transition">
                                    <span class="text-gray-500 truncate">Pilih file PDF</span>
                                    <span class="bg-[#E7EFC7] text-[#3B3B1A] px-3 py-1 rounded text-sm">Pilih File</span>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Format: PDF (Maks. 5MB)</p>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-end mt-8 space-x-4">
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
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize file input displays
            const cvInput = document.getElementById('cvInput');
            const portofolioInput = document.getElementById('portofolioInput');
            
            // Display selected file names
            cvInput.addEventListener('change', function() {
                displayFileName(this);
            });
            
            portofolioInput.addEventListener('change', function() {
                displayFileName(this);
            });
            
            // Load saved form data from localStorage
            const savedData = localStorage.getItem('step1FormData');
            if (savedData) {
                const formObject = JSON.parse(savedData);
                const form = document.getElementById('step1Form');
                
                Object.entries(formObject).forEach(([key, value]) => {
                    const field = form.querySelector(`[name="${key}"]`);
                    if (field && field.type !== 'file') {
                        field.value = value;
                    }
                });
            }
            
            // Form submission handler
            const form = document.getElementById('step1Form');
            form.addEventListener('submit', function(event) {
                if (!validateForm()) {
                    event.preventDefault();
                } else {
                    // Save form data to localStorage before submitting
                    const formData = new FormData(form);
                    const formObject = {};
                    formData.forEach((value, key) => {
                        formObject[key] = value;
                    });
                    localStorage.setItem('step1FormData', JSON.stringify(formObject));
                }
            });
        });
        
        function displayFileName(inputElement) {
            const fileDisplay = inputElement.nextElementSibling.querySelector('span:first-child');
            
            if (inputElement.files.length > 0) {
                const fileName = inputElement.files[0].name;
                fileDisplay.textContent = fileName;
                fileDisplay.classList.remove('text-gray-500');
                fileDisplay.classList.add('text-[#3B3B1A]', 'font-medium');
                
                // Add PDF icon
                const fileIcon = document.createElement('span');
                fileIcon.innerHTML = '📄 ';
                fileDisplay.parentNode.insertBefore(fileIcon, fileDisplay);
            } else {
                fileDisplay.textContent = 'Pilih file PDF';
                fileDisplay.classList.add('text-gray-500');
                fileDisplay.classList.remove('text-[#3B3B1A]', 'font-medium');
                
                // Remove icon if exists
                const existingIcon = fileDisplay.previousSibling;
                if (existingIcon && existingIcon.nodeType === Node.ELEMENT_NODE && existingIcon.innerHTML.includes('📄')) {
                    fileDisplay.parentNode.removeChild(existingIcon);
                }
            }
        }
        
        function validateForm() {
            const form = document.getElementById('step1Form');
            let isValid = true;
            
            // Clear previous error states
            form.querySelectorAll('.border-red-500').forEach(el => {
                el.classList.remove('border-red-500', 'bg-red-50');
            });
            
            // Validate required fields
            const requiredFields = form.querySelectorAll('[required]');
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    field.classList.add('border-red-500', 'bg-red-50');
                    if (field.type === 'file') {
                        field.nextElementSibling.classList.add('border-red-500', 'bg-red-50');
                    }
                    isValid = false;
                }
            });
            
            // Validate email format
            const emailField = form.querySelector('input[type="email"]');
            if (emailField && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailField.value)) {
                emailField.classList.add('border-red-500', 'bg-red-50');
                isValid = false;
            }
            
            // Validate CV file type
            const cvInput = document.getElementById('cvInput');
            if (cvInput.files.length > 0) {
                const file = cvInput.files[0];
                if (file.type !== 'application/pdf') {
                    cvInput.nextElementSibling.classList.add('border-red-500', 'bg-red-50');
                    showAlert('Format File Salah', 'File CV harus dalam format PDF.');
                    isValid = false;
                }
            }
            
            if (!isValid) {
                showAlert('Validasi Gagal', 'Harap periksa kembali data yang Anda masukkan.');
                const firstError = form.querySelector('.border-red-500');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstError.focus();
                }
            }
            
            return isValid;
        }
        
        function showAlert(title, message) {
            // Remove existing alert if any
            const existingAlert = document.querySelector('.custom-alert');
            if (existingAlert) {
                existingAlert.remove();
            }
            
            const alertDiv = document.createElement('div');
            alertDiv.className = 'fixed top-6 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md custom-alert';
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
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                alertDiv.classList.add('opacity-0', 'transition-opacity', 'duration-300');
                setTimeout(() => alertDiv.remove(), 300);
            }, 5000);
        }
    </script>
</x-app-layout>