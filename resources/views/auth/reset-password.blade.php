<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Serangkai Intern</title>
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
        <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-[#E7EFC7] font-medium" />
                <x-text-input 
                    id="email" 
                    class="block mt-2 w-full bg-[#3B3B1A] border-2 border-[#626F47] focus:border-[#AEC8A4] focus:ring-2 focus:ring-[#AEC8A4]/50 text-[#E7EFC7] placeholder-[#AEC8A4]/70 rounded-lg px-4 py-3" 
                    type="email" 
                    name="email" 
                    :value="old('email', $request->email)" 
                    required 
                    autofocus 
                    placeholder="Enter your email"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-[#FFA3A3]" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-[#E7EFC7] font-medium" />
                <x-text-input 
                    id="password" 
                    class="block mt-2 w-full bg-[#3B3B1A] border-2 border-[#626F47] focus:border-[#AEC8A4] focus:ring-2 focus:ring-[#AEC8A4]/50 text-[#E7EFC7] placeholder-[#AEC8A4]/70 rounded-lg px-4 py-3" 
                    type="password" 
                    name="password" 
                    required 
                    placeholder="Enter new password"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-[#FFA3A3]" />
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-[#E7EFC7] font-medium" />
                <x-text-input 
                    id="password_confirmation" 
                    class="block mt-2 w-full bg-[#3B3B1A] border-2 border-[#626F47] focus:border-[#AEC8A4] focus:ring-2 focus:ring-[#AEC8A4]/50 text-[#E7EFC7] placeholder-[#AEC8A4]/70 rounded-lg px-4 py-3" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    placeholder="Confirm new password"
                />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-[#FFA3A3]" />
            </div>

            <!-- Reset Password Button -->
            <div class="pt-1">
                <x-primary-button class="w-full justify-center bg-[#8A784E] hover:bg-[#AEC8A4] text-[#E7EFC7] py-3 px-4 rounded-lg font-medium shadow-md transition-colors duration-300 hover:shadow-[0_4px_12px_rgba(174,200,164,0.4)] hover:scale-[1.02]">
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>

            <!-- Back to Login Link -->
            <div class="text-center pt-4">
                <p class="text-sm text-[#E7EFC7]">
                    Remember your password?
                    <a href="{{ route('login') }}" class="text-[#AEC8A4] hover:text-[#E7EFC7] font-medium underline underline-offset-4 transition-colors">
                        Login here
                    </a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>