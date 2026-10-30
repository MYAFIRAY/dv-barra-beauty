<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Executive Dashboard Owner - DV BARRA Beauty</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: { colors: { 'dv-main': '#2b5a8e', 'dv-dark': '#1a3e6c', 'dv-bg': '#dbe8f6' } }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> 
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; } 
        @media print {
            .no-print { display: none !important; }
            body { background: white; }
        }
    </style>
</head>
<body class="text-slate-800 antialiased flex flex-col min-h-screen">

    <!-- Header / Navbar Owner -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-sm no-print">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="DV BARRA" class="h-12 w-auto object-contain">
                <div>
                    <h1 class="font-extrabold text-slate-800 text-base">Executive Owner Dashboard</h1>
                    <p class="text-xs font-medium text-slate-400">Pusat Analitik & Laporan Kinerja Bisnis</p>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button onclick="window.print()" class="text-xs font-bold text-dv-main bg-dv-bg hover:bg-dv-main hover:text-white px-4 py-2.5 rounded-xl transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    Cetak Laporan
                </button>
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-xs font-bold text-red-500 hover:text-red-700 bg-red-50 px-4 py-2.5 rounded-xl transition-colors">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <main class="flex-grow max-w-7xl mx-auto w-full px-6 py-8">
        
        <!-- Bar Filter Tanggal & Ringkasan -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm mb-8 flex flex-col md:flex-row items-center justify-between gap-4 no-print">
            <div>
                <h2 class="text-lg font-extrabold text-slate-800">Filter Periode Laporan</h2>
                <p class="text-xs text-slate-400">Tampilkan data transaksi berdasarkan rentang waktu tertentu.</p>
            </div>
            <form action="{{ route('owner.dashboard') }}" method="GET" class="flex items-center gap-3 w-full md:w-auto">
                <input type="date" name="tanggal_mulai" value="{{ $tanggalMulai }}" class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-600 focus:outline-none focus:border-dv-main">
                <span class="text-xs font-bold text-slate-400">s/d</span>
                <input type="date" name="tanggal_selesai" value="{{ $tanggalSelesai }}" class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-600 focus:outline-none focus:border-dv-main">
                <button type="submit" class="px-5 py-2 bg-dv-main text-white font-extrabold text-xs rounded-xl hover:bg-dv-dark transition-colors shadow-sm">Filter</button>
                @if($tanggalMulai || $tanggalSelesai)
                    <a href="{{ route('owner.dashboard') }}" class="px-3 py-2 bg-slate-100 text-slate-500 font-bold text-xs rounded-xl hover:bg-slate-200">Reset</a>
                @endif
            </form>
        </div>

        <!-- Kartu Statistik Utama -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Total Pendapatan -->
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(43,90,142,0.08)]">
                <div class="w-12 h-12 bg-dv-bg text-dv-main rounded-2xl flex items-center justify-center font-bold text-lg mb-4">💰</div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Total Pendapatan (Paid)</p>
                <h3 class="text-xl font-extrabold text-slate-800">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
            </div>

            <!-- Total Transaksi -->
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(43,90,142,0.08)]">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center font-bold text-lg mb-4">📦</div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Total Transaksi</p>
                <h3 class="text-xl font-extrabold text-slate-800">{{ $totalPesanan }} Pesanan</h3>
            </div>

            <!-- Belum Bayar / Pending -->
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(43,90,142,0.08)]">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center font-bold text-lg mb-4">⏳</div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Menunggu Pembayaran</p>
                <h3 class="text-xl font-extrabold text-slate-800">{{ $pesananPending }} Pesanan</h3>
            </div>

            <!-- Stok Menipis -->
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(43,90,142,0.08)]">
                <div class="w-12 h-12 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center font-bold text-lg mb-4">⚠️</div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Stok Produk Menipis (≤5)</p>
                <h3 class="text-xl font-extrabold text-slate-800">{{ $produkHampirHabis }} Item</h3>
            </div>
        </div>

        <!-- Grid Bagian Bawah: Produk Terlaris & Tabel Transaksi -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Sisi Kiri: Produk Terlaris (Best Seller) -->
            <div class="bg-white rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(43,90,142,0.08)] p-6 lg:p-8">
                <h3 class="text-base font-extrabold text-slate-800 mb-6 flex items-center gap-2">
                    <span>🔥</span> Produk Terlaris (Best Seller)
                </h3>
                <div class="space-y-4">
                    @forelse($produkTerlaris as $pt)
                        <div class="flex items-center justify-between p-3 bg-slate-50 rounded-2xl border border-slate-100">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-white rounded-xl overflow-hidden border border-slate-200 flex-shrink-0">
                                    @if($pt->produk && $pt->produk->gambar)
                                        <img src="{{ asset('images/produk/' . $pt->produk->gambar) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-slate-200"></div>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-xs line-clamp-1">{{ $pt->produk->nama_produk ?? 'Produk Dihapus' }}</h4>
                                    <span class="text-[10px] font-semibold text-slate-400">Terjual: {{ $pt->total_terjual }} pcs</span>
                                </div>
                            </div>
                            <span class="text-xs font-extrabold text-dv-main bg-dv-bg px-2.5 py-1 rounded-lg">Top</span>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400 text-center py-6">Belum ada data penjualan produk.</p>
                    @endforelse
                </div>
            </div>

            <!-- Sisi Kanan: Tabel Riwayat Seluruh Transaksi -->
            <div class="lg:col-span-2 bg-white rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(43,90,142,0.08)] p-6 lg:p-8">
                <h3 class="text-base font-extrabold text-slate-800 mb-6">Draf Rekapitulasi Transaksi</h3>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b border-slate-100 text-xs font-bold text-slate-400 uppercase tracking-wider">
                                <th class="pb-4">No. Pesanan</th>
                                <th class="pb-4">Pelanggan</th>
                                <th class="pb-4">Kurir</th>
                                <th class="pb-4">Total</th>
                                <th class="pb-4">Bayar</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50 text-xs font-medium text-slate-600">
                            @forelse($pesananTerbaru as $p)
                            <tr class="hover:bg-slate-50/50 transition-colors">
                                <td class="py-3.5 font-bold text-dv-main">{{ $p->no_pesanan }}</td>
                                <td class="py-3.5 font-bold text-slate-800">{{ $p->nama_pelanggan }}</td>
                                <td class="py-3.5">{{ $p->kurir }}</td>
                                <td class="py-3.5 font-extrabold text-slate-800">Rp {{ number_format($p->total_tagihan, 0, ',', '.') }}</td>
                                <td class="py-3.5">
                                    @if($p->status_pembayaran == 'Sudah Dibayar')
                                        <span class="px-2.5 py-1 bg-green-100 text-green-700 font-extrabold rounded-full">Paid</span>
                                    @else
                                        <span class="px-2.5 py-1 bg-amber-100 text-amber-700 font-extrabold rounded-full">Pending</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="py-12 text-center text-slate-400 font-medium">Tidak ada transaksi ditemukan pada periode ini.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    {{ $pesananTerbaru->links() }}
                </div>
            </div>

        </div>

    </main>
</body>
</html>