@extends('layouts.app')

@section('content')
<div class="space-y-6">
    
    <!-- Bagian Judul & Sambutan -->
    <div>
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Dashboard</h1>
        <p class="text-slate-500 mt-1 font-medium">Halo Admin, selamat datang kembali. Berikut ringkasan aktivitas toko Anda hari ini.</p>
    </div>

    <!-- Grid 4 Kotak Ringkasan (Cards) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Card 1: Total Penjualan -->
        <div class="bg-white rounded-2xl p-6 shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 flex flex-col justify-between relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
            <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">Total Penjualan</p>
            <h2 class="text-3xl font-extrabold text-slate-800 mt-2">Rp 12.000.000</h2>
            <div class="flex items-center gap-2 mt-4 text-sm font-semibold text-green-600 bg-green-50 w-fit px-2.5 py-1 rounded-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                12% dari bulan lalu
            </div>
        </div>

        <!-- Card 2: Total Pesanan -->
        <div class="bg-white rounded-2xl p-6 shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 flex flex-col justify-between relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
            <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">Total Pesanan</p>
            <h2 class="text-3xl font-extrabold text-slate-800 mt-2">30</h2>
            <div class="flex items-center gap-2 mt-4 text-sm font-semibold text-green-600 bg-green-50 w-fit px-2.5 py-1 rounded-lg">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                5%
            </div>
        </div>

        <!-- Card 3: Pesanan Selesai -->
        <div class="bg-white rounded-2xl p-6 shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 flex flex-col justify-between relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
            <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">Pesanan Selesai</p>
            <h2 class="text-3xl font-extrabold text-slate-800 mt-2">15</h2>
            <div class="mt-4 text-sm font-semibold text-slate-400">Transaksi Berhasil</div>
        </div>

        <!-- Card 4: Pesanan Diproses -->
        <div class="bg-white rounded-2xl p-6 shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 flex flex-col justify-between relative overflow-hidden group">
            <div class="absolute -right-4 -top-4 w-24 h-24 bg-orange-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
            <p class="text-sm font-bold text-slate-500 uppercase tracking-wider">Sedang Diproses</p>
            <h2 class="text-3xl font-extrabold text-slate-800 mt-2">15</h2>
            <div class="mt-4 text-sm font-semibold text-orange-500 bg-orange-50 w-fit px-2.5 py-1 rounded-lg">Menunggu Aksi</div>
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
                                <th class="px-6 py-4 font-bold">Produk</th>
                                <th class="px-6 py-4 font-bold">Total</th>
                                <th class="px-6 py-4 font-bold text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-slate-100">
                            <tr class="hover:bg-blue-50/50 transition-colors">
                                <td class="px-6 py-4 font-bold text-blue-600">#0937268</td>
                                <td class="px-6 py-4 font-semibold text-slate-700">Dena</td>
                                <td class="px-6 py-4 text-slate-600">Paket Wardah</td>
                                <td class="px-6 py-4 font-bold text-slate-800">Rp 50.000</td>
                                <td class="px-6 py-4 text-center"><span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700">Diproses</span></td>
                            </tr>
                            <tr class="hover:bg-blue-50/50 transition-colors">
                                <td class="px-6 py-4 font-bold text-blue-600">#0837268</td>
                                <td class="px-6 py-4 font-semibold text-slate-700">Desi</td>
                                <td class="px-6 py-4 text-slate-600">Paket Emina</td>
                                <td class="px-6 py-4 font-bold text-slate-800">Rp 80.000</td>
                                <td class="px-6 py-4 text-center"><span class="px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">Baru</span></td>
                            </tr>
                            <tr class="hover:bg-blue-50/50 transition-colors">
                                <td class="px-6 py-4 font-bold text-blue-600">#0933868</td>
                                <td class="px-6 py-4 font-semibold text-slate-700">Nisa</td>
                                <td class="px-6 py-4 text-slate-600">Paket Bundling</td>
                                <td class="px-6 py-4 font-bold text-slate-800">Rp 65.000</td>
                                <td class="px-6 py-4 text-center"><span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">Dikirim</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Kolom Kanan (Porsi Lebih Kecil: 1/3) -->
        <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 overflow-hidden flex flex-col h-full">
            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50">
                <h3 class="font-bold text-lg text-slate-800">Produk Terlaris</h3>
                <p class="text-xs text-slate-500 mt-1 font-medium">Sepanjang bulan ini</p>
            </div>
            
            <div class="p-6 flex-1 flex flex-col gap-5 overflow-y-auto">
                <!-- Item Produk Terlaris 1 -->
                <div class="flex items-center gap-4 group">
                    <div class="w-14 h-14 bg-slate-100 rounded-xl overflow-hidden shadow-inner flex-shrink-0 relative">
                        <!-- Placeholder Gambar Produk -->
                        <div class="absolute inset-0 bg-blue-100 opacity-50 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-slate-800 group-hover:text-blue-600 transition-colors leading-tight">Serum Scarlett</h4>
                        <p class="text-sm font-semibold text-slate-500 mt-1">Rp 75.000</p>
                    </div>
                    <div class="text-right">
                        <span class="block text-xl font-extrabold text-blue-600">124</span>
                        <span class="text-[10px] uppercase font-bold text-slate-400">Terjual</span>
                    </div>
                </div>

                <!-- Item Produk Terlaris 2 -->
                <div class="flex items-center gap-4 group">
                    <div class="w-14 h-14 bg-slate-100 rounded-xl overflow-hidden shadow-inner flex-shrink-0 relative">
                        <div class="absolute inset-0 bg-blue-100 opacity-50 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-slate-800 group-hover:text-blue-600 transition-colors leading-tight">Facial Wash Emina</h4>
                        <p class="text-sm font-semibold text-slate-500 mt-1">Rp 25.000</p>
                    </div>
                    <div class="text-right">
                        <span class="block text-xl font-extrabold text-blue-600">98</span>
                        <span class="text-[10px] uppercase font-bold text-slate-400">Terjual</span>
                    </div>
                </div>
                
                <!-- Item Produk Terlaris 3 -->
                <div class="flex items-center gap-4 group">
                    <div class="w-14 h-14 bg-slate-100 rounded-xl overflow-hidden shadow-inner flex-shrink-0 relative">
                        <div class="absolute inset-0 bg-blue-100 opacity-50 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-bold text-slate-800 group-hover:text-blue-600 transition-colors leading-tight">Paket Bundling A</h4>
                        <p class="text-sm font-semibold text-slate-500 mt-1">Rp 150.000</p>
                    </div>
                    <div class="text-right">
                        <span class="block text-xl font-extrabold text-blue-600">65</span>
                        <span class="text-[10px] uppercase font-bold text-slate-400">Terjual</span>
                    </div>
                </div>
            </div>
            
            <div class="p-4 border-t border-slate-100">
                <button class="w-full py-2.5 bg-slate-50 hover:bg-blue-50 text-slate-600 hover:text-blue-600 font-bold rounded-xl transition-colors text-sm">Lihat Semua Laporan</button>
            </div>
        </div>

    </div>
</div>
@endsection