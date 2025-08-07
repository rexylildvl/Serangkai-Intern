<section class="max-w-2xl mx-auto">
    <!-- Tampilan Read Only -->
    <div id="profileDisplay" class="space-y-6">
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
                </div>
            </div>
        </div>
        <!-- Tambahkan field lain sesuai kebutuhan -->
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
                <label for="email" class="block text-[#626F47] text-sm font-semibold mb-1">Email</label>
                <div class="relative">
                    <input id="email" name="email" type="email"
                        class="w-full border border-[#AEC8A4] rounded-xl px-4 py-3 text-[#3B3B1A] bg-[#F8FAF0] placeholder-gray-400 focus:ring-2 focus:ring-[#AEC8A4] focus:border-[#626F47] transition"
                        value="{{ old('email', $user->email) }}" required autocomplete="email" placeholder="Alamat Email" />
                </div>
            </div>
        </div>
        <!-- Tambahkan field lain sesuai kebutuhan -->
        <div class="flex gap-3 mt-4">
            <button type="submit" class="flex-1 px-6 py-3 rounded-xl bg-gradient-to-r from-[#626F47] to-[#4f6b45] text-white font-semibold shadow hover:from-[#3B3B1A] hover:to-[#8A784E] transition-all duration-200">
                Simpan
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
}
</script>

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(16px);}
    to { opacity: 1; transform: translateY(0);}
}
.animate-fade-in {
    animation: fade-in 0.4s cubic-bezier(.4,0,.2,1);
}
</style>