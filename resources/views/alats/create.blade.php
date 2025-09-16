<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Alat Gym
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <!-- Notif-->
                @if ($errors->any())
                    <div class="mb-4 text-red-600">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form -->
                <form action="{{ route('alats.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    
                    <!-- Nama Barang -->
                    <div>
                        <label for="nama_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Alat</label>
                        <input type="text" name="nama_barang" id="nama_barang" 
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" 
                               required>
                    </div>

                    <!-- Status Barang -->
                    <div>
                        <label for="status_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status Alat</label>
                        <select name="status_barang" id="status_barang" 
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" 
                                required>
                            <option value="">-- Pilih Status --</option>
                            <option value="baik">Baik</option>
                            <option value="rusak">Rusak</option>
                        </select>
                    </div>

                    <!-- Jumlah Barang -->
                    <div>
                        <label for="jumlah_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jumlah Alat</label>
                        <input type="number" name="jumlah_barang" id="jumlah_barang" min="1" 
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" 
                               required>
                    </div>

                    <!-- Gambar Barang -->
                    <div>
                        <label for="gambar_barang" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gambar Alat</label>
                        <input type="file" name="gambar_barang" id="gambar_barang" 
                               class="mt-1 block w-full text-sm text-gray-700 dark:text-gray-300">
                    </div>

                    <!-- Button -->
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('alats.index') }}" 
                           class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Batal</a>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
