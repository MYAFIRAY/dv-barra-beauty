<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - DV BARRA Beauty</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Konfigurasi Tema Warna Kustom DV BARRA -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dv-main': '#2b5a8e',   /* Biru Baja */
                        'dv-dark': '#1a3e6c',   /* Biru Gelap */
                        'dv-light': '#4a7fb8',  /* Biru Terang */
                        'dv-bg': '#dbe8f6',     /* Biru Es Muda */
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

    <!-- Header / Navbar -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 md:px-6 h-16 md:h-20 flex items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <a href="/" class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-500 hover:bg-dv-bg hover:text-dv-main transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-lg font-bold text-slate-800">Keranjang Belanja</h1>
            </div>
            
            <a href="/" class="flex-shrink-0 hidden md:block">
                <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="DV BARRA" class="h-8 w-auto object-contain mix-blend-multiply">
            </a>
        </div>
    </header>

    <!-- Konten Utama -->
    <main class="flex-grow py-8">
        <div class="max-w-7xl mx-auto px-4 md:px-6">
            
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Daftar Produk di Keranjang -->
                <div class="w-full lg:w-2/3">
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                        
                        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                            <h2 class="font-bold text-slate-800">Produk yang kamu pilih</h2>
                            @php $totalItem = collect($keranjang)->sum('jumlah'); @endphp
                            <span class="text-sm font-medium text-slate-500">{{ $totalItem }} Item</span>
                        </div>

                        <div class="p-6 flex flex-col gap-6">
                            
                            @forelse($keranjang as $id => $item)
                            <!-- Item Produk -->
                            <div class="flex gap-4 pb-6 border-b border-slate-100 last:border-0 last:pb-0">
                                <!-- Area Gambar -->
                                <div class="w-24 h-24 md:w-32 md:h-32 rounded-xl bg-slate-50 border border-slate-100 flex-shrink-0 flex items-center justify-center p-2">
                                    @if($item['gambar'])
                                        <img src="{{ asset('images/produk/' . $item['gambar']) }}" alt="{{ $item['nama_produk'] }}" class="w-full h-full object-cover rounded-lg">
                                    @else
                                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    @endif
                                </div>

                                <!-- Info & Kontrol -->
                                <div class="flex flex-col flex-grow justify-between py-1">
                                    <div>
                                        <div class="flex justify-between items-start mb-1">
                                            <h3 class="font-bold text-slate-800 text-sm md:text-base line-clamp-2 pr-4">{{ $item['nama_produk'] }}</h3>
                                            
                                            <!-- FORM HAPUS ITEM (Tong Sampah) -->
                                            <form action="{{ route('keranjang.hapus', $id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="text-slate-400 hover:text-red-500 transition-colors mt-0.5 cursor-pointer">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                        <p class="text-[11px] font-bold text-dv-light uppercase tracking-wider mb-2">{{ $item['kategori'] }}</p>
                                    </div>

                                    <div class="flex items-end justify-between">
                                        <div class="font-extrabold text-slate-800 text-base md:text-lg">Rp {{ number_format($item['harga'], 0, ',', '.') }}</div>
                                        
                                        <!-- KONTROL JUMLAH (+ / -) -->
                                        <div class="flex items-center bg-slate-50 border border-slate-200 rounded-lg h-9">
                                            <form action="{{ route('keranjang.update', $id) }}" method="POST" class="h-full">
                                                @csrf
                                                <input type="hidden" name="aksi" value="kurang">
                                                <button type="submit" class="w-9 h-full flex items-center justify-center text-slate-500 hover:bg-dv-bg hover:text-dv-main rounded-l-lg transition-colors cursor-pointer">-</button>
                                            </form>
                                            
                                            <div class="w-10 h-full flex items-center justify-center font-bold text-sm text-slate-800 bg-white border-x border-slate-200">{{ $item['jumlah'] }}</div>
                                            
                                            <form action="{{ route('keranjang.update', $id) }}" method="POST" class="h-full">
                                                @csrf
                                                <input type="hidden" name="aksi" value="tambah">
                                                <button type="submit" class="w-9 h-full flex items-center justify-center text-slate-500 hover:bg-dv-bg hover:text-dv-main rounded-r-lg transition-colors cursor-pointer">+</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="py-16 text-center flex flex-col items-center justify-center">
                                <div class="w-20 h-20 bg-dv-bg/50 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-10 h-10 text-dv-main" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                </div>
                                <h3 class="text-lg font-bold text-slate-800 mb-2">Keranjang masih kosong</h3>
                                <p class="text-slate-500 text-sm mb-6">Yuk, lihat-lihat katalog produk kami dan temukan skincare favoritmu!</p>
                                <a href="/" class="px-6 py-2.5 bg-dv-main text-white font-bold rounded-full hover:bg-dv-dark transition-colors shadow-lg shadow-dv-main/30">Mulai Belanja</a>
                            </div>
                            @endforelse

                        </div>
                    </div>
                </div>

                <!-- Ringkasan Belanja & Checkout -->
                <div class="w-full lg:w-1/3">
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-6 sticky top-28">
                        <h2 class="font-bold text-slate-800 mb-6 text-lg">Ringkasan Belanja</h2>
                        
                        @php
                            $subtotal = 0;
                            foreach($keranjang as $item) {
                                $subtotal += $item['harga'] * $item['jumlah'];
                            }
                        @endphp

                        <div class="flex flex-col gap-4 mb-6">
                            <div class="flex items-center justify-between text-slate-600 text-sm">
                                <span>Total Harga ({{ $totalItem }} Barang)</span>
                                <span class="font-medium">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                            </div>
                            <!-- Contoh Ongkir Statis Dulu -->
                            <div class="flex items-center justify-between text-slate-600 text-sm">
                                <span>Ongkos Kirim</span>
                                <span class="font-medium text-green-600">Gratis (Padang)</span>
                            </div>
                        </div>

                        <div class="pt-4 border-t border-slate-100 mb-8 flex items-center justify-between">
                            <span class="font-bold text-slate-800">Total Tagihan</span>
                            <span class="font-extrabold text-dv-main text-xl">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>

                        @if($totalItem > 0)
                        <!-- PERUBAHAN DI SINI: GANTI <button> JADI <a> -->
                        <a href="{{ route('checkout') }}" class="w-full py-3.5 bg-dv-main text-white font-extrabold rounded-full hover:bg-dv-dark transition-transform hover:scale-[1.02] shadow-lg shadow-dv-main/30 flex items-center justify-center gap-2">
                            Lanjut ke Pembayaran
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </a>
                        <!-- AKHIR PERUBAHAN -->
                        
                        <p class="text-[10px] text-center text-slate-400 mt-4 px-4 leading-relaxed">Dengan melanjutkan pembayaran, kamu menyetujui Syarat & Ketentuan DV BARRA.</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>