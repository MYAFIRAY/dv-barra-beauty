@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    
    <!-- Header & Breadcrumb -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-1">
                <a href="{{ route('admin.pesanan') }}" class="hover:text-blue-600 transition-colors">Pesanan</a>
                <span>/</span>
                <span class="text-blue-600 font-bold">Detail {{ $pesanan->no_pesanan }}</span>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Rincian Pesanan</h1>
        </div>
        
        <a href="{{ route('admin.pesanan') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-slate-700 font-bold rounded-xl shadow-sm hover:bg-slate-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl font-bold">
            {{ session('success') }}
        </div>
    @endif

    <!-- Layout Utama (Grid Terbagi Dua) -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Kolom Kiri: Informasi Pesanan (Porsi 2/3) -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Ringkasan Transaksi -->
            <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-6 flex flex-col sm:flex-row sm:items-center justify-between gap-6 relative overflow-hidden">
                <div class="absolute -right-4 -top-4 w-32 h-32 bg-blue-50 rounded-full opacity-50"></div>
                
                <div class="relative z-10">
                    <div class="flex items-center gap-3 mb-2">
                        <h2 class="text-2xl font-extrabold text-blue-600">{{ $pesanan->no_pesanan }}</h2>
                        <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-700 border border-blue-200">{{ $pesanan->status_pesanan }}</span>
                    </div>
                    <p class="text-sm font-semibold text-slate-500">{{ $pesanan->created_at->format('d F Y, H:i') }} WIB</p>
                </div>

                <div class="relative z-10 text-left sm:text-right">
                    <p class="text-sm font-bold text-slate-500 uppercase tracking-wider mb-1">Total Pembayaran</p>
                    <h3 class="text-3xl font-extrabold text-slate-800">Rp {{ number_format($pesanan->total_tagihan, 0, ',', '.') }}</h3>
                    <p class="text-xs font-bold mt-1 {{ $pesanan->status_pembayaran == 'Sudah Dibayar' ? 'text-green-600' : 'text-amber-600' }}">Status: {{ $pesanan->status_pembayaran }}</p>
                </div>
            </div>

            <!-- Detail Produk Dinamis -->
            <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="font-bold text-lg text-slate-800">Detail Produk</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white text-slate-400 text-xs uppercase tracking-widest border-b border-slate-100">
                                <th class="px-6 py-4 font-bold">Produk</th>
                                <th class="px-6 py-4 font-bold">Harga</th>
                                <th class="px-6 py-4 font-bold text-center">Jumlah</th>
                                <th class="px-6 py-4 font-bold text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-slate-100">
                            @foreach($pesanan->rincian as $item)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-bold text-slate-700">{{ $item->produk->nama_produk ?? 'Produk Dihapus' }}</td>
                                <td class="px-6 py-4 font-semibold text-slate-600">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 font-bold text-slate-800 text-center">{{ $item->jumlah }}</td>
                                <td class="px-6 py-4 font-extrabold text-slate-800 text-right">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Pelanggan, Alamat, & Aksi (Porsi 1/3) -->
        <div class="lg:col-span-1 space-y-6">
            
            <!-- Info Pelanggan -->
            <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-6">
                <h3 class="font-bold text-sm text-slate-500 uppercase tracking-wider mb-4 border-b border-slate-100 pb-2">Pelanggan</h3>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-slate-200 to-slate-100 flex items-center justify-center text-slate-500 shadow-inner font-bold">
                        {{ strtoupper(substr($pesanan->nama_pelanggan, 0, 2)) }}
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-lg">{{ $pesanan->nama_pelanggan }}</h4>
                        <p class="text-sm font-semibold text-blue-600 mt-0.5">{{ $pesanan->no_wa }}</p>
                    </div>
                </div>
            </div>

            <!-- Alamat -->
            <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-6">
                <h3 class="font-bold text-sm text-slate-500 uppercase tracking-wider mb-4 border-b border-slate-100 pb-2">Alamat Pengiriman ({{ $pesanan->kurir }})</h3>
                <div class="flex gap-4">
                    <div class="mt-1">
                        <svg class="w-6 h-6 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-700 leading-relaxed">{{ $pesanan->alamat }}</p>
                    </div>
                </div>
            </div>

            <!-- Form Aksi & Resi Dinamis -->
            <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-6">
                <h3 class="font-bold text-sm text-slate-500 uppercase tracking-wider mb-4 border-b border-slate-100 pb-2">Update Resi & Status</h3>
                
                <form action="{{ route('admin.pesanan.update', $pesanan->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Status Pesanan</label>
                        <select name="status_pesanan" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-500 font-bold text-slate-700">
                            <option value="Baru" {{ $pesanan->status_pesanan == 'Baru' ? 'selected' : '' }}>Baru Masuk</option>
                            <option value="Diproses" {{ $pesanan->status_pesanan == 'Diproses' ? 'selected' : '' }}>Diproses (Packing)</option>
                            <option value="Dikirim" {{ $pesanan->status_pesanan == 'Dikirim' ? 'selected' : '' }}>Dalam Pengiriman</option>
                            <option value="Selesai" {{ $pesanan->status_pesanan == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nomor Resi (Opsional)</label>
                        <input type="text" name="no_resi" value="{{ $pesanan->no_resi }}" placeholder="Contoh: JP12345678" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-blue-500 font-bold text-slate-700">
                    </div>

                    <div class="pt-2 space-y-2">
                        <button type="submit" class="w-full py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:scale-[1.02] transition-transform">
                            Simpan Perubahan
                        </button>
                        <button type="button" onclick="window.print()" class="w-full py-3 bg-white border-2 border-blue-100 text-blue-600 font-bold rounded-xl hover:bg-blue-50 transition-colors">
                            Cetak Invoice
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
@endsection