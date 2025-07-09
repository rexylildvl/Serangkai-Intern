<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Serangkai Intern</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('images/ts.jpg') }}'); background-blend-mode: overlay; background-color: rgba(0,0,0,0.3);">

    <div class="bg-[#3B3B1A]/90 backdrop-blur-sm rounded-2xl shadow-2xl w-full max-w-md p-6 mx-4 max-h-screen overflow-y-auto">
        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/logo-ts.png') }}" alt="Logo TS" class="h-14 transition-transform duration-300 hover:scale-105">
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-3 text-sm">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-[#E7EFC7] font-medium mb-1">Full Name</label>
                <input 
                    id="name" 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}"
                    required 
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
                    value="{{ old('email') }}"
                    required
                    class="w-full px-3 py-2 bg-[#3B3B1A] border border-[#626F47] rounded-md text-[#E7EFC7] placeholder-[#AEC8A4]/70 focus:border-[#AEC8A4] focus:ring-1 focus:ring-[#AEC8A4]/50"
                    placeholder="Enter your email"
                >
                @error('email')
                    <p class="text-xs text-[#FFA3A3] mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-[#E7EFC7] font-medium mb-1">Password</label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required
                    class="w-full px-3 py-2 bg-[#3B3B1A] border border-[#626F47] rounded-md text-[#E7EFC7] placeholder-[#AEC8A4]/70 focus:border-[#AEC8A4] focus:ring-1 focus:ring-[#AEC8A4]/50"
                    placeholder="Create password"
                >
                @error('password')
                    <p class="text-xs text-[#FFA3A3] mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-[#E7EFC7] font-medium mb-1">Confirm Password</label>
                <input 
                    id="password_confirmation" 
                    type="password" 
                    name="password_confirmation" 
                    required
                    class="w-full px-3 py-2 bg-[#3B3B1A] border border-[#626F47] rounded-md text-[#E7EFC7] placeholder-[#AEC8A4]/70 focus:border-[#AEC8A4] focus:ring-1 focus:ring-[#AEC8A4]/50"
                    placeholder="Confirm password"
                >
            </div>

            <!-- Register Button -->
            <div class="pt-1">
                <button type="submit" class="w-full py-2 bg-[#8A784E] hover:bg-[#AEC8A4] text-[#E7EFC7] font-medium rounded-md shadow-sm transition-colors duration-300">
                    {{ __('Register') }}
                </button>
            </div>

            <!-- Login Link -->
            <div class="text-center pt-2">
                <p class="text-xs text-[#E7EFC7]">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-[#AEC8A4] hover:text-[#E7EFC7] font-medium underline underline-offset-2">
                        {{ __('Login here') }}
                    </a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>
