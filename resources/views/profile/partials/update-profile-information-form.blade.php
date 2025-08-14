<section class="max-w-2xl mx-auto">
    <!-- Tampilan Read Only -->
    <div id="profileDisplay" class="space-y-6">
        <!-- Pesan Status -->
        @if (session('status') === 'verification-link-sent')
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                Link verifikasi baru telah dikirim ke alamat email Anda.
            </div>
        @endif
        
        @if (session('status') === 'profile-updated')
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                Profil berhasil diperbarui.
            </div>
        @endif

        <div class="flex flex-col md:flex-row gap-6">
            <div class="flex-1">
                <label class="block text-[#626F47] text-sm font-semibold mb-1">Nama</label>
                <div class="flex items-center bg-[#F5F9E8] border border-[#AEC8A4]/50 rounded-xl px-4 py-3 text-[#3B3B1A] font-semibold shadow-sm">
                    <svg class="w-5 h-5 mr-2 text-[#8A784E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    {{ $user->name }}
                </div>
            </div>
            <div class="flex-1">
                <label class="block text-[#626F47] text-sm font-semibold mb-1">Email</label>
                <div class="flex items-center bg-[#F5F9E8] border border-[#AEC8A4]/50 rounded-xl px-4 py-3 text-[#3B3B1A] font-semibold shadow-sm">
                    <svg class="w-5 h-5 mr-2 text-[#8A784E]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m8 0a4 4 0 11-8 0 4 4 0 018 0zm0 0v1a4 4 0 01-8 0v-1" />
                    </svg>
                    {{ $user->email }}
                    @if (!$user->hasVerifiedEmail())
                        <span class="ml-2 px-2 py-1 text-xs text-yellow-800 bg-yellow-100 rounded-full">
                            Belum diverifikasi
                        </span>
                    @endif
                </div>
            </div>
        </div>
        
        @if (!$user->hasVerifiedEmail())
            <div class="p-4 text-sm text-yellow-700 bg-yellow-100 rounded-lg">
                Email Anda belum terverifikasi. Silakan cek email Anda untuk tautan verifikasi.
                <form method="POST" action="{{ route('verification.send') }}" class="mt-2">
                    @csrf
                    <button type="submit" class="text-[#626F47] hover:underline font-medium">
                        Kirim ulang email verifikasi
                    </button>
                </form>
            </div>
        @endif

        <div>
            <button type="button" onclick="toggleProfileEdit(true)" class="mt-4 px-6 py-3 rounded-xl bg-gradient-to-r from-[#626F47] to-[#4f6b45] text-white font-semibold shadow hover:from-[#3B3B1A] hover:to-[#8A784E] transition-all duration-200">
                Edit Profil
            </button>
        </div>
    </div>

    <!-- Form Edit -->
    <form id="profileEditForm" method="post" action="{{ route('profile.update') }}" class="space-y-6 hidden animate-fade-in">
        @csrf
        @method('patch')
        
        <div id="formErrors" class="hidden p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg">
            <ul id="errorList"></ul>
        </div>

        <div class="flex flex-col md:flex-row gap-6">
            <div class="flex-1">
                <label for="name" class="block text-[#626F47] text-sm font-semibold mb-1">Nama</label>
                <div class="relative">
                    <input id="name" name="name" type="text"
                        class="w-full border border-[#AEC8A4] rounded-xl px-4 py-3 text-[#3B3B1A] bg-[#F8FAF0] placeholder-gray-400 focus:ring-2 focus:ring-[#AEC8A4] focus:border-[#626F47] transition"
                        value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" placeholder="Nama Lengkap" />
                </div>
            </div>
            <div class="flex-1">
                <label for="current_email" class="block text-[#626F47] text-sm font-semibold mb-1">Email Saat Ini</label>
                <div class="relative">
                    <input id="current_email" type="email" readonly
                        class="w-full border border-[#AEC8A4] rounded-xl px-4 py-3 text-[#3B3B1A] bg-gray-100 cursor-not-allowed"
                        value="{{ $user->email }}" />
                </div>
            </div>
        </div>
        
    <div class="flex-1">
        <label for="email" class="block text-[#626F47] text-sm font-semibold mb-1">Email Baru (Opsional)</label>
        <div class="relative">
            <input id="email" name="email" type="email"
                class="w-full border border-[#AEC8A4] rounded-xl px-4 py-3 text-[#3B3B1A] bg-[#F8FAF0] placeholder-gray-400 focus:ring-2 focus:ring-[#AEC8A4] focus:border-[#626F47] transition"
                value="{{ old('email', $user->email) }}" autocomplete="email" placeholder="Biarkan kosong jika tidak ingin mengubah" />
        </div>
        <p class="mt-1 text-sm text-gray-500">
            Jika diisi, link verifikasi akan dikirim ke email baru.
        </p>
    </div>
        
        <div class="flex-1">
            <label for="current_password" class="block text-[#626F47] text-sm font-semibold mb-1">Password Saat Ini</label>
            <div class="relative">
                <input id="current_password" name="current_password" type="password"
                    class="w-full border border-[#AEC8A4] rounded-xl px-4 py-3 text-[#3B3B1A] bg-[#F8FAF0] placeholder-gray-400 focus:ring-2 focus:ring-[#AEC8A4] focus:border-[#626F47] transition"
                    placeholder="Password saat ini untuk konfirmasi" required />
            </div>
            <p class="mt-1 text-sm text-gray-500">
                Wajib diisi untuk mengkonfirmasi perubahan.
            </p>
            <div id="passwordError" class="hidden mt-1 text-sm text-red-600"></div>
        </div>

        <div class="flex gap-3 mt-4">
            <button type="submit" id="submitButton" class="flex-1 px-6 py-3 rounded-xl bg-gradient-to-r from-[#626F47] to-[#4f6b45] text-white font-semibold shadow hover:from-[#3B3B1A] hover:to-[#8A784E] transition-all duration-200">
                Simpan Perubahan
            </button>
            <button type="button" onclick="toggleProfileEdit(false)" class="flex-1 px-6 py-3 rounded-xl bg-gray-200 text-[#3B3B1A] font-semibold shadow hover:bg-gray-300 transition-all duration-200">
                Batal
            </button>
        </div>
    </form>
</section>

<script>
function toggleProfileEdit(editMode) {
    document.getElementById('profileDisplay').classList.toggle('hidden', editMode);
    document.getElementById('profileEditForm').classList.toggle('hidden', !editMode);
    
    if (editMode) {
        document.getElementById('name').focus();
        // Reset error messages when opening form
        document.getElementById('formErrors').classList.add('hidden');
        document.getElementById('passwordError').classList.add('hidden');
        document.getElementById('passwordError').textContent = '';
    }
}

document.getElementById('profileEditForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const form = e.target;
    const formData = new FormData(form);
    const submitButton = document.getElementById('submitButton');
    const passwordError = document.getElementById('passwordError');
    const formErrors = document.getElementById('formErrors');
    const errorList = document.getElementById('errorList');
    
    // Reset error states
    passwordError.classList.add('hidden');
    formErrors.classList.add('hidden');
    errorList.innerHTML = '';
    submitButton.disabled = true;
    submitButton.innerHTML = 'Memproses...';
    
    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => { throw err; });
        }
        return response.json();
    })
    .then(data => {
        if (data.redirect) {
            window.location.href = data.redirect;
        } else if (data.message) {
            window.location.reload();
        }
    })
    .catch(error => {
        submitButton.disabled = false;
        submitButton.innerHTML = 'Simpan Perubahan';
        
        if (error.errors) {
            errorList.innerHTML = '';
            for (const [key, value] of Object.entries(error.errors)) {
                const li = document.createElement('li');
                li.textContent = value;
                errorList.appendChild(li);
            }
            formErrors.classList.remove('hidden');
            
            if (error.errors.current_password) {
                passwordError.textContent = error.errors.current_password[0];
                passwordError.classList.remove('hidden');
            }
        } else if (error.message) {
            passwordError.textContent = error.message;
            passwordError.classList.remove('hidden');
        }
    });
});

// Real-time password validation
document.getElementById('current_password').addEventListener('blur', function() {
    const password = this.value;
    if (!password) return;
    
    fetch("{{ route('profile.validate-password') }}", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ current_password: password })
    })
    .then(response => response.json())
    .then(data => {
        const passwordError = document.getElementById('passwordError');
        if (!data.valid) {
            passwordError.textContent = 'Password yang dimasukkan salah';
            passwordError.classList.remove('hidden');
        } else {
            passwordError.classList.add('hidden');
        }
    });
});
</script>

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(16px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in {
    animation: fade-in 0.4s cubic-bezier(.4,0,.2,1);
}
</style>