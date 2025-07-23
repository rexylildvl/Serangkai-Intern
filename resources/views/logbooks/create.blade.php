<x-app-layout>
    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <h1 class="text-2xl font-semibold text-[#3B3B1A]">Tambah Logbook</h1>
                <p class="text-sm text-[#626F47] mt-1">Isi formulir berikut untuk menambahkan aktivitas harian</p>
            </div>

            <!-- Form Container -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-[#626F47]/50">
                <!-- Form Header -->
                <div class="bg-[#626F47] px-6 py-4 border-b border-[#626F47]/30">
                    <h2 class="text-lg font-medium text-white">Formulir Logbook</h2>
                </div>
                <!-- Form Content -->
                <form action="{{ route('logbooks.store') }}" method="POST" class="p-6">
                    @csrf

                    <!-- Grid Layout -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tanggal Input -->
                        <div class="space-y-1">
                            <label for="tanggal" class="block text-sm font-medium text-[#3B3B1A]">
                                Tanggal <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="tanggal" id="tanggal" 
                                   class="w-full border-[#AEC8A4]/50 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 focus:border-[#AEC8A4] transition"
                                   value="{{ old('tanggal') }}" required>
                            @error('tanggal')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Progress Input -->
                        <div class="space-y-1">
                            <label for="progress" class="block text-sm font-medium text-[#3B3B1A]">
                                Progress (%) <span class="text-red-500">*</span>
                            </label>
                            <input type="number" name="progress" id="progress" 
                                   class="w-full border-[#AEC8A4]/50 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 focus:border-[#AEC8A4] transition"
                                   value="{{ old('progress', 0) }}" min="0" max="100" required>
                            @error('progress')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Status Select -->
                        <div class="space-y-1">
                            <label for="status" class="block text-sm font-medium text-[#3B3B1A]">
                                Status <span class="text-red-500">*</span>
                            </label>
                            <select name="status" id="status" 
                                    class="w-full border-[#AEC8A4]/50 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 focus:border-[#AEC8A4] transition" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="On Progress" {{ old('status') == 'On Progress' ? 'selected' : '' }}>On Progress</option>
                                <option value="Done" {{ old('status') == 'Done' ? 'selected' : '' }}>Done</option>
                            </select>
                            @error('status')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Full Width Fields -->
                        <div class="md:col-span-2 space-y-1">
                            <label for="aktivitas" class="block text-sm font-medium text-[#3B3B1A]">
                                Aktivitas <span class="text-red-500">*</span>
                            </label>
                            <textarea name="aktivitas" id="aktivitas" rows="3" 
                                      class="w-full border-[#AEC8A4]/50 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 focus:border-[#AEC8A4] transition" required>{{ old('aktivitas') }}</textarea>
                            @error('aktivitas')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2 space-y-1">
                            <label for="kendala" class="block text-sm font-medium text-[#3B3B1A]">
                                Kendala <span class="text-xs text-[#8A784E]">(Opsional)</span>
                            </label>
                            <textarea name="kendala" id="kendala" rows="2" 
                                      class="w-full border-[#AEC8A4]/50 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 focus:border-[#AEC8A4] transition">{{ old('kendala') }}</textarea>
                        </div>
                    </div>

                    <!-- Form Footer -->
                    <div class="mt-8 pt-6 border-t border-[#AEC8A4]/30 flex justify-between">
                        <a href="{{ route('logbooks.index') }}" 
                           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                            Kembali
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-[#626F47] hover:bg-[#D0D9B0] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#AEC8A4] transition-colors">
                            Simpan Logbook
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>