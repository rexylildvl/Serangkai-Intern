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
                        <span class="text-[#AEC8A4] text-xs font-medium tracking-wider uppercase">Program Magang Mahasiswa Profesional</span>
                    </div>
                    
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-2 leading-tight">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#AEC8A4] to-[#F5F9E8]">
                            Edit Logbook
                        </span>
                    </h1>
                    <p class="text-gray-300 text-base font-light max-w-2xl leading-relaxed">
                        <span class="inline-block bg-[#3B3B1A]/20 px-3 py-1.5 rounded-lg backdrop-blur-sm">
                            Perbarui data logbook aktivitas harian
                        </span>
                    </p>
                </div>
            </div>

            <!-- Form Container - Updated to match create form colors -->
            <div class="bg-white/90 rounded-xl shadow-sm overflow-hidden backdrop-blur-sm">
                <!-- Form Header with updated green -->
                <div class="bg-[#626F47] px-6 py-4">
                    <h2 class="text-lg font-bold text-white">Formulir Edit Logbook</h2>
                    <p class="text-sm text-gray-300 mt-1">Perbarui data logbook harian Anda</p>
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
                                   class="w-full rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 bg-white text-[#3B3B1A] placeholder-[#626F47]/70 border border-[#AEC8A4]/50 focus:border-[#626F47] transition"
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
                                   class="w-full rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 bg-white text-[#3B3B1A] placeholder-[#626F47]/70 border border-[#AEC8A4]/50 focus:border-[#626F47] transition"
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
                                    class="w-full rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 bg-white text-[#3B3B1A] border border-[#AEC8A4]/50 focus:border-[#626F47] transition" required>
                                <option value="" class="text-[#626F47]/70">-- Pilih Status --</option>
                                <option value="On Progress" {{ old('status', $logbook->status) == 'On Progress' ? 'selected' : '' }} class="text-[#3B3B1A]">On Progress</option>
                                <option value="Done" {{ old('status', $logbook->status) == 'Done' ? 'selected' : '' }} class="text-[#3B3B1A]">Done</option>
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
                                      class="w-full rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 bg-white text-[#3B3B1A] placeholder-[#626F47]/70 border border-[#AEC8A4]/50 focus:border-[#626F47] transition" required>{{ old('aktivitas', $logbook->aktivitas) }}</textarea>
                            @error('aktivitas')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2 space-y-1">
                            <label for="kendala" class="block text-sm font-medium text-[#3B3B1A]">
                                Kendala <span class="text-xs text-[#626F47]/70">(Opsional)</span>
                            </label>
                            <textarea name="kendala" id="kendala" rows="2" 
                                      class="w-full rounded-lg px-4 py-2.5 text-sm focus:ring-2 focus:ring-[#AEC8A4]/50 bg-white text-[#3B3B1A] placeholder-[#626F47]/70 border border-[#AEC8A4]/50 focus:border-[#626F47] transition">{{ old('kendala', $logbook->kendala) }}</textarea>
                        </div>
                    </div>

                    <!-- Form Footer -->
                    <div class="mt-8 pt-6 border-t border-[#AEC8A4]/30 flex justify-between">
                        <a href="{{ route('logbooks.index') }}" 
                           class="inline-flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-[#3B3B1A] bg-white hover:bg-gray-100 border border-[#AEC8A4]/50 transition-colors">
                            Kembali
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-[#626F47] hover:bg-[#3B3B1A] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#AEC8A4] transition-colors">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-app-layout>