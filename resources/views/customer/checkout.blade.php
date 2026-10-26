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
                extend: {
                    colors: {
                        'dv-main': '#2b5a8e',
                        'dv-dark': '#1a3e6c',
                        'dv-light': '#4a7fb8',
                        'dv-bg': '#dbe8f6',
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; } </style>
</head>
<body class="text-slate-800">

    <header class="bg-white border-b border-slate-200 py-4 shadow-sm">
        <div class="max-w-3xl mx-auto px-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <a href="/keranjang" class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-500 hover:bg-dv-bg hover:text-dv-main transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                <h1 class="text-xl font-bold text-slate-800">Checkout Pesanan</h1>
            </div>
            <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="DV BARRA" class="h-7 object-contain mix-blend-multiply">
        </div>
    </header>

    <main class="py-8">
        <div class="max-w-3xl mx-auto px-4">
            
            <form action="{{ route('checkout.proses') }}" method="POST" class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                @csrf
                <div class="p-6 md:p-8 flex flex-col gap-6">
                    
                    <!-- Bagian Informasi Pengiriman -->
                    <div>
                        <h2 class="text-lg font-bold text-dv-main mb-4">Informasi Pengiriman</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                                <input type="text" name="nama_pelanggan" required placeholder="Masukkan nama penerima" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-dv-bg focus:border-dv-main focus:bg-white outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Nomor WhatsApp</label>
                                <input type="number" name="no_wa" required placeholder="08123456789" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-dv-bg focus:border-dv-main focus:bg-white outline-none">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-slate-700 mb-1">Alamat Lengkap</label>
                                <textarea name="alamat" required rows="3" placeholder="Jalan, No. Rumah, Kecamatan, Kota Padang..." class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-dv-bg focus:border-dv-main focus:bg-white outline-none"></textarea>
                            </div>
                        </div>
                    </div>

                    <hr class="border-slate-100">

                    <!-- Bagian Kurir Pengiriman -->
                    <div>
                        <h2 class="text-lg font-bold text-dv-main mb-4">Pengiriman</h2>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Pilih Kurir</label>
                            <select name="kurir" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-dv-bg focus:border-dv-main outline-none">
                                <option value="JNE">JNE Express</option>
                                <option value="JNT">J&T Express</option>
                                <option value="GOSEND">GoSend (Khusus Padang)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Bagian Rincian Harga -->
                    <div class="mt-4 p-5 bg-dv-bg/30 border border-dv-bg/60 rounded-xl">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-slate-600 text-sm">Total Belanja</span>
                            <span class="font-bold text-slate-800">Rp {{ number_format($total_belanja, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-slate-600 text-sm">Ongkos Kirim</span>
                            <span class="text-green-600 font-bold text-sm">Gratis</span>
                        </div>
                        <div class="flex justify-between items-center pt-4 border-t border-slate-200">
                            <span class="font-bold text-slate-800">Total Tagihan</span>
                            <span class="font-extrabold text-dv-main text-xl">Rp {{ number_format($total_belanja, 0, ',', '.') }}</span>
                        </div>
                        
                        <!-- Data Tersembunyi (Hidden Inputs) -->
                        <input type="hidden" name="total_harga" value="{{ $total_belanja }}">
                        <input type="hidden" name="ongkir" value="0">
                        <input type="hidden" name="total_tagihan" value="{{ $total_belanja }}">
                    </div>

                </div>
                
                <!-- Tombol Submit -->
                <div class="bg-slate-50 p-6 border-t border-slate-100">
                    <button type="submit" class="w-full py-4 bg-dv-main text-white font-extrabold text-lg rounded-xl hover:bg-dv-dark transition-transform hover:scale-[1.01] shadow-lg shadow-dv-main/30 cursor-pointer">
                        Buat Pesanan Sekarang
                    </button>
                </div>
            </form> 

        </div>
    </main>

</body>
</html>