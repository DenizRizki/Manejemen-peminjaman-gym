<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 antialiased">

    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-900">Form Peminjaman</h1>
            <div>
                <a href="{{ url('/') }}" class="text-blue-600 hover:text-blue-800 transition">Beranda</a>
            </div>
        </div>
    </header>

    <main class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <h3 class="text-lg font-semibold mb-4">Detail Barang yang Dipinjam</h3>
                    <div class="border rounded-lg p-4 mb-6 bg-gray-50">
                        @if ($alat->gambar_barang)
                            <img src="{{ asset('storage/' . $alat->gambar_barang) }}" alt="{{ $alat->nama_barang }}" 
                                 class="w-full h-48 object-cover rounded mb-4">
                        @endif
                        <p class="text-xl font-bold mb-1">{{ $alat->nama_barang }}</p>
                        <p class="text-sm text-gray-600">
                            Stok Tersedia: <span class="font-semibold">{{ $alat->jumlah_barang }}</span>
                        </p>
                    </div>

                    <h3 class="text-lg font-semibold mb-4">Data Peminjaman</h3>
                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="alat_id" value="{{ $alat->id }}">

                        <div class="mb-4">
                            <label for="nama_peminjam" class="block text-sm font-medium text-gray-700">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" id="nama_peminjam" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('nama_peminjam')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="jumlah_barang" class="block text-sm font-medium text-gray-700">Jumlah Barang</label>
                            <input type="number" name="jumlah_barang" id="jumlah_barang" 
                                   min="1" max="{{ $alat->jumlah_barang }}" value="1" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('jumlah_barang')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tanggal_pinjam" class="block text-sm font-medium text-gray-700">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('tanggal_pinjam')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="tanggal_kembali" class="block text-sm font-medium text-gray-700">Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" id="tanggal_kembali" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('tanggal_kembali')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg shadow hover:bg-blue-700 transition">
                                Pinjam Barang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>
</html>