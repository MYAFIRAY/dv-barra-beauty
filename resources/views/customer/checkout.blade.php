<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - DV BARRA Beauty</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: { colors: { 'dv-main': '#2b5a8e', 'dv-dark': '#1a3e6c', 'dv-bg': '#dbe8f6' } }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; } </style>
</head>
<body class="text-slate-800 antialiased flex flex-col min-h-screen">

    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-5xl mx-auto px-4 md:px-6 h-16 flex items-center justify-center relative">
            <a href="{{ route('keranjang') }}" class="absolute left-4 md:left-6 text-slate-500 hover:text-dv-main transition-colors font-bold text-sm flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali
            </a>
            <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="DV BARRA" class="h-10 w-auto object-contain">
        </div>
    </header>

    <main class="flex-grow max-w-5xl mx-auto w-full px-4 md:px-6 py-8 md:py-12">
        <h1 class="text-2xl md:text-3xl font-extrabold text-slate-800 tracking-tight mb-8">Pengiriman & Pembayaran</h1>

        <form action="{{ route('checkout.proses') }}" method="POST" class="flex flex-col lg:flex-row gap-8">
            @csrf
            
            <!-- INPUT TERSEMBUNYI UNTUK CONTROLLER KAMU -->
            <input type="hidden" name="total_harga" value="{{ $total_belanja }}">
            <input type="hidden" name="ongkir" value="0">
            <input type="hidden" name="total_tagihan" value="{{ $total_belanja }}">
            
            <!-- Sisi Kiri: Form Data Pengiriman -->
            <div class="w-full lg:w-2/3 space-y-6">
                <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-100 shadow-sm">
                    <h2 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-dv-bg text-dv-main flex items-center justify-center text-sm">1</span>
                        Alamat Pengiriman
                    </h2>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Penerima</label>
                            <input type="text" name="nama_pelanggan" value="{{ Auth::check() ? Auth::user()->name : '' }}" required placeholder="Contoh: M Yafi Ray" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-dv-main focus:bg-white font-medium text-slate-700 transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nomor WhatsApp</label>
                            <input type="text" name="no_wa" required placeholder="Contoh: 081234567890" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-dv-main focus:bg-white font-medium text-slate-700 transition-all">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Alamat Lengkap</label>
                            <textarea name="alamat" required rows="3" placeholder="Nama Jalan, RT/RW, Kelurahan, Kecamatan, Kota, Kode Pos" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-dv-main focus:bg-white font-medium text-slate-700 transition-all resize-none"></textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-100 shadow-sm">
                    <h2 class="text-lg font-bold text-slate-800 mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 rounded-full bg-dv-bg text-dv-main flex items-center justify-center text-sm">2</span>
                        Pilih Kurir
                    </h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <label class="relative cursor-pointer">
                            <input type="radio" name="kurir" value="JNE" class="peer sr-only" checked>
                            <div class="p-4 bg-white border-2 border-slate-100 rounded-xl peer-checked:border-dv-main peer-checked:bg-dv-bg/30 hover:border-dv-main/50 transition-all text-center">
                                <span class="font-extrabold text-slate-700 block">JNE</span>
                                <span class="text-xs font-medium text-slate-500">Reguler</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="kurir" value="J&T" class="peer sr-only">
                            <div class="p-4 bg-white border-2 border-slate-100 rounded-xl peer-checked:border-dv-main peer-checked:bg-dv-bg/30 hover:border-dv-main/50 transition-all text-center">
                                <span class="font-extrabold text-slate-700 block">J&T</span>
                                <span class="text-xs font-medium text-slate-500">Express</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="kurir" value="SiCepat" class="peer sr-only">
                            <div class="p-4 bg-white border-2 border-slate-100 rounded-xl peer-checked:border-dv-main peer-checked:bg-dv-bg/30 hover:border-dv-main/50 transition-all text-center">
                                <span class="font-extrabold text-slate-700 block">SiCepat</span>
                                <span class="text-xs font-medium text-slate-500">Reguler</span>
                            </div>
                        </label>
                        <label class="relative cursor-pointer">
                            <input type="radio" name="kurir" value="GoSend" class="peer sr-only">
                            <div class="p-4 bg-white border-2 border-slate-100 rounded-xl peer-checked:border-dv-main peer-checked:bg-dv-bg/30 hover:border-dv-main/50 transition-all text-center">
                                <span class="font-extrabold text-slate-700 block">GoSend</span>
                                <span class="text-xs font-medium text-slate-500">Instant</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Sisi Kanan: Ringkasan & Tombol Lanjut Midtrans -->
            <div class="w-full lg:w-1/3">
                <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(43,90,142,0.08)] sticky top-24">
                    <h3 class="text-lg font-extrabold text-slate-800 mb-4">Pesanan Kamu</h3>
                    
                    <div class="space-y-3 mb-6 max-h-48 overflow-y-auto pr-2">
                        @foreach($keranjang as $item)
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-600 font-medium line-clamp-1 pr-4">{{ $item['jumlah'] }}x {{ $item['nama_produk'] }}</span>
                                <span class="font-bold text-slate-800 whitespace-nowrap">Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    </div>

                    <hr class="border-slate-100 my-4">
                    
                    <div class="flex justify-between items-center mb-2 text-sm font-medium text-slate-500">
                        <span>Subtotal Produk</span>
                        <span>Rp {{ number_format($total_belanja, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between items-center mb-6 text-sm font-medium text-slate-500">
                        <span>Biaya Pengiriman</span>
                        <span class="text-green-600 font-bold">Gratis</span>
                    </div>
                    
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-base font-bold text-slate-800">Total Pembayaran</span>
                        <span class="text-xl font-extrabold text-dv-main">Rp {{ number_format($total_belanja, 0, ',', '.') }}</span>
                    </div>
                    
                    <button type="submit" class="w-full py-4 text-center bg-dv-main text-white font-extrabold text-sm rounded-xl shadow-lg shadow-dv-main/30 hover:bg-dv-dark transition-transform hover:scale-[1.02]">
                        Lanjut ke Pembayaran
                    </button>
                    <p class="text-center text-xs font-medium text-slate-400 mt-4 flex items-center justify-center gap-1">
                        <svg class="w-4 h-4 text-dv-main" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Secured by Midtrans
                    </p>
                </div>
            </div>
        </form>
    </main>
</body>
</html>