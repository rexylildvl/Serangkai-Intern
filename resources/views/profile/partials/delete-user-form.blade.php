<section class="space-y-6">
    <header class="bg-[#F5F9E8] p-6 rounded-2xl border border-[#AEC8A4]/60 shadow mb-2">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <h2 class="text-lg font-bold text-[#3B3B1A] font-serif flex items-center gap-2">
            {{ __('Hapus Akun') }}
        </h2>
        <p class="mt-2 text-sm text-[#626F47]">
            {{ __('Setelah akun Anda dihapus, semua data dan sumber daya akan dihapus secara permanen. Sebelum menghapus akun, harap unduh semua data atau informasi yang ingin Anda simpan.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-6 py-3 bg-gradient-to-r from-red-600 to-[#8A4E4E] hover:from-red-700 hover:to-[#8A4E4E] text-white font-semibold rounded-xl shadow-md transition-all duration-200"
    >
        {{ __('Hapus Akun') }}
    </button>

            <!-- Modal -->
            <div x-data="{
                    show: false,
                    errorMessage: '',
                    hasError: false
                }" 
                x-show="show"
                x-on:open-modal.window="if ($event.detail === 'confirm-user-deletion') { 
                    show = true; 
                    errorMessage = ''; 
                    hasError = false; 
                }"
                x-on:close.window="show = false"
                x-transition
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm"
                style="display: none;">
                <div class="bg-white/95 rounded-2xl shadow-2xl max-w-md w-full p-8 relative">
                    
                    <!-- Error Alert -->
                    <div x-show="hasError" x-transition class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                            </svg>
                            <p x-text="errorMessage" class="font-medium"></p>
                        </div>
                    </div>

                    <form method="post" action="{{ route('profile.destroy') }}" 
                    x-on:submit.prevent="
                        fetch($event.target.action, {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: new FormData($event.target)
                        })
                        .then(response => {
                            if (response.ok) {
                                window.location.href = '{{ route('login') }}';
                                return;
                            }
                            throw response;
                        })
                        .catch(error => {
                            error.json().then(err => {
                                errorMessage = err.errors.password[0];
                                hasError = true;
                            });
                        });
                    ">
                @csrf
                @method('delete')

                <div class="text-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <h2 class="text-xl font-bold text-[#3B3B1A] mt-4 font-serif">
                        {{ __('Apakah Anda yakin ingin menghapus akun?') }}
                    </h2>
                    <p class="mt-2 text-[#626F47] text-sm">
                        {{ __('Setelah akun Anda dihapus, semua data akan dihapus secara permanen. Masukkan password Anda untuk mengonfirmasi penghapusan akun.') }}
                    </p>
                </div>

                <div class="mb-6 relative">
                    <div class="relative">
                        <input
                            id="delete_password"
                            name="password"
                            type="password"
                            class="w-full px-4 py-3 border border-[#AEC8A4] rounded-xl focus:ring-2 focus:ring-[#626F47] focus:border-[#626F47] transition duration-200 bg-[#F8FAF0] text-[#3B3B1A] placeholder-gray-400 pr-12"
                            placeholder="{{ __('Password') }}"
                            required
                            x-on:input="hasError = false"
                        />
                        <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#626F47] hover:text-[#3B3B1A] transition-colors" onclick="togglePasswordVisibility('delete_password', this)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <button 
                        type="button"
                        x-on:click="show = false; hasError = false;"
                        class="px-5 py-2 border border-[#AEC8A4] text-[#3B3B1A] font-semibold rounded-xl hover:bg-[#E7EFC7] transition-colors duration-200"
                    >
                        {{ __('Batal') }}
                    </button>
                    <button 
                        type="submit"
                        class="px-5 py-2 bg-gradient-to-r from-red-600 to-[#8A4E4E] hover:from-red-700 hover:to-[#8A4E4E] text-white font-semibold rounded-xl shadow-md transition-all duration-200"
                    >
                        {{ __('Hapus Akun') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
function togglePasswordVisibility(inputId, button) {
    const input = document.getElementById(inputId);
    if (!input) return;
    
    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';
    
    // Update icon
    const eyeIcon = button.querySelector('svg');
    if (!eyeIcon) return;
    
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
</script>