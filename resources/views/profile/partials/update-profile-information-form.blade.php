<section class="max-w-2xl mx-auto">
    <header class="mb-8 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 mb-4 bg-[#E7EFC7] rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#626F47]" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
        </div>
        <h2 class="text-2xl font-bold text-[#3B3B1A]">Update Profil</h2>
        <p class="mt-2 text-[#626F47]">
            {{ __("Perbarui informasi profil dan alamat email akun Anda.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Input Nama dengan Floating Label -->
        <div class="relative">
            <input id="name" name="name" type="text" 
                   class="w-full px-4 py-3 border border-[#AEC8A4] rounded-lg focus:ring-2 focus:ring-[#626F47] focus:border-[#626F47] transition duration-200 peer"
                   value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" placeholder=" ">
            <label for="name" 
                   class="absolute left-4 -top-2.5 bg-white px-2 text-sm font-medium text-[#3B3B1A] peer-focus:text-[#626F47] transition-all duration-200 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3 peer-placeholder-shown:left-4 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:px-2 peer-focus:bg-white">
                {{ __('Nama') }}
            </label>
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Input Email dengan Floating Label -->
        <div class="relative">
            <input id="email" name="email" type="email" 
                   class="w-full px-4 py-3 border border-[#AEC8A4] rounded-lg focus:ring-2 focus:ring-[#626F47] focus:border-[#626F47] transition duration-200 peer"
                   value="{{ old('email', $user->email) }}" required autocomplete="username" placeholder=" ">
            <label for="email" 
                   class="absolute left-4 -top-2.5 bg-white px-2 text-sm font-medium text-[#3B3B1A] peer-focus:text-[#626F47] transition-all duration-200 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-3 peer-placeholder-shown:left-4 peer-focus:-top-2.5 peer-focus:text-sm peer-focus:px-2 peer-focus:bg-white">
                {{ __('Email') }}
            </label>
            @error('email')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-4 p-4 bg-[#F5F9E8] rounded-lg border border-[#AEC8A4] flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5 mr-2 text-[#626F47]" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    <div>
                        <p class="text-sm text-[#3B3B1A]">
                            {{ __('Email belum diverifikasi.') }}
                            <button form="send-verification" class="ml-1 font-medium text-[#626F47] hover:text-[#3B3B1A] underline transition-colors">
                                {{ __('Kirim ulang verifikasi') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-sm font-medium text-green-600">
                                {{ __('Link verifikasi baru telah dikirim ke email Anda.') }}
                            </p>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4 pt-4">
            <button type="submit" 
                    class="px-6 py-3 bg-[#626F47] hover:bg-[#3B3B1A] text-white font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md flex items-center justify-center gap-2">
                {{ __('Simpan Perubahan') }}
            </button>

            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }"
                     x-show="show"
                     x-transition
                     x-init="setTimeout(() => show = false, 3000)"
                     class="flex items-center text-sm text-green-600 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Perubahan berhasil disimpan!') }}
                </div>
            @endif
        </div>
    </form>
</section>

<style>
    /* Animasi untuk floating label */
    input:focus ~ label,
    input:not(:placeholder-shown) ~ label {
        transform: translateY(-0.5rem) scale(0.85);
        color: #626F47;
    }
</style>