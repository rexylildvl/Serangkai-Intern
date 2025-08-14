<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Serangkai Intern</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('images/ts.jpg') }}'); background-blend-mode: overlay; background-color: rgba(0,0,0,0.3);">

    <div class="bg-[#3B3B1A]/90 backdrop-blur-sm rounded-2xl shadow-2xl w-full max-w-md p-8 mx-4 transition-all duration-300 hover:shadow-[0_10px_30px_rgba(0,0,0,0.3)]">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <img src="{{ asset('images/logo-ts.png') }}" alt="Logo TS" class="h-20 transition-transform duration-300 hover:scale-105">
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 text-[#E7EFC7]" :status="session('status')" />

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-[#E7EFC7] font-medium" />
                <x-text-input 
                    id="email" 
                    class="block mt-2 w-full bg-[#3B3B1A] border-2 border-[#626F47] focus:border-[#AEC8A4] focus:ring-2 focus:ring-[#AEC8A4]/50 text-[#E7EFC7] placeholder-[#AEC8A4]/70 rounded-lg px-4 py-3" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    placeholder="Enter your email"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-[#FFA3A3]" />
            </div>

            <!-- Password -->
            <div class="relative">
                <x-input-label for="password" :value="__('Password')" class="text-[#E7EFC7] font-medium" />
                <div class="relative">
                    <x-text-input 
                        id="password" 
                        class="block mt-2 w-full bg-[#3B3B1A] border-2 border-[#626F47] focus:border-[#AEC8A4] focus:ring-2 focus:ring-[#AEC8A4]/50 text-[#E7EFC7] placeholder-[#AEC8A4]/70 rounded-lg px-4 py-3 pr-10" 
                        type="password" 
                        name="password" 
                        required 
                        placeholder="Enter your password"
                    />
                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#AEC8A4] hover:text-[#E7EFC7] transition-colors" onclick="togglePasswordVisibility('password', this)">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-[#FFA3A3]" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input 
                        id="remember_me" 
                        type="checkbox" 
                        name="remember" 
                        class="rounded border-[#626F47] bg-[#3B3B1A] text-[#AEC8A4] focus:ring-[#AEC8A4]/50"
                    >
                    <label for="remember_me" class="ms-2 text-sm text-[#E7EFC7]">{{ __('Remember me') }}</label>
                </div>

                @if (Route::has('password.request'))
                    <a class="text-sm text-[#AEC8A4] hover:text-[#E7EFC7] underline underline-offset-4 transition-colors" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <!-- Login Button -->
            <div class="pt-1">
                <x-primary-button class="w-full justify-center bg-[#8A784E] hover:bg-[#AEC8A4] text-[#E7EFC7] py-3 px-4 rounded-lg font-medium shadow-md transition-colors duration-300 hover:shadow-[0_4px_12px_rgba(174,200,164,0.4)] hover:scale-[1.02]">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>

            <div class="pt-1">
                <a href="{{ url('/auth/redirect/google') }}"
                class="w-full flex items-center justify-center gap-3 py-3 px-4 rounded-lg font-medium shadow-md bg-white hover:bg-[#AEC8A4] text-dark transition-colors duration-300 hover:shadow-[0_4px_12px_rgba(174,200,164,0.4)] hover:scale-[1.02]">
                    <svg class="w-5 h-5" viewBox="0 0 48 48">
                        <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                        <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                        <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                        <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                        <path fill="none" d="M0 0h48v48H0z"/>
                    </svg>
                    <span class="text-sm font-medium">Login dengan Google</span>
                </a>
            </div>

            <!-- Register Link -->
            <div class="text-center pt-4">
                <p class="text-sm text-[#E7EFC7]">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-[#AEC8A4] hover:text-[#E7EFC7] font-medium underline underline-offset-4 transition-colors">
                        Register here
                    </a>
                </p>
            </div>
        </form>
    </div>

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
</body>
</html>