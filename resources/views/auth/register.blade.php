<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - MagangTS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('images/ts.jpg') }}'); background-blend-mode: overlay; background-color: rgba(0,0,0,0.3);">

    <div class="bg-[#3B3B1A]/90 backdrop-blur-sm rounded-2xl shadow-2xl w-full max-w-4xl p-8 mx-4">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Left Column (Logo and Welcome) -->
            <div class="md:w-1/3 flex flex-col items-center justify-center">
                <img src="{{ asset('images/logo-ts.png') }}" alt="Logo TS" class="h-20 mb-4 transition-transform duration-300 hover:scale-105">
                <h2 class="text-2xl font-bold text-[#E7EFC7] text-center mb-2">Create Your Account</h2>
                <p class="text-[#AEC8A4] text-center text-sm">Join our community to get started</p>
                
                <!-- Google Button on mobile -->
                <div class="pt-4 w-full md:hidden">
                    <a href="{{ url('/auth/redirect/google') }}"
                    class="w-full flex items-center justify-center gap-2 py-2 px-4 rounded-lg font-medium shadow-md bg-white hover:bg-[#AEC8A4] text-dark transition-colors duration-300">
                        <svg class="w-4 h-4" viewBox="0 0 48 48">
                            <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                            <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                            <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                            <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                        </svg>
                        <span class="text-sm">Daftar dengan Google</span>
                    </a>
                </div>
            </div>

            <!-- Right Column (Form) -->
            <div class="md:w-2/3">
                <form method="POST" action="{{ route('register') }}" autocomplete="off" class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    @csrf

                    <!-- Left Column Inputs -->
                    <div class="space-y-3">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-[#E7EFC7] font-medium mb-1">Full Name</label>
                            <input 
                                id="name" 
                                type="text" 
                                name="name" 
                                required 
                                value="{{ old('name') }}"
                                class="w-full px-3 py-2 bg-[#3B3B1A] border border-[#626F47] rounded-md text-[#E7EFC7] placeholder-[#AEC8A4]/70 focus:border-[#AEC8A4] focus:ring-1 focus:ring-[#AEC8A4]/50"
                                placeholder="Enter your full name"
                            >
                            @error('name')
                                <p class="text-xs text-[#FFA3A3] mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-[#E7EFC7] font-medium mb-1">Email</label>
                            <input 
                                id="email" 
                                type="email" 
                                name="email" 
                                required
                                value="{{ old('email') }}"
                                class="w-full px-3 py-2 bg-[#3B3B1A] border border-[#626F47] rounded-md text-[#E7EFC7] placeholder-[#AEC8A4]/70 focus:border-[#AEC8A4] focus:ring-1 focus:ring-[#AEC8A4]/50"
                                placeholder="Enter your email"
                            >
                            @error('email')
                                <p class="text-xs text-[#FFA3A3] mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column Inputs -->
                    <div class="space-y-3">
                        <!-- Password -->
                        <div class="relative">
                            <label for="password" class="block text-[#E7EFC7] font-medium mb-1">Password</label>
                            <div class="relative">
                                <input 
                                    id="password" 
                                    type="password" 
                                    name="password" 
                                    required
                                    class="w-full px-3 py-2 bg-[#3B3B1A] border border-[#626F47] rounded-md text-[#E7EFC7] placeholder-[#AEC8A4]/70 focus:border-[#AEC8A4] focus:ring-1 focus:ring-[#AEC8A4]/50 pr-10"
                                    placeholder="Create password"
                                >
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#AEC8A4] hover:text-[#E7EFC7] transition-colors" onclick="togglePasswordVisibility('password', this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-xs text-[#FFA3A3] mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="relative">
                            <label for="password_confirmation" class="block text-[#E7EFC7] font-medium mb-1">Confirm Password</label>
                            <div class="relative">
                                <input 
                                    id="password_confirmation" 
                                    type="password" 
                                    name="password_confirmation" 
                                    required
                                    class="w-full px-3 py-2 bg-[#3B3B1A] border border-[#626F47] rounded-md text-[#E7EFC7] placeholder-[#AEC8A4]/70 focus:border-[#AEC8A4] focus:ring-1 focus:ring-[#AEC8A4]/50 pr-10"
                                    placeholder="Confirm password"
                                >
                                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#AEC8A4] hover:text-[#E7EFC7] transition-colors" onclick="togglePasswordVisibility('password_confirmation', this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Full Width Elements -->
                    <div class="md:col-span-2">
                        <!-- Register Button -->
                        <div class="pt-2">
                            <button type="submit" class="w-full py-2 bg-[#8A784E] hover:bg-[#AEC8A4] text-[#E7EFC7] font-medium rounded-md shadow-sm transition-colors duration-300">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="flex items-center my-4">
                            <div class="flex-1 h-px bg-[#626F47]"></div>
                            <span class="px-3 text-[#E7EFC7] text-sm font-medium">OR</span>
                            <div class="flex-1 h-px bg-[#626F47]"></div>
                        </div>

                        <!-- Google Register Button (Desktop) -->
                        <div class="pt-1 hidden md:block">
                            <a href="{{ url('/auth/redirect/google') }}"
                            class="w-full flex items-center justify-center gap-2 py-2 px-4 rounded-lg font-medium shadow-md bg-white hover:bg-[#AEC8A4] text-dark transition-colors duration-300">
                                <svg class="w-4 h-4" viewBox="0 0 48 48">
                                    <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>
                                    <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"/>
                                    <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"/>
                                    <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>
                                </svg>
                                <span class="text-sm">Daftar dengan Google</span>
                            </a>
                        </div>

                        <!-- Login Link -->
                        <div class="text-center pt-3">
                            <p class="text-xs text-[#E7EFC7]">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-[#AEC8A4] hover:text-[#E7EFC7] font-medium underline underline-offset-2">
                                    {{ __('Login here') }}
                                </a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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