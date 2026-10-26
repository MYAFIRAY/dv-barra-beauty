<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacak Pesanan - DV BARRA Beauty</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; } </style>
</head>
<body class="text-slate-800 p-4 md:p-8 flex flex-col items-center min-h-screen">
    
    <div class="w-full max-w-2xl text-center mb-8 mt-10">
        <h1 class="text-3xl font-extrabold text-[#2b5a8e] mb-2">Lacak Pesanan Kamu</h1>
        <p class="text-slate-500 font-medium text-sm">Masukkan nomor pesanan (Contoh: ORD-261020-XXXX) untuk mengecek status pengiriman.</p>
    </div>

    <!-- Form Pencarian -->
    <div class="w-full max-w-2xl bg-white p-6 rounded-3xl shadow-sm border border-slate-200 mb-8">
        <form action="{{ route('lacak.pesanan') }}" method="GET" class="flex flex-col md:flex-row gap-4">
            <input type="text" name="no_pesanan" value="{{ request('no_pesanan') }}" placeholder="Masukkan Nomor Pesanan..." required class="flex-1 px-6 py-4 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-[#2b5a8e] font-bold text-slate-700 placeholder-slate-400">
            <button type="submit" class="px-8 py-4 bg-[#2b5a8e] text-white font-extrabold rounded-xl hover:bg-[#1a3e6c] transition-colors shadow-lg">Cari Paket</button>
        </form>
    </div>

    <!-- Hasil Pencarian -->
    @if(request()->has('no_pesanan'))
        @if($pesanan)
            <div class="w-full max-w-2xl bg-white p-8 rounded-3xl shadow-sm border border-slate-200">
                <div class="flex justify-between items-start border-b border-slate-100 pb-6 mb-6">
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Status Saat Ini</p>
                        <h2 class="text-2xl font-extrabold text-[#2b5a8e]">{{ $pesanan->status_pesanan }}</h2>
                        <p class="text-sm font-medium text-slate-500 mt-1">Pembayaran: <span class="font-bold {{ $pesanan->status_pembayaran == 'Sudah Dibayar' ? 'text-green-600' : 'text-amber-500' }}">{{ $pesanan->status_pembayaran }}</span></p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Nomor Resi ({{ $pesanan->kurir }})</p>
                        <p class="text-lg font-bold text-slate-800">{{ $pesanan->no_resi ?? 'Belum ada resi' }}</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <p class="font-bold text-slate-800">Rincian Belanja:</p>
                    @foreach($pesanan->rincian as $item)
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-600">{{ $item->jumlah }}x {{ $item->produk->nama_produk ?? 'Produk' }}</span>
                            <span class="font-bold text-slate-800">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="w-full max-w-2xl bg-red-50 p-6 rounded-2xl border border-red-100 text-center">
                <p class="text-red-600 font-bold">Pesanan dengan nomor "{{ request('no_pesanan') }}" tidak ditemukan.</p>
            </div>
        @endif
    @endif

</body>
</html>