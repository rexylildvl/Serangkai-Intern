<x-app-layout>
    <div class="py-8 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg shadow-sm flex items-start">
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

            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-[#3B3B1A]">Logbook Aktivitas</h1>
                        <p class="mt-1 text-sm text-[#626F47]">Catatan perkembangan aktivitas magang Anda</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('logbooks.export.pdf') }}"
                        class="inline-flex items-center px-4 py-2.5 bg-red-700 hover:bg-red-900 text-white rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            Export PDF
                        </a>
                        <a href="{{ route('logbooks.create') }}"
                        class="inline-flex items-center px-4 py-2.5 bg-[#626F47] hover:bg-[#3B3B1A] text-white rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            Tambah Logbook
                        </a>
                    </div>
                </div>
            </div>

            <!-- Table Container -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-[#AEC8A4]/50">
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
                        <tbody class="bg-white divide-y divide-[#AEC8A4]/30">
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
                                        <form action="{{ route('logbooks.destroy', $logbook->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                type="submit"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus logbook ini?')"
                                                class="p-1.5 text-red-500 hover:text-red-700 rounded-md hover:bg-red-50 transition-colors duration-200"
                                                title="Hapus">
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
                    <div class="px-6 py-4 bg-[#F8FAF0] border-t border-[#AEC8A4]/30 flex items-center justify-between">
                        <div class="text-sm text-[#626F47]">
                            Menampilkan <span class="font-medium">{{ $logbooks->firstItem() }}</span> sampai <span class="font-medium">{{ $logbooks->lastItem() }}</span> dari <span class="font-medium">{{ $logbooks->total() }}</span> logbook
                        </div>
                        <div class="flex space-x-2">
                            {{ $logbooks->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>