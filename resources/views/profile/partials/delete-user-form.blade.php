<section class="space-y-6">
    <header class="bg-[#F5F9E8] p-4 rounded-lg border border-[#AEC8A4]">
        <h2 class="text-lg font-medium text-[#3B3B1A]">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-sm text-[#626F47]">
            {{ __('Setelah akun Anda dihapus, semua data dan sumber daya akan dihapus secara permanen. Sebelum menghapus akun, harap unduh semua data atau informasi yang ingin Anda simpan.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm"
    >
        {{ __('Hapus Akun') }}
    </button>

    <div x-data="{ show: false }" 
         x-show="show"
         x-on:open-modal.window="show = true"
         x-on:close.window="show = false"
         x-transition
         class="fixed inset-0 z-50 overflow-y-auto"
         style="display: none;">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-on:click="show = false" class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-lg font-medium text-[#3B3B1A]">
                        {{ __('Apakah Anda yakin ingin menghapus akun?') }}
                    </h2>

                    <p class="mt-2 text-sm text-[#626F47]">
                        {{ __('Setelah akun Anda dihapus, semua data akan dihapus secara permanen. Masukkan password Anda untuk mengonfirmasi penghapusan akun.') }}
                    </p>

                    <div class="mt-4">
                        <label for="password" class="block text-sm font-medium text-[#3B3B1A] sr-only">
                            {{ __('Password') }}
                        </label>
                        
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="w-full px-4 py-2 border border-[#AEC8A4] rounded-lg focus:ring-2 focus:ring-[#626F47] focus:border-[#626F47] transition duration-200"
                            placeholder="{{ __('Password') }}"
                            required
                        />

                        @if ($errors->userDeletion->get('password'))
                            <p class="mt-2 text-sm text-red-600">
                                {{ $errors->userDeletion->first('password') }}
                            </p>
                        @endif
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button 
                            type="button"
                            x-on:click="show = false"
                            class="px-4 py-2 border border-[#AEC8A4] text-[#3B3B1A] font-medium rounded-lg hover:bg-[#E7EFC7] transition-colors duration-200"
                        >
                            {{ __('Batal') }}
                        </button>

                        <button 
                            type="submit"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm"
                        >
                            {{ __('Hapus Akun') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>