<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DV BARRA Beauty - Skincare & Kosmetik Original</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Konfigurasi Tema Warna Kustom DV BARRA -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dv-main': '#2b5a8e',   /* Biru Baja (Teks Logo Utama) */
                        'dv-dark': '#1a3e6c',   /* Biru Gelap (Bayangan Logo) */
                        'dv-light': '#4a7fb8',  /* Biru Terang (Hover state) */
                        'dv-bg': '#dbe8f6',     /* Biru Es Muda (Background Logo) */
                    },
                    boxShadow: {
                        'soft': '0 4px 20px -2px rgba(43, 90, 142, 0.05)',
                        'hover': '0 10px 30px -5px rgba(43, 90, 142, 0.15)',
                    }
                }
            }
        }
    </script>

    <!-- Font Modern & Elegan -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Outfit', sans-serif; 
            background-color: #FAFAFA; /* Sedikit lebih bersih dari slate-50 */
        }
        .font-serif {
            font-family: 'Playfair Display', serif;
        }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        /* Animasi Kustom */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>
<body class="text-slate-800 antialiased flex flex-col min-h-screen selection:bg-dv-bg selection:text-dv-main">

    <!-- Topbar Promo Premium -->
    <div class="bg-gradient-to-r from-dv-dark via-dv-main to-dv-dark text-white text-[11px] md:text-xs font-medium text-center py-2.5 tracking-wider uppercase flex justify-center items-center gap-2">
        <span class="animate-pulse">✨</span> Gratis Ongkir untuk wilayah Kota Padang (S&K Berlaku) <span class="animate-pulse">✨</span>
    </div>

    <!-- Header / Navbar Utama -->
    <header class="bg-white/90 backdrop-blur-md border-b border-slate-100 sticky top-0 z-50 shadow-sm transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 md:px-8 h-20 flex items-center justify-between gap-6">

            <!-- Logo -->
            <a href="/" class="flex-shrink-0 flex items-center gap-3 group">
                <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="DV BARRA" class="h-12 md:h-14 w-auto object-contain transition-transform duration-500 group-hover:scale-105 group-hover:rotate-1">
                <div class="hidden lg:block">
                    <h1 class="font-serif text-xl font-bold text-dv-dark leading-none tracking-tight">DV BARRA</h1>
                    <p class="text-[10px] text-slate-400 font-medium tracking-widest uppercase mt-0.5">Beauty Choices</p>
                </div>
            </a>

            <!-- Search Bar (Lebih elegan) -->
            <form action="{{ route('katalog') }}" method="GET" class="hidden md:flex flex-1 max-w-2xl relative group">
                <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400 group-focus-within:text-dv-main transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari skincare impianmu..." class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-transparent rounded-full text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-dv-bg focus:border-dv-main focus:bg-white transition-all shadow-inner">
                <button type="submit" class="absolute inset-y-1 right-1 px-5 bg-dv-main hover:bg-dv-dark text-white rounded-full text-xs font-bold transition-colors">
                    Cari
                </button>
            </form>

            <!-- Menu Kanan -->
            <div class="flex items-center gap-5 flex-shrink-0">
                @auth
                    <!-- Jika User Sudah Login -->
                    <div class="flex items-center gap-4 border-l border-slate-200 pl-5">
                        <div class="hidden md:block text-right">
                            <p class="text-[10px] font-medium text-slate-400 uppercase tracking-wider">Selamat datang,</p>
                            <p class="text-sm font-bold text-slate-800">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="relative group">
                            <div class="w-10 h-10 rounded-full bg-dv-bg flex items-center justify-center text-dv-main font-bold border border-white shadow-sm cursor-pointer">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </div>
                            <!-- Dropdown Menu -->
                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-slate-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-2 group-hover:translate-y-0">
                                <div class="py-2">
                                    @if(Auth::user()->role === 'admin')
                                        <a href="{{ url('/pesanan') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-dv-main font-medium">Panel Admin</a>
                                    @endif
                                    <form action="{{ route('logout') }}" method="POST" class="block w-full text-left">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-medium transition-colors">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Jika Belum Login -->
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-dv-main transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="hidden md:block text-sm font-bold text-dv-main bg-dv-bg/50 px-6 py-2.5 rounded-full hover:bg-dv-main hover:text-white transition-all shadow-sm">Daftar</a>
                @endauth
            </div>

        </div> 
    </header>

    <!-- Konten Utama -->
    <main class="flex-grow pb-32">

        <!-- Premium Hero Banner -->
        <div class="max-w-7xl mx-auto px-4 md:px-8 mt-6">
            <div class="relative w-full rounded-[2rem] overflow-hidden bg-slate-900 shadow-2xl">
                <!-- Background Image & Overlay -->
                <div class="absolute inset-0">
                    <img src="https://images.unsplash.com/photo-1612817288484-6f916006741a?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" alt="Beauty Background" class="w-full h-full object-cover opacity-60">
                    <div class="absolute inset-0 bg-gradient-to-r from-dv-dark/95 via-dv-main/80 to-transparent"></div>
                </div>

                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between p-10 md:p-16 lg:p-20 min-h-[400px]">
                    <!-- Text Content -->
                    <div class="w-full md:w-1/2 text-white space-y-6">
                        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20">
                            <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                            <span class="text-xs font-bold tracking-widest uppercase">Special Offer</span>
                        </div>
                        
                        <h2 class="font-serif text-4xl md:text-5xl lg:text-6xl font-bold leading-[1.1] text-white">
                            Pancarkan <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-dv-bg to-white">Pesona Alami</span> Mu.
                        </h2>
                        
                        <p class="text-slate-200 text-base md:text-lg font-light leading-relaxed max-w-md">
                            Temukan rangkaian produk perawatan kulit dan kosmetik original dengan diskon eksklusif hingga 20% untuk paket bundling.
                        </p>
                        
                        <div class="pt-4">
                            <button class="group relative px-8 py-4 bg-white text-dv-dark font-bold text-sm rounded-full overflow-hidden shadow-lg transition-transform hover:-translate-y-1">
                                <div class="absolute inset-0 w-full h-full bg-dv-bg transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300"></div>
                                <span class="relative flex items-center gap-2">
                                    Mulai Belanja 
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Keunggulan DV BARRA -->
<div class="max-w-7xl mx-auto px-4 md:px-8 mt-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        <div class="bg-white rounded-2xl p-5 shadow-soft border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-dv-bg flex items-center justify-center text-2xl">
                ✨
            </div>
            <div>
                <h4 class="font-bold text-dv-dark text-sm">Produk Berkualitas</h4>
                <p class="text-xs text-slate-500 mt-1">Pilihan skincare dan kosmetik untukmu.</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-soft border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-dv-bg flex items-center justify-center text-2xl">
                🛍️
            </div>
            <div>
                <h4 class="font-bold text-dv-dark text-sm">Belanja Praktis</h4>
                <p class="text-xs text-slate-500 mt-1">Pilih produk favorit dengan mudah.</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-5 shadow-soft border border-slate-100 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-dv-bg flex items-center justify-center text-2xl">
                💙
            </div>
            <div>
                <h4 class="font-bold text-dv-dark text-sm">Pelayanan Terbaik</h4>
                <p class="text-xs text-slate-500 mt-1">Kenyamanan belanja jadi prioritas kami.</p>
            </div>
        </div>

    </div>
</div>
        <!-- Filter Kategori Elegan -->
        <div class="max-w-7xl mx-auto px-4 md:px-8 mt-16">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8">
                <div>
                    <h3 class="font-serif text-3xl font-bold text-dv-dark">Koleksi Kami</h3>
                    <p class="text-sm text-slate-500 mt-1">Pilih kategori produk yang sesuai dengan kebutuhan Anda</p>
                    <p class="text-xs text-dv-main mt-2 font-medium">
    ✨ Rawat dirimu dengan produk pilihan, tampil percaya diri setiap hari.
</p>
                </div>
                
               <!-- Area Tombol Kategori -->
                @php
                    // Ambil parameter '?kategori=' dari URL, jika kosong berarti sedang di tab 'Semua'
                    $kategoriAktif = request('kategori', ''); 
                    
                    // Daftar kategori (Bisa ditambah sesuai kebutuhan)
                    $listKategori = ['Bundling', 'Skincare', 'Makeup', 'Wardah', 'Scarlett'];
                @endphp

                <div class="flex items-center gap-2 overflow-x-auto pb-2 hide-scrollbar">
                    
                    <!-- Tombol 'Semua' -->
                    <a href="{{ url()->current() }}" 
                       class="px-6 py-2.5 rounded-full text-sm font-semibold whitespace-nowrap transition-all shadow-sm
                       {{ $kategoriAktif == '' ? 'bg-dv-dark text-white' : 'bg-white border border-slate-200 text-slate-600 hover:border-dv-main hover:text-dv-main' }}">
                        Semua
                    </a>

                    <!-- Looping Tombol Kategori Lainnya -->
                    @foreach($listKategori as $kategori)
                        <a href="{{ url()->current() }}?kategori={{ $kategori }}" 
                           class="px-6 py-2.5 rounded-full text-sm font-medium whitespace-nowrap transition-all shadow-sm
                           {{ $kategoriAktif == $kategori ? 'bg-dv-dark text-white border-transparent' : 'bg-white border border-slate-200 text-slate-600 hover:border-dv-main hover:text-dv-main' }}">
                            {{ $kategori }}
                        </a>
                    @endforeach

                </div>
            </div>

            <!-- Grid Produk -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5 md:gap-6">

                @forelse($produks as $item)
                <div class="bg-white rounded-[1.5rem] p-3 shadow-soft hover:shadow-hover transition-all duration-300 flex flex-col relative group cursor-pointer border border-slate-100/50">

                    <!-- Badge Diskon -->
                    @if($item->harga_coret && $item->harga_coret > $item->harga)
                        @php
                            $diskon = round((($item->harga_coret - $item->harga) / $item->harga_coret) * 100);
                        @endphp
                        <div class="absolute top-5 left-5 bg-gradient-to-r from-red-500 to-rose-400 text-white text-[10px] font-bold px-3 py-1.5 rounded-full z-10 shadow-md shadow-red-500/20 tracking-wide">
                            -{{ $diskon }}%
                        </div>
                    @endif

                   <!-- Area Gambar -->
<div class="w-full aspect-square bg-slate-50 rounded-[1.2rem] relative overflow-hidden flex items-center justify-center text-slate-300">
    @if($item->gambar)
        <img src="{{ asset(str_starts_with($item->gambar, 'images/') ? $item->gambar : 'images/produk/' . $item->gambar) }}" alt="{{ $item->nama_produk }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
    @else
        <svg class="w-12 h-12 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
    @endif

                        <!-- Hover Overlay Add to Cart (Desktop) -->
                        <div class="absolute inset-0 bg-dv-dark/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 hidden md:flex items-center justify-center backdrop-blur-[2px]">
                            <form action="{{ route('keranjang.tambah', $item->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="px-5 py-2.5 bg-white text-dv-dark font-bold text-sm rounded-full transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 shadow-xl hover:bg-dv-main hover:text-white">
                                    + Keranjang
                                </button>
                            </form>
                        </div>

                        @if($item->stok <= 0)
                            <div class="absolute inset-0 bg-white/70 backdrop-blur-sm flex items-center justify-center z-20">
                                <span class="bg-slate-900 text-white text-xs font-bold px-4 py-2 rounded-full shadow-xl">HABIS</span>
                            </div>
                        @endif
                    </div>

                    <!-- Info Produk -->
                    <div class="pt-4 px-2 flex flex-col flex-grow">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] font-bold text-dv-light uppercase tracking-widest bg-dv-bg/50 px-2 py-0.5 rounded-md">{{ $item->kategori }}</span>
                            <div class="flex items-center gap-1 text-[11px] font-semibold text-slate-600">
                                <svg class="w-3.5 h-3.5 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                {{ $item->rating ?? '4.8' }}
                            </div>
                        </div>
                        
                        <h3 class="font-medium text-slate-800 text-[13px] md:text-sm leading-snug mb-3 line-clamp-2 group-hover:text-dv-main transition-colors">{{ $item->nama_produk }}</h3>

                        <div class="mt-auto flex items-end justify-between">
                            <div>
                                @if($item->harga_coret)
                                    <div class="text-[11px] font-medium text-slate-400 line-through mb-0.5">Rp {{ number_format($item->harga_coret, 0, ',', '.') }}</div>
                                @else
                                    <div class="text-[11px] text-transparent mb-0.5">-</div>
                                @endif
                                <div class="font-bold text-dv-dark text-base md:text-lg">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                            </div>
                            
                            <!-- Tombol Add to cart Mobile -->
                            <form action="{{ route('keranjang.tambah', $item->id) }}" method="POST" class="md:hidden">
                                @csrf
                                <button type="submit" class="w-9 h-9 rounded-full bg-dv-bg text-dv-main flex items-center justify-center hover:bg-dv-main hover:text-white transition-colors active:scale-95">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-24 text-center flex flex-col items-center justify-center bg-white rounded-3xl border border-dashed border-slate-200">
                    <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-800 mb-2">Katalog Kosong</h4>
                    <p class="text-slate-500">Produk sedang disiapkan. Silakan periksa kembali nanti.</p>
                </div>
                @endforelse

            </div>
        </div>
        <!-- Promo Penutup Katalog -->
<div class="max-w-7xl mx-auto px-4 md:px-8 mt-16">
    <div class="bg-gradient-to-r from-dv-dark to-dv-main rounded-3xl p-8 md:p-12 text-center text-white shadow-xl">

        <h3 class="font-serif text-2xl md:text-3xl font-bold mb-3">
            Saatnya Memanjakan Dirimu!
        </h3>

        <p class="text-sm md:text-base text-blue-100 max-w-xl mx-auto leading-relaxed">
            Temukan produk kecantikan favoritmu dan jadikan setiap hari
            sebagai kesempatan untuk tampil lebih percaya diri.
        </p>

        <p class="mt-5 text-xs font-semibold tracking-widest uppercase text-blue-200">
            DV BARRA Beauty Choices
        </p>

    </div>
</div>
<!-- Mengapa Memilih DV BARRA -->
<div class="max-w-7xl mx-auto px-4 md:px-8 mt-16 mb-16">

    <div class="text-center mb-8">
        <h3 class="font-serif text-2xl md:text-3xl font-bold text-dv-dark">
            Mengapa Memilih DV BARRA?
        </h3>

        <p class="text-sm text-slate-500 mt-2">
            Lebih dari sekadar belanja, temukan pengalaman merawat diri.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-soft">
            <div class="text-3xl mb-3">💗</div>
            <h4 class="font-bold text-dv-dark mb-2">
                Pilihan untuk Kecantikanmu
            </h4>
            <p class="text-sm text-slate-500 leading-relaxed">
                Temukan berbagai pilihan skincare dan kosmetik
                untuk melengkapi kebutuhan kecantikanmu.
            </p>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-soft">
            <div class="text-3xl mb-3">🌸</div>
            <h4 class="font-bold text-dv-dark mb-2">
                Belanja dengan Nyaman
            </h4>
            <p class="text-sm text-slate-500 leading-relaxed">
                Nikmati pengalaman berbelanja yang praktis,
                mudah, dan menyenangkan bersama DV BARRA.
            </p>
        </div>

    </div>
</div>
    </main>

    <!-- Footer Premium -->
    <footer class="bg-white border-t border-slate-100 mt-auto">
        <div class="max-w-7xl mx-auto px-6 py-12 md:py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-8 items-center">
                
                <!-- Kiri: Logo -->
                <div class="flex flex-col items-center md:items-start gap-4">
                    <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="DV BARRA" class="h-16 w-auto object-contain">
                    <p class="text-sm text-slate-500 text-center md:text-left max-w-xs">Pusat skincare dan kosmetik original terpercaya untuk memancarkan kecantikan alamimu.</p>
                </div>

                <!-- Tengah: Links -->
                <div class="flex justify-center gap-8 text-sm font-semibold text-slate-600">
                    <a href="#" class="hover:text-dv-main transition-colors">Tentang Kami</a>
                    <a href="#" class="hover:text-dv-main transition-colors">Cara Belanja</a>
                    <a href="#" class="hover:text-dv-main transition-colors">Bantuan</a>
                </div>

                <!-- Kanan: Social & Copyright -->
                <div class="flex flex-col items-center md:items-end gap-6">
                    <div class="flex gap-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-dv-bg hover:text-dv-main transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-dv-bg hover:text-dv-main transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        </a>
                    </div>
                    <p class="text-[11px] font-medium text-slate-400">&copy; {{ date('Y') }} DV BARRA Beauty Choices. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Keranjang Melayang -->
    <div class="fixed bottom-6 right-6 md:bottom-8 md:right-8 z-50">
        <a href="{{ route('keranjang') }}" class="flex items-center justify-center w-14 h-14 md:w-16 md:h-16 bg-dv-dark text-white rounded-full shadow-2xl hover:bg-dv-main transition-all duration-300 hover:scale-110 hover:-translate-y-1 relative group border-[3px] border-white">
            @php $jumlahKeranjang = collect(session('keranjang', []))->sum('jumlah'); @endphp
            @if($jumlahKeranjang > 0)
                <div class="absolute -top-2 -right-2 min-w-[24px] h-[24px] px-1.5 bg-gradient-to-r from-red-500 to-rose-400 text-white text-[11px] font-bold rounded-full flex items-center justify-center border-2 border-white shadow-md animate-bounce">{{ $jumlahKeranjang }}</div>
            @endif
            <svg class="w-6 h-6 md:w-7 md:h-7 group-hover:-rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </a>
    </div>

</body>
</html>