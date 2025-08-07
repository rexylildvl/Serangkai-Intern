<x-app-layout>
    <section class="relative bg-cover bg-center bg-no-repeat min-h-screen py-10" style="background-image: url('/images/gelap.jpg')">
        <!-- Background Overlays -->
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/60 via-slate-800/40 to-slate-900/60"></div>
        <div class="absolute inset-0 bg-[#3B3B1A]/10"></div>
        
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col">
                    <div class="flex items-center mb-3">
                        <div class="w-8 h-0.5 bg-[#AEC8A4] mr-3"></div>
                        <span class="text-[#AEC8A4] text-xs font-medium tracking-wider uppercase">Pengaturan Akun</span>
                    </div>
                    
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-2 leading-tight">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#AEC8A4] to-[#F5F9E8]">
                            Pengaturan Akun
                        </span>
                    </h1>
                    <p class="text-gray-300 text-base font-light max-w-2xl leading-relaxed">
                        <span class="inline-block bg-[#3B3B1A]/30 px-3 py-1.5 rounded-lg backdrop-blur-sm border border-[#AEC8A4]/20">
                            Kelola informasi profil dan pengaturan akun Anda
                        </span>
                    </p>
                </div>
            </div>

            <!-- Profile Card -->
            <div class="relative mb-8 bg-white rounded-2xl overflow-hidden backdrop-blur-sm border border-[#AEC8A4]/30 shadow-xl">
                <div class="flex items-center gap-6 px-8 py-8">
                    <div class="flex-shrink-0">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=AEC8A4&color=3B3B1A"
                            alt="Avatar"
                            class="w-24 h-24 rounded-full border-4 border-[#AEC8A4]/50 shadow-lg bg-white object-cover">
                    </div>
                    <div>
                        <div class="font-bold text-2xl text-[#3B3B1A] font-serif drop-shadow-sm">{{ Auth::user()->name }}</div>
                        <div class="text-base text-[#626F47] font-medium">{{ Auth::user()->email }}</div>
                        @if(Auth::user()->role)
                            <div class="mt-2 text-xs px-3 py-1 rounded-full bg-[#35472e]/30 text-[#24361d]/80 inline-block font-semibold uppercase tracking-wide backdrop-blur-sm border border-[#AEC8A4]/30">
                                {{ Auth::user()->role }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="space-y-6">

                <!-- Informasi Profil -->
                <div class="relative rounded-2xl overflow-hidden shadow-xl bg-[#F8FAF0] border border-[#AEC8A4]/30">
                    <div class="flex items-center gap-3 px-8 py-6 border-b border-[#AEC8A4]/30 bg-[#E7EFC7]/60">
                        <div class="p-2 rounded-full bg-[#AEC8A4] text-[#3B3B1A] shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-[#3B3B1A] font-serif">Informasi Profil</h2>
                    </div>
                    <div class="px-8 py-6">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <!-- Ubah Password -->
                <div class="relative rounded-2xl overflow-hidden shadow-xl bg-[#F8FAF0] border border-[#AEC8A4]/30">
                    <div class="flex items-center gap-3 px-8 py-6 border-b border-[#AEC8A4]/30 bg-[#E7EFC7]/60">
                        <div class="p-2 rounded-full bg-[#AEC8A4] text-[#3B3B1A] shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-[#3B3B1A] font-serif">Keamanan Akun</h2>
                    </div>
                    <div class="px-8 py-6">
                        <button id="showPasswordFormBtn" type="button"
                            class="px-6 py-3 rounded-xl bg-gradient-to-r from-[#626F47] to-[#4f6b45] text-white font-semibold shadow hover:from-[#3B3B1A] hover:to-[#8A784E] transition-all duration-200">
                            Ubah Password
                        </button>
                        <div id="passwordFormContainer" class="mt-6 hidden">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <!-- Hapus Akun -->
                <div class="relative rounded-2xl overflow-hidden shadow-xl bg-[#F8FAF0] border border-[#8A4E4E]/30">
                    <div class="flex items-center gap-3 px-8 py-6 border-b border-[#8A4E4E]/30 bg-[#E7C7C7]/60">
                        <div class="p-2 rounded-full bg-[#8A4E4E] text-white shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-[#8A4E4E] font-serif">Hapus Akun</h2>
                    </div>
                    <div class="px-8 py-6">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
    document.getElementById('showPasswordFormBtn').onclick = function() {
        document.getElementById('passwordFormContainer').classList.remove('hidden');
        this.classList.add('hidden');
    };
    window.addEventListener('cancelPasswordForm', function() {
        const formContainer = document.getElementById('passwordFormContainer');
        const showBtn = document.getElementById('showPasswordFormBtn');
        if(formContainer && showBtn) {
            formContainer.classList.add('hidden');
            showBtn.classList.remove('hidden');
        }
    });
    </script>
</x-app-layout>