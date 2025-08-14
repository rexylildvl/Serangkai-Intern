<x-app-layout>
    <section class="relative bg-cover bg-center bg-no-repeat min-h-screen py-10" style="background-image: url('/images/gelap.jpg')">
        <!-- Background Overlays -->
        <div class="absolute inset-0 bg-black bg-opacity-70 backdrop-blur-sm z-0"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900/60 via-slate-800/40 to-slate-900/60"></div>
        <div class="absolute inset-0 bg-[#3B3B1A]/10"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50/90 border border-green-200 rounded-lg shadow-sm flex items-start backdrop-blur-sm">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Professional Header Section -->
            <div class="mb-5">
                <div class="flex flex-col">
                    <div class="flex items-center mb-3">
                        <div class="w-8 h-0.5 bg-[#AEC8A4] mr-3"></div>
                        <span class="text-[#AEC8A4] text-xs font-medium tracking-wider uppercase">Program Magang Mahasiswa Profesional</span>
                    </div>
                    
                    <h1 class="text-2xl md:text-3xl font-bold text-white mb-2 leading-tight">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-[#AEC8A4] to-[#F5F9E8]">
                            Logbook Aktivitas
                        </span>
                    </h1>
                    <p class="text-gray-300 text-base font-light max-w-2xl leading-relaxed">
                        <span>Catatan perkembangan aktivitas magang Anda di PT Tiga Serangkai</span>
                    </p>
                </div>
            
                <!-- Search and Action Buttons -->
                <div class="mt-8 mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <!-- Search Bar -->
                    <form method="GET" action="{{ route('logbooks.index') }}" class="w-full md:w-auto">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input 
                                type="text" 
                                name="search" 
                                value="{{ request('search') }}"
                                placeholder="Cari aktivitas/kendala..." 
                                class="block w-full pl-10 pr-3 py-2 border border-[#AEC8A4]/50 rounded-lg bg-white/20 text-white placeholder-gray-300 focus:outline-none focus:ring-1 focus:ring-[#AEC8A4] focus:border-[#AEC8A4] sm:text-sm"
                            >
                        </div>
                    </form>

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('logbooks.export.pdf') }}"
                        class="inline-flex items-center px-4 py-2.5 bg-red-700/90 hover:bg-red-900 text-white rounded-lg transition-all duration-200 shadow-sm hover:shadow-md backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                            </svg>
                            Export PDF
                        </a>
                        <a href="{{ route('logbooks.export.excel') }}"
                        class="inline-flex items-center px-4 py-2.5 bg-[#217346] hover:bg-[#1a5c38] text-white rounded-lg transition-all duration-200 shadow-sm hover:shadow-md backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Export Excel
                        </a>
                        <a href="{{ route('logbooks.create') }}"
                        class="inline-flex items-center px-4 py-2.5 bg-[#626F47]/90 hover:bg-[#3B3B1A] text-white rounded-lg transition-all duration-200 shadow-sm hover:shadow-md backdrop-blur-sm">
                            Tambah Logbook
                        </a>
                    </div>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-white/90 rounded-xl shadow-sm overflow-hidden border border-[#AEC8A4]/50 backdrop-blur-sm">
                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#AEC8A4]/30">
                        <thead class="bg-[#AEC8A4]">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-[#3B3B1A] uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-[#3B3B1A] uppercase tracking-wider">Aktivitas</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-[#3B3B1A] uppercase tracking-wider">Kendala</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-[#3B3B1A] uppercase tracking-wider">Progress</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-[#3B3B1A] uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-[#3B3B1A] uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white/80 divide-y divide-[#AEC8A4]/30">
                            @forelse($logbooks as $logbook)
                                <tr class="hover:bg-[#F5F9E8] transition duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-[#3B3B1A]">
                                            {{ \Carbon\Carbon::parse($logbook->tanggal)->format('d M Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-[#3B3B1A]">{{ $logbook->aktivitas }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-[#3B3B1A]">{{ $logbook->kendala ?: '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-full bg-[#D0D9B0] rounded-full h-2.5 mr-2">
                                                <div class="bg-[#626F47] h-2.5 rounded-full" style="width: {{ $logbook->progress }}%"></div>
                                            </div>
                                            <span class="text-xs font-medium text-[#3B3B1A]">{{ $logbook->progress }}%</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($logbook->status === 'On Progress')
                                                bg-yellow-100 text-yellow-800
                                            @else
                                                bg-green-100 text-green-800
                                            @endif">
                                            @if($logbook->status === 'On Progress')
                                                <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-yellow-800" fill="currentColor" viewBox="0 0 8 8">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                            @else
                                                <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-green-800" fill="currentColor" viewBox="0 0 8 8">
                                                    <circle cx="4" cy="4" r="3"/>
                                                </svg>
                                            @endif
                                            {{ $logbook->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex justify-end space-x-2">
                                            <a href="{{ route('logbooks.edit', $logbook->id) }}" 
                                               class="p-1.5 text-[#626F47] hover:text-[#3B3B1A] rounded-md hover:bg-[#E7EFC7] transition-colors duration-200"
                                               title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                            <form action="{{ route('logbooks.destroy', $logbook->id) }}" method="POST" class="inline delete-logbook-form">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="button"
                                                    class="p-1.5 text-red-500 hover:text-red-700 rounded-md hover:bg-red-50 transition-colors duration-200"
                                                    title="Hapus"
                                                    onclick="showDeleteLogbookModal(this)"
                                                    data-action="{{ route('logbooks.destroy', $logbook->id) }}"
                                                >
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="mx-auto max-w-md">
                                            <svg class="mx-auto h-12 w-12 text-[#AEC8A4]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                            <h3 class="mt-3 text-lg font-medium text-[#3B3B1A]">Belum ada data logbook</h3>
                                            <p class="mt-1 text-sm text-[#626F47]">Mulai dengan menambahkan logbook pertama Anda</p>
                                            <div class="mt-6">
                                                <a href="{{ route('logbooks.create') }}" class="inline-flex items-center px-4 py-2 bg-[#626F47] hover:bg-[#3B3B1A] text-white rounded-lg transition-all duration-200 shadow-sm">
                                                    Tambah Logbook
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if(method_exists($logbooks, 'links'))
                    <div class="px-6 py-4 bg-[#F8FAF0]/80 border-t border-[#AEC8A4]/30 flex items-center justify-between">
                        <div class="text-sm text-[#626F47]">
                            Menampilkan <span class="font-medium">{{ $logbooks->firstItem() }}</span> sampai <span class="font-medium">{{ $logbooks->lastItem() }}</span> dari <span class="font-medium">{{ $logbooks->total() }}</span> logbook
                        </div>
                        <div class="flex space-x-2">
                            {{ $logbooks->links('pagination::simple-tailwind') }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</x-app-layout>

<!-- Modal Konfirmasi Hapus Logbook -->
<div id="deleteLogbookModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm hidden">
    <div class="bg-white rounded-xl shadow-lg border border-[#AEC8A4] max-w-sm w-full p-6">
        <div class="flex items-center gap-3 mb-4">
            <span class="text-lg font-bold text-[#3B3B1A]">Konfirmasi Hapus</span>
        </div>
        <p class="text-[#626F47] mb-6">Apakah Anda yakin ingin menghapus logbook ini? Tindakan ini tidak dapat dibatalkan.</p>
        <div class="flex justify-end gap-3">
            <button id="cancelDeleteBtn" type="button" class="px-4 py-2 rounded-md bg-[#E7EFC7] text-[#3B3B1A] font-semibold hover:bg-[#AEC8A4] transition">Batal</button>
            <form id="deleteLogbookForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 rounded-md bg-red-600 text-white font-semibold hover:bg-red-800 transition">Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
function showDeleteLogbookModal(button) {
    const modal = document.getElementById('deleteLogbookModal');
    const form = document.getElementById('deleteLogbookForm');
    form.action = button.getAttribute('data-action');
    modal.classList.remove('hidden');
}

document.getElementById('cancelDeleteBtn').onclick = function() {
    document.getElementById('deleteLogbookModal').classList.add('hidden');
};
</script>