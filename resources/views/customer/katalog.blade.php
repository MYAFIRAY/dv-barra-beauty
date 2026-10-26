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
                    }
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Topbar Promo Kecil -->
    <!-- Ganti bg-blue-600 jadi bg-dv-main -->
    <div class="bg-dv-main text-white text-xs font-semibold text-center py-2.5 tracking-wide">
        ✨ Gratis Ongkir untuk wilayah Kota Padang (S&K Berlaku)
    </div>

    <!-- Header / Navbar Utama -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 md:px-6 h-16 md:h-20 flex items-center justify-between gap-4">

            <!-- Logo -->
            <a href="/" class="flex-shrink-0">
                <!-- Ganti nama file kalau logo barunya beda -->
                <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="DV BARRA" class="h-10 md:h-12 w-auto object-contain mix-blend-multiply transition-transform hover:scale-105">
            </a>

            <!-- Search Bar (Tengah) -->
            <div class="hidden md:flex flex-1 max-w-2xl relative">
                <!-- Fokus border jadi dv-main -->
                <input type="text" placeholder="Cari skincare, makeup, atau paket bundling..." class="w-full pl-5 pr-12 py-3 bg-slate-50 border border-slate-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-dv-bg focus:border-dv-main focus:bg-white transition-all shadow-sm">
                <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-dv-main opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>

            <!-- Menu Kanan -->
            <div class="flex items-center gap-5 flex-shrink-0">
                <a href="/login" class="text-sm font-bold text-slate-600 hover:text-dv-main transition-colors">Masuk</a>
                <a href="/login" class="hidden md:block text-sm font-bold text-white bg-dv-main px-5 py-2.5 rounded-full hover:bg-dv-dark transition-colors shadow-md shadow-dv-main/30">Daftar</a>
            </div>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="flex-grow pb-24">

        <!-- Banner Kustom Warna DV BARRA -->
        <div class="max-w-7xl mx-auto px-4 md:px-6 mt-6 md:mt-8">
            <div class="w-full bg-gradient-to-r from-dv-dark via-dv-main to-dv-light rounded-3xl flex flex-col md:flex-row items-center justify-between p-8 md:p-12 overflow-hidden relative shadow-lg shadow-dv-main/20">
                <!-- Ornamen Latar -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-dv-bg opacity-20 rounded-full blur-3xl translate-x-1/2 -translate-y-1/2"></div>
                
                <div class="relative z-10 w-full md:w-3/5 mb-6 md:mb-0 text-white">
                    <span class="inline-block px-3 py-1 bg-white/20 rounded-full font-bold text-[10px] md:text-xs tracking-widest uppercase mb-4 backdrop-blur-sm border border-white/30">Spesial Hari Ini</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold mb-4 leading-[1.1] tracking-tight">Diskon 20%<br>Paket Bundling</h2>
                    <p class="text-dv-bg text-sm md:text-base mb-8 max-w-md font-medium leading-relaxed">Dapatkan harga lebih hemat untuk setiap pembelian kosmetik dalam satu paket dari brand pilihan.</p>
                    <button class="px-8 py-3.5 bg-white text-dv-dark font-extrabold text-sm rounded-full hover:scale-105 transition-transform shadow-lg">Belanja Sekarang</button>
                </div>

                <!-- Ilustrasi/Gambar Banner -->
                <div class="w-full md:w-2/5 flex justify-center md:justify-end relative z-10">
                    <div class="w-full max-w-[240px] aspect-[4/3] bg-white/10 border border-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center text-white/70 shadow-inner">
                        <span class="text-sm font-medium tracking-wide">[ Area Foto Produk Promo ]</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Kategori -->
        <div class="max-w-7xl mx-auto px-4 md:px-6 mt-10">
            <h3 class="text-lg font-bold text-slate-800 mb-4">Kategori Pilihan</h3>
            <div class="flex items-center gap-3 overflow-x-auto pb-2 hide-scrollbar">
                <button class="px-5 py-2.5 bg-dv-main text-white rounded-full text-sm font-bold whitespace-nowrap shadow-md shadow-dv-main/30">Semua Produk</button>
                <button class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-full text-sm font-bold whitespace-nowrap hover:border-dv-main hover:text-dv-main transition-colors">✨ Bundling</button>
                <button class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-full text-sm font-bold whitespace-nowrap hover:border-dv-main hover:text-dv-main transition-colors">💧 Skincare</button>
                <button class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-full text-sm font-bold whitespace-nowrap hover:border-dv-main hover:text-dv-main transition-colors">💄 Makeup</button>
                <button class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-full text-sm font-bold whitespace-nowrap hover:border-dv-main hover:text-dv-main transition-colors">Wardah</button>
                <button class="px-5 py-2.5 bg-white border border-slate-200 text-slate-600 rounded-full text-sm font-bold whitespace-nowrap hover:border-dv-main hover:text-dv-main transition-colors">Scarlett</button>
            </div>
        </div>

        <!-- Grid Produk -->
        <div class="max-w-7xl mx-auto px-4 md:px-6 mt-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-extrabold text-slate-800">Produk Pilihan Kami</h2>
                <a href="#" class="text-sm font-bold text-dv-main hover:text-dv-dark transition-colors flex items-center gap-1">Lihat Semua <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4 md:gap-5">

                @forelse($produks as $item)
                <!-- Hover border pakai dv-bg (biru muda banget) -->
                <div class="bg-white rounded-2xl border border-slate-100 hover:border-dv-main/30 hover:shadow-[0_8px_30px_rgb(43,90,142,0.08)] transition-all duration-300 flex flex-col relative overflow-hidden group cursor-pointer">

                    <!-- Badge Diskon Otomatis -->
                    @if($item->harga_coret && $item->harga_coret > $item->harga)
                        @php
                            $diskon = round((($item->harga_coret - $item->harga) / $item->harga_coret) * 100);
                        @endphp
                        <div class="absolute top-3 left-3 bg-red-500 text-white text-[10px] font-extrabold px-2.5 py-1 rounded-full z-10 shadow-sm">-{{ $diskon }}%</div>
                    @endif

                    <!-- Area Gambar -->
                    <div class="w-full aspect-square bg-slate-50 relative flex items-center justify-center text-slate-300 p-4">
                        @if($item->gambar)
                            <img src="{{ asset('images/produk/' . $item->gambar) }}" alt="{{ $item->nama_produk }}" class="w-full h-full object-cover rounded-xl group-hover:scale-105 transition-transform duration-500">
                        @else
                            <svg class="w-12 h-12 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        @endif

                        @if($item->stok <= 0)
                            <div class="absolute inset-0 bg-white/60 backdrop-blur-[2px] flex items-center justify-center z-20">
                                <span class="bg-slate-800 text-white text-xs font-bold px-4 py-1.5 rounded-full shadow-lg">Stok Habis</span>
                            </div>
                        @endif
                    </div>

                    <!-- Info Produk -->
                    <div class="p-4 flex flex-col flex-grow">
                        <div class="flex items-center justify-between mb-1.5">
                            <p class="text-[9px] font-bold text-dv-light uppercase tracking-widest">{{ $item->kategori }}</p>
                            <div class="flex items-center gap-0.5 text-[10px] font-bold text-slate-500">
                                <svg class="w-3 h-3 text-yellow-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                {{ $item->rating }}
                            </div>
                        </div>
                        
                        <h3 class="font-bold text-slate-800 text-sm leading-snug mb-1 line-clamp-2 group-hover:text-dv-main transition-colors">{{ $item->nama_produk }}</h3>

                        <div class="mt-auto pt-3 border-t border-slate-50">
                            @if($item->harga_coret)
                                <div class="text-[10px] font-semibold text-slate-400 line-through mb-0.5">Rp {{ number_format($item->harga_coret, 0, ',', '.') }}</div>
                            @else
                                <div class="text-[10px] text-transparent mb-0.5">-</div>
                            @endif

                            <div class="flex items-center justify-between">
                                <div class="font-extrabold text-slate-800 text-lg">Rp {{ number_format($item->harga, 0, ',', '.') }}</div>
                                
                                <!-- TOMBOL FORM TAMBAH KERANJANG -->
                                <form action="{{ route('keranjang.tambah', $item->id) }}" method="POST">
                                    @csrf
                                    <!-- Tombol pakai warna dv-bg dan dv-main -->
                                    <button type="submit" class="w-8 h-8 rounded-full bg-dv-bg/50 text-dv-main flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all hover:bg-dv-main hover:text-white shadow-sm hover:shadow-dv-main/30 cursor-pointer">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full py-20 text-center flex flex-col items-center justify-center">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                    </div>
                    <p class="text-slate-500 font-medium">Katalog sedang disiapkan. Belum ada produk.</p>
                </div>
                @endforelse

            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 mt-12 py-10">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="DV BARRA" class="h-8 w-auto object-contain mix-blend-multiply grayscale opacity-50">
                <p class="text-sm font-medium text-slate-400">&copy; 2026 DV BARRA Beauty Choices.</p>
            </div>
            <div class="flex items-center gap-6 text-sm font-medium text-slate-400">
                <a href="#" class="hover:text-dv-main transition-colors">Instagram</a>
                <a href="#" class="hover:text-dv-main transition-colors">WhatsApp</a>
                <a href="#" class="hover:text-dv-main transition-colors">Bantuan</a>
            </div>
        </div>
    </footer>

    <!-- Keranjang Melayang -->
    <div class="fixed bottom-6 right-6 md:bottom-8 md:right-8 z-50">
        <a href="/keranjang" class="flex items-center justify-center w-14 h-14 bg-dv-main text-white rounded-full shadow-2xl hover:bg-dv-dark transition-transform hover:scale-110 relative group border-2 border-white">
            @php $jumlahKeranjang = collect(session('keranjang', []))->sum('jumlah'); @endphp
            @if($jumlahKeranjang > 0)
                <!-- Badge merah tetap dipertahankan agar terlihat menonjol -->
                <div class="absolute -top-1.5 -right-1.5 min-w-[22px] h-[22px] px-1.5 bg-red-500 text-white text-[10px] font-extrabold rounded-full flex items-center justify-center border-2 border-white shadow-sm">{{ $jumlahKeranjang }}</div>
            @endif
            <svg class="w-6 h-6 group-hover:-rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        </a>
    </div>

</body>
</html>