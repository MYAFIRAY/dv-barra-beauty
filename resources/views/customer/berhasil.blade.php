<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan - DV BARRA Beauty</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { 'dv-main': '#2b5a8e', 'dv-dark': '#1a3e6c', 'dv-bg': '#dbe8f6', } } } }
    </script>
    
    @if($pesanan->status_pembayaran == 'Belum Dibayar')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>
    @endif

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; } </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4 antialiased text-slate-800 relative overflow-x-hidden">

    <div class="fixed top-[-10%] left-[-10%] w-[500px] h-[500px] bg-dv-bg rounded-full mix-blend-multiply filter blur-[80px] opacity-70 pointer-events-none"></div>

    <div class="w-full max-w-lg bg-white rounded-3xl shadow-[0_8px_32px_rgba(43,90,142,0.08)] border border-slate-100 p-8 md:p-10 relative z-10 text-center">
        
        <div class="mb-6">
            <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="DV BARRA" class="h-10 mx-auto object-contain mix-blend-multiply">
        </div>

        <div class="w-16 h-16 {{ $pesanan->status_pembayaran == 'Sudah Dibayar' ? 'bg-green-100 text-green-500' : 'bg-amber-100 text-amber-500' }} rounded-full flex items-center justify-center mx-auto mb-4">
            @if($pesanan->status_pembayaran == 'Sudah Dibayar')
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
            @else
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            @endif
        </div>

        <h1 class="text-2xl font-extrabold text-slate-800 mb-2">
            {{ $pesanan->status_pembayaran == 'Sudah Dibayar' ? 'Pembayaran Berhasil!' : 'Pesanan Dibuat!' }}
        </h1>
        <p class="text-sm font-medium text-slate-500 mb-4">Terima kasih <strong class="text-slate-800">{{ $pesanan->nama_pelanggan }}</strong> telah berbelanja di DV BARRA Beauty.</p>

        <div class="inline-block px-4 py-1.5 bg-dv-bg/60 text-dv-main rounded-full font-bold text-xs tracking-wider mb-6">
            {{ $pesanan->no_pesanan }}
        </div>

        <div class="bg-slate-50 border border-slate-200 rounded-2xl p-6 text-left mb-8">
            <div class="flex items-center justify-between border-b border-slate-200 pb-4 mb-4">
                <div>
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Tagihan</p>
                    <h2 class="text-2xl font-extrabold text-dv-main">Rp {{ number_format($pesanan->total_tagihan, 0, ',', '.') }}</h2>
                </div>
                <div class="text-right">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Status</p>
                    @if($pesanan->status_pembayaran == 'Sudah Dibayar')
                        <span class="inline-block px-2.5 py-1 bg-green-100 text-green-700 font-bold text-xs rounded-md">Lunas</span>
                    @else
                        <span class="inline-block px-2.5 py-1 bg-amber-100 text-amber-700 font-bold text-xs rounded-md">Belum Dibayar</span>
                    @endif
                </div>
            </div>
            
            <div class="space-y-3">
                <div class="flex justify-between items-center text-sm">
                    <span class="text-slate-500">Kurir Pengiriman</span>
                    <span class="font-bold text-slate-800">{{ $pesanan->kurir }}</span>
                </div>
            </div>
        </div>

        <div class="space-y-3">
            @if($pesanan->status_pembayaran == 'Belum Dibayar')
                <button id="pay-button" class="w-full py-4 bg-dv-main text-white font-extrabold rounded-xl shadow-lg hover:bg-dv-dark transition-transform hover:scale-[1.02] text-sm cursor-pointer">
                    💳 Bayar Sekarang dengan Midtrans
                </button>
            @else
                <button onclick="window.print()" class="w-full py-4 bg-green-500 text-white font-extrabold rounded-xl shadow-lg hover:bg-green-600 transition-transform hover:scale-[1.02] text-sm cursor-pointer">
                    🖨️ Cetak Invoice Pembayaran
                </button>
            @endif
            
            <a href="/" class="flex items-center justify-center w-full py-3 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl hover:bg-slate-50 transition-colors text-xs">
                Kembali ke Beranda
            </a>
        </div>
    </div>

    @if($pesanan->status_pembayaran == 'Belum Dibayar')
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    // Kalau sukses, otomatis arahkan ke rute update status
                    window.location.href = "{{ route('checkout.bayarselesai', $pesanan->id) }}";
                },
                onPending: function(result){ alert("Menunggu pembayaran kamu..."); location.reload(); },
                onError: function(result){ alert("Pembayaran gagal!"); },
                onClose: function(){ alert('Kamu menutup halaman pembayaran sebelum selesai.'); }
            });
        });
    </script>
    @endif
</body>
</html>