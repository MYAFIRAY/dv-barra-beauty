@extends('layouts.app')

@section('content')
<div class="space-y-6">
    
    <!-- Bagian Judul & Sambutan -->
    <div>
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Dashboard</h1>
        <p class="text-slate-500 mt-1 font-medium">Halo {{ auth()->user()->name ?? 'Admin' }}, selamat datang kembali. Berikut ringkasan aktivitas toko Anda hari ini.</p>
    </div>

    <!-- Grid 4 Kotak Ringkasan (Cards) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Card 1: Total Produk (Diganti dari Total Penjualan karena Kasir tidak melihat total pendapatan) -->
        <div class="bg-white rounded-2xl p-6 shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 flex flex-col justify-between relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
            <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">Total Produk Aktif</p>
            <h2 class="text-3xl font-extrabold text-slate-800 mt-2">{{ $totalProduk ?? 0 }}</h2>
            <div class="flex items-center gap-2 mt-4 text-sm font-semibold text-blue-600 bg-blue-50 w-fit px-2.5 py-1 rounded-lg">
                Di Katalog
            </div>
        </div>

        <!-- Card 2: Pesanan Baru -->
        <div class="bg-white rounded-2xl p-6 shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 flex flex-col justify-between relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-red-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
            <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">Pesanan Masuk</p>
            <h2 class="text-3xl font-extrabold text-slate-800 mt-2">{{ $pesananBaru ?? 0 }}</h2>
            <div class="flex items-center gap-2 mt-4 text-sm font-semibold text-red-600 bg-red-50 w-fit px-2.5 py-1 rounded-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                Perlu Diproses
            </div>
        </div>

        <!-- Card 3: Pesanan Diproses/Dikirim -->
        <div class="bg-white rounded-2xl p-6 shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 flex flex-col justify-between relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-orange-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
            <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">Sedang Diproses</p>
            <h2 class="text-3xl font-extrabold text-slate-800 mt-2">{{ $pesananDiproses ?? 0 }}</h2>
            <div class="mt-4 text-sm font-semibold text-orange-500 bg-orange-50 w-fit px-2.5 py-1 rounded-lg">Menunggu Aksi</div>
        </div>

        <!-- Card 4: Total Pesanan (Semua) -->
        <div class="bg-white rounded-2xl p-6 shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 flex flex-col justify-between relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-green-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
            <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">Total Semua Pesanan</p>
            <!-- Menghitung total semua status -->
            <h2 class="text-3xl font-extrabold text-slate-800 mt-2">{{ ($pesananBaru ?? 0) + ($pesananDiproses ?? 0) }}</h2>
            <div class="mt-4 text-sm font-semibold text-slate-400">Transaksi Keseluruhan</div>
        </div>

    </div>

    <!-- Area Bawah: Grafik & Tabel vs Produk Terlaris -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Kolom Kiri (Porsi Lebih Besar: 2/3) -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Area Grafik Placeholder -->
            <div class="bg-white rounded-2xl p-6 shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 flex flex-col items-center justify-center h-[300px]">
                <p class="text-slate-400 font-bold text-xl mb-2">Area Grafik Penjualan</p>
                <p class="text-slate-400 text-sm">(Nanti kita pasang script Chart.js di sini)</p>
            </div>

            <!-- Tabel Pesanan Terbaru -->
            <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                    <h3 class="font-bold text-lg text-slate-800">Pesanan Terbaru</h3>
                    <a href="/pesanan" class="text-sm font-bold text-blue-600 hover:text-blue-700">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider border-b border-slate-100">
                                <th class="px-6 py-4 font-bold">No. Pesanan</th>
                                <th class="px-6 py-4 font-bold">Pelanggan</th>
                                <th class="px-6 py-4 font-bold">Total</th>
                                <th class="px-6 py-4 font-bold text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-slate-100">
                            @if(isset($pesananTerbaru) && count($pesananTerbaru) > 0)
                                @foreach($pesananTerbaru as $pesanan)
                                <tr class="hover:bg-blue-50/50 transition-colors">
                                    <td class="px-6 py-4 font-bold text-blue-600">{{ $pesanan->no_pesanan }}</td>
                                    <td class="px-6 py-4 font-semibold text-slate-700">{{ $pesanan->nama_pelanggan }}</td>
                                    <td class="px-6 py-4 font-bold text-slate-800">Rp {{ number_format($pesanan->total_tagihan ?? $pesanan->total_harga, 0, ',', '.') }}</td>
                                    <td class="px-6 py-4 text-center">
                                        @if($pesanan->status_pesanan == 'Baru')
                                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">Baru</span>
                                        @elseif($pesanan->status_pesanan == 'Diproses' || $pesanan->status_pesanan == 'Dikirim')
                                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700">{{ $pesanan->status_pesanan }}</span>
                                        @else
                                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">{{ $pesanan->status_pesanan }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="px-6 py-8 text-center text-slate-500">Belum ada pesanan terbaru.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Kolom Kanan (Porsi Lebih Kecil: 1/3) -->
        <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 overflow-hidden flex flex-col h-full">
            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50">
                <h3 class="font-bold text-lg text-slate-800">Stok Menipis / Habis</h3>
                <p class="text-xs text-slate-500 mt-1 font-medium">Segera lakukan restock</p>
            </div>
            
            <div class="p-6 flex-1 flex flex-col gap-5 overflow-y-auto">
                <!-- Tampilkan data statis dulu jika belum ada data $stokMenipis dari controller -->
                <div class="text-center py-10">
                    <p class="text-slate-500 text-sm">Fitur stok menipis akan segera tersedia.</p>
                </div>
            </div>
            
            <div class="p-4 border-t border-slate-100">
                <button class="w-full py-2.5 bg-slate-50 hover:bg-blue-50 text-slate-600 hover:text-blue-600 font-bold rounded-xl transition-colors text-sm">Lihat Semua Laporan</button>
            </div>
        </div>

    </div>
</div>
@endsection