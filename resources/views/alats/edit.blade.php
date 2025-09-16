<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Alat Gym</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow sm:rounded-lg">
                <form action="{{ route('alats.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block">Nama Alat</label>
                        <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block">Status</label>
                        <select name="status_barang" class="w-full border rounded p-2" required>
                            <option value="baik" {{ $barang->status_barang == 'baik' ? 'selected' : '' }}>Baik</option>
                            <option value="rusak" {{ $barang->status_barang == 'rusak' ? 'selected' : '' }}>Rusak</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block">Jumlah</label>
                        <input type="number" name="jumlah_barang" value="{{ old('jumlah_barang', $barang->jumlah_barang) }}" min="1" class="w-full border rounded p-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block">Gambar (opsional)</label>
                        <input type="file" name="gambar_barang" class="w-full">
                        @if($barang->gambar_barang)
                            <img src="{{ asset('storage/' . $barang->gambar_barang) }}" alt="gambar" class="mt-2 w-32 h-32 object-cover">
                        @endif
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Batal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
