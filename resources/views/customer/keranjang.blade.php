<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - DV BARRA Beauty</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dv-main': '#2b5a8e',
                        'dv-dark': '#1a3e6c',
                        'dv-bg': '#dbe8f6',
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; } </style>
</head>
<body class="text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Header Sederhana -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-5xl mx-auto px-4 md:px-6 h-16 md:h-20 flex items-center justify-between">
            <a href="{{ route('katalog') }}" class="flex items-center gap-2 text-slate-500 hover:text-dv-main transition-colors font-bold text-sm">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Lanjut Belanja
            </a>
            <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="DV BARRA" class="h-10 md:h-12 w-auto object-contain">
            <div class="w-24"></div> <!-- Spacer Kanan biar logo pas di tengah -->
        </div>
    </header>

    <main class="flex-grow max-w-5xl mx-auto w-full px-4 md:px-6 py-8 md:py-12">
        <h1 class="text-2xl md:text-3xl font-extrabold text-slate-800 tracking-tight mb-8">Keranjang Belanja</h1>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 text-sm rounded-xl font-bold">
                {{ session('success') }}
            </div>
        @endif

        @if(session('keranjang') && count(session('keranjang')) > 0)
            <div class="flex flex-col lg:flex-row gap-8">
                
                <!-- Sisi Kiri: Daftar Produk di Keranjang -->
                <div class="w-full lg:w-2/3 space-y-4">
                    @php $total = 0; @endphp
                    @foreach(session('keranjang') as $id => $details)
                        @php $total += $details['harga'] * $details['jumlah']; @endphp
                        <div class="bg-white p-4 md:p-6 rounded-2xl border border-slate-100 shadow-sm flex items-center gap-4 md:gap-6 relative">
                            
                            <!-- Foto Produk -->
                            <div class="w-20 h-20 md:w-24 md:h-24 bg-slate-50 rounded-xl overflow-hidden flex-shrink-0 border border-slate-100">
                                @if(isset($details['gambar']) && $details['gambar'] != '')
                                    <img src="{{ asset('images/produk/' . $details['gambar']) }}" alt="{{ $details['nama_produk'] }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-300">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Detail Produk & Aksi -->
                            <div class="flex-grow">
                                <h3 class="font-bold text-slate-800 text-sm md:text-base leading-snug mb-1">{{ $details['nama_produk'] }}</h3>
                                <p class="font-extrabold text-dv-main text-sm md:text-base mb-3">Rp {{ number_format($details['harga'], 0, ',', '.') }}</p>
                              <a href="{{ route('produk.detail', $id) }}"
   class="inline-block text-xs font-bold text-dv-main hover:text-dv-dark mb-3">
    Lihat Detail Produk →
</a>

                                
                                <div class="flex items-center justify-between">
                                    
                                    <!-- Form Update QTY -->
                                    <form action="{{ route('keranjang.update', $id) }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        <input type="number" name="jumlah" value="{{ $details['jumlah'] }}" min="1" class="w-16 px-2 py-1 text-center bg-slate-50 border border-slate-200 rounded-lg text-sm font-bold focus:outline-none focus:border-dv-main">
                                        <button type="submit" class="text-xs font-bold text-slate-500 hover:text-dv-main bg-slate-100 px-3 py-1.5 rounded-lg transition-colors">Update</button>
                                    </form>

                                    <!-- Form Hapus -->
                                    <form action="{{ route('keranjang.hapus', $id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-xs font-bold text-red-500 hover:text-red-700 bg-red-50 px-3 py-1.5 rounded-lg transition-colors flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            <span class="hidden md:inline">Hapus</span>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Sisi Kanan: Ringkasan Harga -->
                <div class="w-full lg:w-1/3">
                    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(43,90,142,0.08)] sticky top-28">
                        <h3 class="text-lg font-extrabold text-slate-800 mb-4">Ringkasan Belanja</h3>
                        <div class="flex justify-between items-center text-sm font-medium text-slate-500 mb-3">
                            <span>Total Harga ({{ count(session('keranjang')) }} Produk)</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <hr class="border-slate-100 my-4">
                        <div class="flex justify-between items-center mb-6">
                            <span class="text-base font-bold text-slate-800">Total Tagihan</span>
                            <span class="text-xl font-extrabold text-dv-main">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        
                        <!-- Tombol Checkout -->
                        <a href="{{ route('checkout') }}" class="block w-full py-4 text-center bg-dv-main text-white font-extrabold text-sm rounded-xl shadow-lg shadow-dv-main/30 hover:bg-dv-dark transition-transform hover:scale-[1.02]">
                            Lanjut ke Checkout
                        </a>
                    </div>
                </div>

            </div>
        @else
            <!-- Tampilan Jika Keranjang Kosong -->
            <div class="text-center py-20 bg-white rounded-3xl border border-slate-100 shadow-sm">
                <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
                <h2 class="text-xl font-extrabold text-slate-800 mb-2">Keranjang Belanja Kosong</h2>
                <p class="text-sm font-medium text-slate-500 mb-8">Yuk, temukan skincare dan makeup favoritmu di katalog!</p>
                <a href="{{ route('katalog') }}" class="inline-block px-8 py-3.5 bg-dv-main text-white font-extrabold text-sm rounded-full shadow-lg shadow-dv-main/30 hover:bg-dv-dark transition-transform hover:scale-105">
                    Mulai Belanja
                </a>
            </div>
        @endif
    </main>

</body>
</html>