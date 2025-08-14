<head>
    <script src="//unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<section id="passwordFormContainer" class="max-w-lg mx-auto p-8 bg-white/95 backdrop-blur-sm rounded-2xl shadow-xl border border-[#AEC8A4]/60 w-full">
    <header class="mb-8 flex items-center gap-4">
        <script src="//unpkg.com/alpinejs" defer></script>
        <div class="p-3 rounded-full bg-[#E7EFC7] text-[#626F47] shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-[#3B3B1A] font-serif">Update Password</h2>
            <p class="text-[#626F47] text-sm mt-1">Gunakan password acak dan panjang untuk keamanan akun Anda.</p>
        </div>
    </header>

    <div x-data>
        <form id="passwordUpdateForm" method="post" action="{{ route('profile.password.update') }}" class="space-y-7"
              @submit.prevent="window.dispatchEvent(new CustomEvent('show-password-confirmation'))">

            @csrf
            @method('put')

            <!-- Password Saat Ini -->
            <div>
                <label for="update_password_current_password" class="block text-sm font-semibold text-[#3B3B1A] mb-2">
                    Password Saat Ini
                </label>
                <input id="update_password_current_password" name="current_password" type="password"
                       class="w-full px-4 py-3 border border-[#AEC8A4] rounded-xl focus:ring-2 
                              focus:ring-[#626F47] focus:border-[#626F47] transition duration-200 
                              bg-[#F8FAF0] text-[#3B3B1A] placeholder-gray-400 shadow-sm"
                       autocomplete="current-password" required placeholder="Masukkan password lama">
                @error('current_password', 'updatePassword')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Baru -->
            <div>
                <label for="update_password_password" class="block text-sm font-semibold text-[#3B3B1A] mb-2">
                    Password Baru
                </label>
                <input id="update_password_password" name="password" type="password"
                       class="w-full px-4 py-3 border border-[#AEC8A4] rounded-xl focus:ring-2 
                              focus:ring-[#626F47] focus:border-[#626F47] transition duration-200 
                              bg-[#F8FAF0] text-[#3B3B1A] placeholder-gray-400 shadow-sm"
                       autocomplete="new-password" required placeholder="Password baru">
                @error('password', 'updatePassword')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Konfirmasi Password Baru -->
            <div>
                <label for="update_password_password_confirmation" class="block text-sm font-semibold text-[#3B3B1A] mb-2">
                    Konfirmasi Password Baru
                </label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                       class="w-full px-4 py-3 border border-[#AEC8A4] rounded-xl focus:ring-2 
                              focus:ring-[#626F47] focus:border-[#626F47] transition duration-200 
                              bg-[#F8FAF0] text-[#3B3B1A] placeholder-gray-400 shadow-sm"
                       autocomplete="new-password" required placeholder="Ulangi password baru">
                @error('password_confirmation', 'updatePassword')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Aksi -->
            <div class="pt-4 flex gap-4">
                <button type="submit"
                        class="flex-1 py-3 px-6 bg-gradient-to-r from-[#626F47] to-[#4f6b45] hover:from-[#3B3B1A] 
                               hover:to-[#8A784E] text-white font-semibold rounded-xl shadow-md flex 
                               items-center justify-center gap-2 transition-all duration-200">
                    {{ __('Update Password') }}
                </button>
                <button type="button" id="cancelPasswordBtn"
                        class="flex-1 py-3 px-6 bg-gray-200 hover:bg-gray-300 text-[#3B3B1A] font-semibold 
                               rounded-xl shadow-md transition-all duration-200">
                    Batal
                </button>
            </div>
        </form>
    </div>
</section>

<!-- Modal Konfirmasi (Perbaikan Utama) -->
<div x-data="{ showModal: false }"
     x-show="showModal"
     x-transition
     x-cloak
     @keydown.escape.window="showModal = false"
     class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/50 backdrop-blur-sm p-4"
     x-init="
        window.addEventListener('show-password-confirmation', () => {
            showModal = true;
        });
     ">
    
    <div class="bg-white/95 rounded-2xl shadow-2xl max-w-md w-full p-8 relative">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-[#626F47]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
            </svg>
            <h3 class="text-xl font-bold text-[#3B3B1A] mt-4 font-serif">Konfirmasi Ubah Password</h3>
            <p class="text-[#626F47] mt-2">Apakah Anda yakin ingin mengubah password?</p>
            <div class="mt-6 flex justify-center gap-4">
                <button @click="showModal = false" type="button" class="px-6 py-2 border border-[#AEC8A4] text-[#3B3B1A] rounded-xl hover:bg-gray-50 transition-colors">
                    Batal
                </button>
                <button @click="
                    showModal = false;
                    window.submitPasswordForm();
                " type="button" class="px-6 py-2 bg-gradient-to-r from-[#626F47] to-[#AEC8A4] text-white rounded-xl hover:from-[#3B3B1A] hover:to-[#8A784E] transition-colors">
                    Konfirmasi
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Error Notification Modal -->
<div x-data="{ 
        ...Alpine.store('showError'),
        init() {
            this.$watch('show', (value) => {
                if (value) setTimeout(() => this.show = false, 5000);
            });
        }
     }" 
     x-show="show" x-transition x-cloak>
    
    <div class="bg-white/95 rounded-2xl shadow-2xl max-w-md w-full p-8 relative">
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-red-500" fill="none" 
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4
                         c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <h3 class="text-xl font-bold text-[#3B3B1A] mt-4 font-serif">Gagal Mengubah Password</h3>
            <p x-text="errorMessage" class="text-red-500 mt-2"></p>
            <div class="mt-6 flex justify-center">
                <button @click="showErrorModal = false" type="button" 
                        class="px-6 py-2 bg-gradient-to-r from-[#626F47] to-[#AEC8A4] text-white rounded-xl 
                               hover:from-[#3B3B1A] hover:to-[#8A784E] transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    </div>
    <p x-text="message"></p>
</div>

<!-- Success Notification -->
@if (session('status') === 'password-updated')
    <div x-data="{ show: true }"
         x-show="show"
         x-transition
         x-init="setTimeout(() => show = false, 3000)"
         class="fixed bottom-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl 
                shadow-lg flex items-start gap-3 max-w-xs"
         x-cloak>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" 
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <div>
            <p class="font-bold">Berhasil!</p>
            <p class="text-sm">Password Anda berhasil diubah.</p>
        </div>
        <button @click="show = false" class="ml-auto text-green-700 hover:text-green-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" 
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 
                         0 111.414 1.414L11.414 10l4.293 4.293a1 1 
                         0 01-1.414 1.414L10 11.414l-4.293 4.293a1 
                         1 0 01-1.414-1.414L8.586 10 4.293 
                         5.707a1 1 0 010-1.414z" 
                      clip-rule="evenodd" />
            </svg>
        </button>
    </div>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Single source of truth untuk submit
    window.submitPasswordForm = async function() {
        try {
            const form = document.getElementById('passwordUpdateForm');
            const formData = new FormData(form);
            
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            const data = await response.json();
            
            if (!response.ok) {
                const errors = Object.values(data.errors).flat();
                throw new Error(errors.join('. '));
            }

            window.location.reload();
        } catch (error) {
            console.error('Submission error:', error);
            Alpine.store('showError', {
                message: error.message || 'Terjadi kesalahan sistem'
            });
        }
    };

    // Inisialisasi Alpine store
    document.addEventListener('alpine:init', () => {
        Alpine.store('showError', {
            message: '',
            show: false
        });
    });
});
</script>