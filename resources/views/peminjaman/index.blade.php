<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Peminjaman Barang') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300 rounded-lg shadow-sm">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                            <tr>
                                <th class="border p-3 text-left">ID</th>
                                <th class="border p-3 text-left">Nama Peminjam</th>
                                <th class="border p-3 text-left">Nama Barang</th>
                                <th class="border p-3 text-center">Jumlah</th>
                                <th class="border p-3 text-center">Tanggal Pinjam</th>
                                <th class="border p-3 text-center">Tanggal Kembali</th>
                                <th class="border p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($peminjaman as $p)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="border p-3">{{ $p->id }}</td>
                                    <td class="border p-3">{{ $p->nama_peminjam }}</td>
                                    <td class="border p-3">{{ $p->nama_barang }}</td>
                                    <td class="border p-3 text-center">{{ $p->jumlah_barang }}</td>
                                    <td class="border p-3 text-center">{{ $p->tanggal_pinjam }}</td>
                                    <td class="border p-3 text-center">{{ $p->tanggal_kembali }}</td>
                                    <td class="border p-3 text-center space-x-2">
                                        <form action="{{ route('peminjaman.update', $p->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status_peminjaman" value="accepted">
                                            <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                                                Accept
                                            </button>
                                        </form>

                                        <form action="{{ route('peminjaman.destroy', $p->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700 transition">
                                                Decline
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-4 text-center text-gray-500">
                                        Belum ada data peminjaman.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
    {{ $peminjaman->links() }}
</div>
            </div>
        </div>
    </div>
</x-app-layout>