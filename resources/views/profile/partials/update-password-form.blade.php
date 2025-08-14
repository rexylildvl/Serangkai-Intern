<section class="space-y-6">
    <!-- Header di luar form -->
    <header class="bg-[#F5F9E8] p-6 rounded-2xl border border-[#AEC8A4]/60 shadow mb-2">
        <h2 class="text-lg font-bold text-[#3B3B1A] font-serif flex items-center gap-2">
            {{ __('Ubah Password') }}
        </h2>
        <p class="mt-2 text-sm text-[#626F47]">
            {{ __('Anda dapat mengubah password akun Anda di sini.') }}
        </p>
    </header>

    <!-- Form -->
    <form method="post" action="{{ route('profile.password.update') }}" class="space-y-6" id="passwordUpdateForm">
        @csrf
        @method('put')

        <!-- Status Messages -->
        <div id="passwordUpdateMessage" class="hidden p-4 mb-4 rounded-xl border"></div>

        <!-- Current Password -->
        <div class="relative">
            <label for="current_password" class="block text-[#626F47] text-sm font-semibold mb-1">
                Password Saat Ini
            </label>
            <div class="relative">
                <input id="current_password" name="current_password" type="password"
                    class="w-full border border-[#AEC8A4] rounded-xl px-4 py-3 text-[#3B3B1A] bg-[#F8FAF0] 
                        placeholder-gray-400 focus:ring-2 focus:ring-[#AEC8A4] focus:border-[#626F47] transition pr-12"
                    autocomplete="current-password" required placeholder="Masukkan password lama">
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#626F47] hover:text-[#3B3B1A] transition-colors" onclick="togglePasswordVisibility('current_password', this)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <p id="current_password_error" class="mt-1 text-sm text-red-600 hidden"></p>
        </div>

        <!-- New Password -->
        <div class="relative">
            <label for="password" class="block text-[#626F47] text-sm font-semibold mb-1">
                Password Baru
            </label>
            <div class="relative">
                <input id="password" name="password" type="password"
                    class="w-full border border-[#AEC8A4] rounded-xl px-4 py-3 text-[#3B3B1A] bg-[#F8FAF0] 
                           placeholder-gray-400 focus:ring-2 focus:ring-[#AEC8A4] focus:border-[#626F47] transition pr-12"
                    autocomplete="new-password" required placeholder="Password baru">
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#626F47] hover:text-[#3B3B1A] transition-colors" onclick="togglePasswordVisibility('password', this)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <p id="password_error" class="mt-1 text-sm text-red-600 hidden"></p>
            <p class="mt-1 text-xs text-[#626F47]">
                Minimal 8 karakter dengan kombinasi huruf besar, huruf kecil, angka, dan simbol.
            </p>
        </div>

        <!-- Confirm New Password -->
        <div class="relative">
            <label for="password_confirmation" class="block text-[#626F47] text-sm font-semibold mb-1">
                Konfirmasi Password Baru
            </label>
            <div class="relative">
                <input id="password_confirmation" name="password_confirmation" type="password"
                    class="w-full border border-[#AEC8A4] rounded-xl px-4 py-3 text-[#3B3B1A] bg-[#F8FAF0] 
                           placeholder-gray-400 focus:ring-2 focus:ring-[#AEC8A4] focus:border-[#626F47] transition pr-12"
                    autocomplete="new-password" required placeholder="Ulangi password baru">
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#626F47] hover:text-[#3B3B1A] transition-colors" onclick="togglePasswordVisibility('password_confirmation', this)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </button>
            </div>
            <p id="password_confirmation_error" class="mt-1 text-sm text-red-600 hidden"></p>
        </div>

        <!-- Action Buttons -->
        <div class="flex gap-3 pt-4">
            <button type="submit" id="submitButton" 
                class="flex-1 px-6 py-3 rounded-xl bg-gradient-to-r from-[#626F47] to-[#4f6b45] text-white 
                       font-semibold shadow hover:from-[#3B3B1A] hover:to-[#8A784E] transition-all duration-200">
                Update Password
            </button>
            <button type="button" onclick="window.location.href='{{ route('profile.edit') }}'" 
                class="flex-1 px-6 py-3 rounded-xl bg-gray-200 text-[#3B3B1A] font-semibold 
                       shadow hover:bg-gray-300 transition-all duration-200">
                Batal
            </button>
        </div>
    </form>
</section>

<script>
function togglePasswordVisibility(inputId, button) {
    const input = document.getElementById(inputId);
    const isPassword = input.type === 'password';
    
    input.type = isPassword ? 'text' : 'password';
    
    // Update icon
    const eyeIcon = button.querySelector('svg');
    if (isPassword) {
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
        `;
    } else {
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
        `;
    }
}

document.getElementById('passwordUpdateForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = e.target;
    const formData = new FormData(form);
    const messageDiv = document.getElementById('passwordUpdateMessage');
    const submitBtn = document.getElementById('submitButton');
    
    // Reset UI
    document.querySelectorAll('[id$="_error"]').forEach(el => {
        el.classList.add('hidden');
        el.textContent = '';
    });
    messageDiv.classList.add('hidden');
    messageDiv.innerHTML = '';
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        Memproses...
    `;
    
    fetch(form.action, {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.errors) {
            // Handle validation errors
            Object.keys(data.errors).forEach(field => {
                const errorElement = document.getElementById(`${field}_error`);
                if (errorElement) {
                    errorElement.textContent = data.errors[field][0];
                    errorElement.classList.remove('hidden');
                }
            });
            
            // Show error message
            messageDiv.innerHTML = `
                <div class="flex items-center gap-2 text-red-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <span>Gagal mengupdate password. Silakan periksa form kembali.</span>
                </div>
            `;
            messageDiv.classList.remove('hidden');
            messageDiv.classList.add('bg-red-50', 'border-red-200');
            messageDiv.classList.remove('bg-green-50', 'border-green-200');
        } else if (data.success) {
            // Show success message and redirect
            messageDiv.innerHTML = `
                <div class="flex items-center gap-2 text-green-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    <span>${data.message}</span>
                </div>
            `;
            messageDiv.classList.remove('hidden');
            messageDiv.classList.add('bg-green-50', 'border-green-200');
            messageDiv.classList.remove('bg-red-50', 'border-red-200');
            
            // Reset form
            form.reset();
            
            // Redirect to login page after 2 seconds
            setTimeout(() => {
                window.location.href = data.redirect;
            }, 2000);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        messageDiv.innerHTML = `
            <div class="flex items-center gap-2 text-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
                <span>Terjadi kesalahan saat memproses permintaan.</span>
            </div>
        `;
        messageDiv.classList.remove('hidden');
        messageDiv.classList.add('bg-red-50', 'border-red-200');
        messageDiv.classList.remove('bg-green-50', 'border-green-200');
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitBtn.textContent = 'Update Password';
    });
});
</script>