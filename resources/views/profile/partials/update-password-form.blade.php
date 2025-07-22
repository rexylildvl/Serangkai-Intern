<section class="max-w-md mx-auto p-6 bg-white rounded-xl shadow-sm border border-[#E7EFC7]">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-[#3B3B1A] flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#626F47]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
            </svg>
            {{ __('Update Password') }}
        </h2>
        <p class="mt-2 text-[#626F47]">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-5" x-data="{ showModal: false }" @submit.prevent="showModal = true">
        @csrf
        @method('put')

        <div class="space-y-2">
            <label for="update_password_current_password" class="block text-sm font-medium text-[#3B3B1A] flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                {{ __('Current Password') }}
            </label>
            <div class="relative">
                <input id="update_password_current_password" name="current_password" type="password" 
                       class="w-full px-4 py-2 border border-[#AEC8A4] rounded-lg focus:ring-2 focus:ring-[#626F47] focus:border-[#626F47] transition duration-200 pl-10"
                       autocomplete="current-password" required>
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8A784E]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
            </div>
            @error('current_password', 'updatePassword')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-2">
            <label for="update_password_password" class="block text-sm font-medium text-[#3B3B1A] flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                </svg>
                {{ __('New Password') }}
            </label>
            <div class="relative">
                <input id="update_password_password" name="password" type="password" 
                       class="w-full px-4 py-2 border border-[#AEC8A4] rounded-lg focus:ring-2 focus:ring-[#626F47] focus:border-[#626F47] transition duration-200 pl-10"
                       autocomplete="new-password" required>
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8A784E]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                </div>
            </div>
            @error('password', 'updatePassword')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-2">
            <label for="update_password_password_confirmation" class="block text-sm font-medium text-[#3B3B1A] flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ __('Confirm Password') }}
            </label>
            <div class="relative">
                <input id="update_password_password_confirmation" name="password_confirmation" type="password" 
                       class="w-full px-4 py-2 border border-[#AEC8A4] rounded-lg focus:ring-2 focus:ring-[#626F47] focus:border-[#626F47] transition duration-200 pl-10"
                       autocomplete="new-password" required>
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#8A784E]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
            @error('password_confirmation', 'updatePassword')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-3 px-6 bg-[#626F47] hover:bg-[#3B3B1A] text-white font-medium rounded-lg transition-colors duration-200 shadow-md flex items-center justify-center gap-2">
                {{ __('Update Password') }}
            </button>
        </div>

        <!-- Confirmation Modal -->
        <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4" x-cloak>
            <div class="bg-white rounded-xl shadow-xl max-w-md w-full p-6" @click.away="showModal = false">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-[#626F47]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <h3 class="text-xl font-bold text-[#3B3B1A] mt-4">{{ __('Confirm Password Change') }}</h3>
                    <p class="text-[#626F47] mt-2">{{ __('Are you sure you want to update your password?') }}</p>
                    
                    <div class="mt-6 flex justify-center gap-3">
                        <button @click="showModal = false" type="button" class="px-6 py-2 border border-[#AEC8A4] text-[#3B3B1A] rounded-lg hover:bg-gray-50 transition-colors">
                            {{ __('Cancel') }}
                        </button>
                        <button type="submit" class="px-6 py-2 bg-[#626F47] text-white rounded-lg hover:bg-[#3B3B1A] transition-colors">
                            {{ __('Confirm') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Success Notification -->
    @if (session('status') === 'password-updated')
        <div x-data="{ show: true }" 
             x-show="show" 
             x-transition 
             x-init="setTimeout(() => show = false, 3000)"
             class="fixed bottom-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg flex items-start gap-3 max-w-xs"
             x-cloak>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <div>
                <p class="font-bold">{{ __('Success!') }}</p>
                <p class="text-sm">{{ __('Your password has been updated.') }}</p>
            </div>
            <button @click="show = false" class="ml-auto text-green-700 hover:text-green-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    @endif
</section>