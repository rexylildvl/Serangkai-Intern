<x-app-layout>
    <div class="py-10 bg-[#E7EFC7] min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col gap-8">
                <!-- Header -->
                <div class="px-6">
                    <h1 class="text-3xl font-bold text-[#3B3B1A]">Pengaturan Akun</h1>
                    <p class="text-[#626F47] mt-2">Kelola informasi profil dan pengaturan akun Anda</p>
                </div>

                <!-- Main Content -->
                <div class="space-y-6">
                    <!-- Profile Information Section -->
                    <div id="profile" class="space-y-6">
                        <!-- Profile Information -->
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#AEC8A4]">
                            <div class="p-6 border-b border-[#AEC8A4] bg-[#F5F9E9]">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 rounded-full bg-[#E7EFC7] text-[#626F47]">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <h2 class="text-lg font-semibold text-[#3B3B1A]">Informasi Profil</h2>
                                    </div>
                                    <button id="editProfileBtn" class="px-4 py-2 bg-[#626F47] hover:bg-[#3B3B1A] text-white text-sm font-medium rounded-md transition duration-150 ease-in-out">
                                        Edit Profil
                                    </button>
                                </div>
                            </div>
                            <div class="p-6">
                                <div id="profileView" class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-sm font-medium text-[#8A784E]">Nama</p>
                                            <p id="profileName" class="mt-1 text-[#3B3B1A]">{{ old('name', $user->name) }}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-[#8A784E]">Email</p>
                                            <p id="profileEmail" class="mt-1 text-[#3B3B1A]">{{ old('email', $user->email) }}</p>
                                        </div>
                                    </div>
                                </div>  
                                <div id="profileEdit" class="hidden">
                                    @include('profile.partials.update-profile-information-form')
                                </div>
                            </div>
                        </div>

                        <!-- Update Password -->
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#AEC8A4]">
                            <div class="p-6 border-b border-[#AEC8A4] bg-[#F5F9E9]">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        <div class="p-2 rounded-full bg-[#E7EFC7] text-[#626F47]">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <h2 class="text-lg font-semibold text-[#3B3B1A]">Keamanan Akun</h2>
                                    </div>
                                    <button id="editPasswordBtn" class="px-4 py-2 bg-[#626F47] hover:bg-[#3B3B1A] text-white text-sm font-medium rounded-md transition duration-150 ease-in-out">
                                        Ubah Password
                                    </button>
                                </div>
                            </div>
                            <div class="p-6">
                                <div id="passwordView" class="space-y-4">
                                    <p class="text-sm text-[#626F47]">Ubah password akun Anda</p>
                                </div>
                                <div id="passwordEdit" class="hidden">
                                    @include('profile.partials.update-password-form')
                                </div>
                            </div>
                        </div>

                        <!-- Delete Account -->
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-[#E7C7C7]">
                            <div class="p-6 border-b border-[#E7C7C7] bg-[#F9E9E9]">
                                <div class="flex items-center gap-3">
                                    <div class="p-2 rounded-full bg-[#EFC7C7] text-[#8A4E4E]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <h2 class="text-lg font-semibold text-[#3B3B1A]">Hapus Akun</h2>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="space-y-4">
                                    <p class="text-sm text-[#626F47]">Setelah akun Anda dihapus, semua data dan resource akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi yang ingin Anda simpan.</p>
                                    <button id="showDeleteModalBtn" class="px-4 py-2 bg-[#8A4E4E] hover:bg-[#6B3A3A] text-white text-sm font-medium rounded-md transition duration-150 ease-in-out">
                                        Hapus Akun
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Account Modal -->
        <div id="deleteModal" class="hidden fixed inset-0 bg-[#3B3B1A] bg-opacity-50 flex items-center justify-center p-4 z-50">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full border border-[#E7C7C7]">
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-2 rounded-full bg-[#EFC7C7] text-[#8A4E4E]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-[#3B3B1A]">Hapus Akun Anda</h3>
                    </div>
                    <p class="text-sm text-[#626F47] mb-6">Apakah Anda yakin ingin menghapus akun Anda? Tindakan ini tidak dapat dibatalkan.</p>
                    <div class="flex justify-end gap-3">
                        <button id="cancelDeleteBtn" type="button" class="px-4 py-2 border border-[#AEC8A4] rounded-md text-sm font-medium text-[#3B3B1A] hover:bg-[#F5F9E9]">
                            Batal
                        </button>
                        <form id="deleteUserForm" method="post" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="px-4 py-2 bg-[#8A4E4E] hover:bg-[#6B3A3A] text-white text-sm font-medium rounded-md">
                                Hapus Akun
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Profile Edit Toggle
            const editProfileBtn = document.getElementById('editProfileBtn');
            const profileView = document.getElementById('profileView');
            const profileEdit = document.getElementById('profileEdit');
            
            editProfileBtn.addEventListener('click', function() {
                profileView.classList.toggle('hidden');
                profileEdit.classList.toggle('hidden');
                
                if (profileEdit.classList.contains('hidden')) {
                    editProfileBtn.textContent = 'Edit Profil';
                    editProfileBtn.classList.remove('bg-[#8A784E]', 'hover:bg-[#6B5D3A]');
                    editProfileBtn.classList.add('bg-[#626F47]', 'hover:bg-[#3B3B1A]');
                } else {
                    editProfileBtn.textContent = 'Batal';
                    editProfileBtn.classList.remove('bg-[#626F47]', 'hover:bg-[#3B3B1A]');
                    editProfileBtn.classList.add('bg-[#8A784E]', 'hover:bg-[#6B5D3A]');
                }
            });

            // Password Edit Toggle
            const editPasswordBtn = document.getElementById('editPasswordBtn');
            const passwordView = document.getElementById('passwordView');
            const passwordEdit = document.getElementById('passwordEdit');
            
            editPasswordBtn.addEventListener('click', function() {
                passwordView.classList.toggle('hidden');
                passwordEdit.classList.toggle('hidden');
                
                if (passwordEdit.classList.contains('hidden')) {
                    editPasswordBtn.textContent = 'Ubah Password';
                    editPasswordBtn.classList.remove('bg-[#8A784E]', 'hover:bg-[#6B5D3A]');
                    editPasswordBtn.classList.add('bg-[#626F47]', 'hover:bg-[#3B3B1A]');
                } else {
                    editPasswordBtn.textContent = 'Batal';
                    editPasswordBtn.classList.remove('bg-[#626F47]', 'hover:bg-[#3B3B1A]');
                    editPasswordBtn.classList.add('bg-[#8A784E]', 'hover:bg-[#6B5D3A]');
                }
            });

            // Delete Account Modal
            const showDeleteModalBtn = document.getElementById('showDeleteModalBtn');
            const deleteModal = document.getElementById('deleteModal');
            const cancelDeleteBtn = document.getElementById('cancelDeleteBtn');
            
            showDeleteModalBtn.addEventListener('click', function() {
                deleteModal.classList.remove('hidden');
            });
            
            cancelDeleteBtn.addEventListener('click', function() {
                deleteModal.classList.add('hidden');
            });
            
            // Close modal when clicking outside
            window.addEventListener('click', function(event) {
                if (event.target === deleteModal) {
                    deleteModal.classList.add('hidden');
                }
            });
        });
    </script>
</x-app-layout>