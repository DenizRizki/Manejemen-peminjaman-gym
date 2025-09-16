<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Gym</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white border-b border-gray-300 w-full fixed top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-center items-center text-gray-800 uppercase font-semibold">
            <div class="space-x-8">
                <a href="#home" class="group relative hover:text-gray-600 transition-colors">
                    Home
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#about" class="group relative hover:text-gray-600 transition-colors">
                    About
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#product" class="group relative hover:text-gray-600 transition-colors">
                    Product
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="#contact" class="group relative hover:text-gray-600 transition-colors">
                    Contact
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-gray-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>
        </div>
    </nav>
    
    <header id="home" class="relative h-screen bg-gray-900 overflow-hidden flex items-center justify-center">
        <img src="{{ asset('img/10_best_exercises_bigger_arms.jpg') }}"
             alt="Gym Background"
             class="absolute inset-0 w-full h-full object-cover opacity-60">
        <div class="relative z-10 text-center px-4 md:px-6 py-12">
            <h1 class="text-white text-5xl md:text-7xl font-extrabold mb-4" data-aos="fade-down">
                Peminjaman Alat Gym
            </h1>
            <p class="text-white text-lg md:text-xl font-medium mb-8" data-aos="fade-up">
                Temukan dan pinjam alat gym terbaik dengan mudah dan cepat.
            </p>
        </div>
    </header>

    <section id="about" class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col items-center text-center mb-12" data-aos="fade-up">
                <svg class="w-16 h-16 text-gray-800 mb-4" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 15.02h2v-6.5l-2-2.5v9zm3-12.52c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1z"/>
                </svg>
                
                <h1 class="text-4xl font-bold text-gray-800">Tentang Kami</h1>
                
                <div class="w-24 h-1 bg-gray-800 mt-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-lg text-gray-600">
                <div data-aos="fade-right">
                    <p class="mb-4">
                        Kami adalah pusat kebugaran terdepan yang berkomitmen untuk membantu setiap individu mencapai potensi kebugaran mereka. Didirikan pada tahun 2025, kami memulai perjalanan ini dengan satu tujuan: menyediakan lingkungan yang mendukung dan peralatan terbaik untuk semua penggemar kebugaran, dari pemula hingga atlet profesional.
                    </p>
                    <p>
                        Filosofi kami berpusat pada tiga pilar utama: kualitas, komunitas, dan inovasi. Kami memastikan setiap alat yang kami sediakan dalam kondisi prima, membangun komunitas yang positif, dan terus berinovasi untuk pengalaman peminjaman alat yang mulus.
                    </p>
                </div>
                <div data-aos="fade-left">
                    <p class="mb-4">
                        Dengan layanan peminjaman alat gym yang mudah diakses secara online, kami menghilangkan hambatan dalam memiliki peralatan mahal. Kini, lo bisa memilih dan meminjam alat yang sesuai dengan kebutuhan lo, kapan saja, di mana saja.
                    </p>
                    <p>
                        Kami percaya bahwa kebugaran adalah hak semua orang, bukan kemewahan. Bergabunglah dengan kami dan jadikan setiap latihan lo lebih efektif. Jadilah bagian dari revolusi kebugaran kami, di mana akses ke peralatan gym terbaik hanya dengan sekali klik.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <main id="product" class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-12" data-aos="fade-up">Daftar Barang Gym</h2>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($barang as $b)
                    <div class="bg-white rounded-lg transition-all duration-300 overflow-hidden border border-transparent hover:border-gray-800" data-aos="zoom-in" data-aos-duration="1000">
                        @if($b->gambar_barang)
                            <img src="{{ asset('storage/'.$b->gambar_barang) }}"
                                 alt="{{ $b->nama_barang }}"
                                 class="w-full h-56 object-cover transition-transform duration-300">
                        @else
                            <div class="w-full h-56 bg-gray-200 flex items-center justify-center text-gray-500 font-medium">
                                No Image Available
                            </div>
                        @endif

                        <div class="p-4 flex flex-col items-start">
                            <h3 class="text-xl font-normal tracking-wide">{{ $b->nama_barang }}</h3>
                            
                            <div class="text-sm font-light text-gray-500 mb-4">
                                Jumlah: {{ $b->jumlah_barang }}
                            </div>
                            
                            @if($b->jumlah_barang > 0)
                                <a href="{{ route('peminjaman.create', ['alat_id' => $b->id]) }}"
                                   class="block w-full text-center bg-gray-900 text-white px-4 py-3 rounded-lg 
                                          font-semibold hover:bg-gray-400 transition duration-300">
                                    Pinjam Sekarang
                                </a>
                            @else
                                <button class="block w-full text-center bg-gray-400 text-white px-4 py-3 rounded-lg 
                                               font-semibold cursor-not-allowed" disabled>
                                    Stok Habis
                                </button>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500 text-lg">Belum ada barang gym yang tersedia saat ini.</p>
                @endforelse
            </div>
            <div class="mt-8" data-aos="fade-up">
                {{ $barang->links() }}
            </div>
        </div>
    </main>

    <footer id="contact" class="bg-gray-900 text-gray-200 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8" data-aos="fade-in">
                
                <div>
                    <h3 class="font-bold uppercase mb-4 text-white">Produk</h3>
                    <ul>
                        <li class="mb-2"><a href="#" class="hover:text-gray-400 transition-colors">Dumbbell</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-400 transition-colors">Treadmill</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-400 transition-colors">Beban</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-400 transition-colors">Yoga Mat</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-bold uppercase mb-4 text-white">Layanan</h3>
                    <ul>
                        <li class="mb-2"><a href="#" class="hover:text-gray-400 transition-colors">Peminjaman</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-400 transition-colors">Pengembalian</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-400 transition-colors">Reservasi Alat</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-400 transition-colors">Status Peminjaman</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-bold uppercase mb-4 text-white">Perusahaan</h3>
                    <ul>
                        <li class="mb-2"><a href="#about" class="hover:text-gray-400 transition-colors">Tentang Kami</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-400 transition-colors">Karir</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-gray-400 transition-colors">Blog</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-bold uppercase mb-4 text-white">Bantuan</h3>
                    <ul>
                        <li class="mb-2"><a href="#" class="hover:text-red-600 transition-colors">FAQ</a></li>
                        <li class="mb-2"><a href="#contact" class="hover:text-red-600 transition-colors">Kontak Kami</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-red-600 transition-colors">Kebijakan Privasi</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-bold uppercase mb-4 text-white">Ikuti Kami</h3>
                    <ul>
                        <li class="mb-2"><a href="#" class="hover:text-red-600 transition-colors">Instagram</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-red-600 transition-colors">Facebook</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-red-600 transition-colors">Twitter</a></li>
                    </ul>
                </div>

            </div>
            
            <div class="mt-12 text-center text-gray-400 text-sm">
                <p>&copy; 2024 Nama Gym. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>
</html>