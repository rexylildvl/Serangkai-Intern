<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification - Serangkai Intern</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-cover bg-center flex items-center justify-center p-4 sm:p-6" style="background-image: url('{{ asset('images/ts.jpg') }}'); background-blend-mode: overlay; background-color: rgba(0,0,0,0.3);">

    <div class="bg-[#3B3B1A]/90 backdrop-blur-sm rounded-2xl shadow-2xl w-full max-w-md p-6 sm:p-8 mx-auto border border-[#626F47]">
        <!-- Logo -->
        <div class="flex justify-center mb-4 sm:mb-6">
            <img src="{{ asset('images/logo-ts.png') }}" alt="Logo TS" class="h-10 sm:h-14 transition-transform duration-300 hover:scale-105">
        </div>

        <!-- Header -->
        <div class="text-center mb-4 sm:mb-6">
            <h2 class="text-xl sm:text-2xl font-bold text-[#E7EFC7] font-serif">{{ __('Verify Your Email') }}</h2>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 sm:h-16 w-12 sm:w-16 mx-auto text-[#AEC8A4] mt-2 sm:mt-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </div>

        <!-- Message -->
        <div class="mb-4 sm:mb-6 text-center text-[#E7EFC7] text-xs sm:text-sm">
            {{ __('Thanks for signing up! Before getting started, please verify your email address by clicking the link we emailed to you.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 sm:mb-6 p-2 sm:p-3 bg-[#AEC8A4]/20 text-[#E7EFC7] text-xs sm:text-sm rounded-lg text-center border border-[#AEC8A4]">
                {{ __('A new verification link has been sent to your email address.') }}
            </div>
        @endif

        <!-- Actions -->
        <div class="flex flex-col gap-3 sm:gap-4 mt-4 sm:mt-6">
            <form method="POST" action="{{ route('verification.send') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full py-2 sm:py-3 bg-[#8A784E] hover:bg-[#AEC8A4] text-[#E7EFC7] text-sm sm:text-base font-medium rounded-lg shadow-sm transition-colors duration-300 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 sm:h-5 w-4 sm:w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="w-full">
                @csrf
                <button type="submit" class="w-full py-2 text-center text-xs sm:text-sm text-[#E7EFC7] hover:text-[#AEC8A4] font-medium transition-colors duration-200">
                    {{ __('Sign Out') }}
                </button>
            </form>
        </div>

        <!-- Additional Help -->
        <div class="mt-4 sm:mt-6 pt-3 sm:pt-4 border-t border-[#626F47]/50 text-center text-xs text-[#AEC8A4]">
            {{ __("Didn't receive the email? Check your spam folder or contact support.") }}
        </div>
    </div>
</body>
</html>