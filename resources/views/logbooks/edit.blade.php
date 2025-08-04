<x-app-layout>
    <section class="relative bg-cover bg-center bg-no-repeat min-h-screen py-10" style="background-image: url('/images/gelap.jpg')">
        <!-- Background Overlays -->
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/60 via-slate-800/40 to-slate-900/60"></div>
        <div class="absolute inset-0 bg-[#3B3B1A]/10"></div>
        
        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col">
                    <div class="flex items-center mb-3">
                        <div class="w-8 h-0.5 bg-[#AEC8A4] mr-3"></div>
                        <span class="text-[#AEC8A4] text-xs font-medium tracking-wider uppercase">Logbook</span>
                    </div>
                    
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-2 leading-tight">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#AEC8A4] to-[#F5F9E8]">
                            Edit Logbook
                        </span>
                    </h1>
                    <p class="text-gray-300 text-base font-light max-w-2xl leading-relaxed">
                        <span class="inline-block bg-[#3B3B1A]/30 px-3 py-1.5 rounded-lg backdrop-blur-sm">
                            Perbarui data logbook aktivitas harian
                        </span>
                    </p>
                </div>
            </div>

            <!-- Form Container -->
            <div class="bg-white/90 rounded-xl shadow-sm overflow-hidden border border-[#AEC8A4]/50 backdrop-blur-sm">
                <!-- Form Header -->
                <div class="bg-[#626F47] px-6 py-4 border-b border-[#626F47]/30">
                    <h2 class="text-lg font-medium text-white">Formulir Edit Logbook</h2>
                </div>
                
                <!-- Form Content -->
                <form action="{{ route('logbooks.update', $logbook->id) }}" method="POST" class="p-6">
                    @csrf
                    @method('PUT')

                    <!-- Grid Layout -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Tanggal Input -->
                        <div class="space-y-1">
                            <label for="tanggal" class="block text-sm font-medium text-[#3B3B1A]">
                                Tanggal <span class="text-red-500">*</span>
                            </label>
                            <input type="date" name="tanggal" id="tanggal" 
                                   class="w-full border-[#AEC8A4]/50 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 focus:border-[#AEC8A4] transition bg-white/80"
                                   value="{{ old('tanggal', $logbook->tanggal) }}" required>
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
                                   class="w-full border-[#AEC8A4]/50 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 focus:border-[#AEC8A4] transition bg-white/80"
                                   value="{{ old('progress', $logbook->progress) }}" min="0" max="100" required>
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
                                    class="w-full border-[#AEC8A4]/50 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 focus:border-[#AEC8A4] transition bg-white/80" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="On Progress" {{ old('status', $logbook->status) == 'On Progress' ? 'selected' : '' }}>On Progress</option>
                                <option value="Done" {{ old('status', $logbook->status) == 'Done' ? 'selected' : '' }}>Done</option>
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
                                      class="w-full border-[#AEC8A4]/50 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 focus:border-[#AEC8A4] transition bg-white/80" required>{{ old('aktivitas', $logbook->aktivitas) }}</textarea>
                            @error('aktivitas')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2 space-y-1">
                            <label for="kendala" class="block text-sm font-medium text-[#3B3B1A]">
                                Kendala <span class="text-xs text-[#8A784E]">(Opsional)</span>
                            </label>
                            <textarea name="kendala" id="kendala" rows="2" 
                                      class="w-full border-[#AEC8A4]/50 rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 focus:border-[#AEC8A4] transition bg-white/80">{{ old('kendala', $logbook->kendala) }}</textarea>
                        </div>
                    </div>

                    <!-- Form Footer -->
                    <div class="mt-8 pt-6 border-t border-[#AEC8A4]/30 flex justify-between">
                        <a href="{{ route('logbooks.index') }}" 
                           class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                            Kembali
                        </a>
                        
                        <div class="flex space-x-3">
                            <!-- Update Button -->
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-[#626F47] hover:bg-[#3B3B1A] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#AEC8A4] transition-colors">
                                Simpan Perubahan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>