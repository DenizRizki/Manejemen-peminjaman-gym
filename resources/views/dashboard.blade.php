<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Barang Gym') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-blue-500 rounded-lg shadow-md p-6 text-white flex flex-col justify-between">
                    <div class="text-sm uppercase font-bold opacity-80 mb-2">Total Barang</div>
                    <div class="text-4xl font-bold">{{ $totalAlat }}</div>
                </div>

                <div class="bg-green-500 rounded-lg shadow-md p-6 text-white flex flex-col justify-between">
                    <div class="text-sm uppercase font-bold opacity-80 mb-2">Kondisi Baik</div>
                    <div class="text-4xl font-bold">{{ $baikAlat }}</div>
                </div>

                <div class="bg-red-500 rounded-lg shadow-md p-6 text-white flex flex-col justify-between">
                    <div class="text-sm uppercase font-bold opacity-80 mb-2">Kondisi Rusak</div>
                    <div class="text-4xl font-bold">{{ $rusakAlat }}</div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Daftar Barang Gym</h3>
                    <a href="{{ route('alats.create') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                        + Tambah Barang
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300 rounded-lg shadow-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                            <tr>
                                <th class="border p-3 text-left">ID</th>
                                <th class="border p-3 text-left">Nama Barang</th>
                                <th class="border p-3 text-center">Status</th>
                                <th class="border p-3 text-center">Jumlah</th>
                                <th class="border p-3 text-center">Gambar</th>
                                <th class="border p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($barang as $b)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="border p-3">{{ $b->id }}</td>
                                    <td class="border p-3 font-medium">{{ $b->nama_barang }}</td>
                                    <td class="border p-3 text-center">
                                        @if($b->status_barang === 'baik')
                                            <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                                Baik
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">
                                                Rusak
                                            </span>
                                        @endif
                                    </td>
                                    <td class="border p-3 text-center">{{ $b->jumlah_barang }}</td>
                                    <td class="border p-3 text-center">
                                        @if($b->gambar_barang)
                                            <img src="{{ asset('storage/'.$b->gambar_barang) }}" 
                                                 class="w-16 h-16 object-cover mx-auto rounded">
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>
                                    <td class="border p-3 text-center space-x-2">
                                        <a href="{{ route('alats.edit', $b->id) }}"
                                           class="inline-block px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                                            Edit
                                        </a>

                                        <form action="{{ route('alats.destroy', $b->id) }}" 
                                              method="POST" 
                                              class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-gray-500">
                                        Belum ada data barang gym.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4">
    {{ $barang->links() }}
</div>
        </div>
    </div>
</x-app-layout>