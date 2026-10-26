@extends('layouts.app')

@section('content')
<div class="space-y-6">
    
    <!-- Header Halaman -->
    <div>
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Pesanan Masuk</h1>
        <p class="text-slate-500 mt-1 font-medium">Pantau pesanan pelanggan, perbarui status, dan kelola pengiriman.</p>
    </div>

    <!-- Area Konten Utama -->
    <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 overflow-hidden flex flex-col">
        
        <!-- Tab Filter Status -->
        <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-6 bg-slate-50/50">
            <!-- Kumpulan Tombol Tab Filter Dinamis -->
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('admin.pesanan') }}" class="px-5 py-2.5 {{ request('status') == '' ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-md shadow-blue-500/20' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }} font-bold text-sm rounded-xl transition-colors">Semua</a>
                <a href="{{ route('admin.pesanan', ['status' => 'Baru']) }}" class="px-5 py-2.5 {{ request('status') == 'Baru' ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-md shadow-blue-500/20' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }} font-bold text-sm rounded-xl transition-colors">Baru</a>
                <a href="{{ route('admin.pesanan', ['status' => 'Diproses']) }}" class="px-5 py-2.5 {{ request('status') == 'Diproses' ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-md shadow-blue-500/20' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }} font-bold text-sm rounded-xl transition-colors">Diproses</a>
                <a href="{{ route('admin.pesanan', ['status' => 'Dikirim']) }}" class="px-5 py-2.5 {{ request('status') == 'Dikirim' ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-md shadow-blue-500/20' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }} font-bold text-sm rounded-xl transition-colors">Dikirim</a>
                <a href="{{ route('admin.pesanan', ['status' => 'Selesai']) }}" class="px-5 py-2.5 {{ request('status') == 'Selesai' ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-md shadow-blue-500/20' : 'bg-white border border-slate-200 text-slate-600 hover:bg-slate-50' }} font-bold text-sm rounded-xl transition-colors">Selesai</a>
            </div>

            <!-- Search Bar -->
            <div class="relative w-full md:w-64 flex-shrink-0">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <!-- Search Bar -->
            <form action="{{ route('admin.pesanan') }}" method="GET" class="relative w-full md:w-64 flex-shrink-0">
                <!-- Pertahankan parameter status jika sedang difilter -->
                @if(request('status'))
                    <input type="hidden" name="status" value="{{ request('status') }}">
                @endif
                
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama / No Pesanan..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-700 font-medium placeholder-slate-400 shadow-sm">
            </form>
            </div>
        </div>

        <!-- Tabel Data Pesanan Dinamis -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white text-slate-400 text-xs uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-5 font-bold">No. Pesanan</th>
                        <th class="px-6 py-5 font-bold">Tanggal</th>
                        <th class="px-6 py-5 font-bold">Pelanggan</th>
                        <th class="px-6 py-5 font-bold">Total Pembayaran</th>
                        <th class="px-6 py-5 font-bold text-center">Status</th>
                        <th class="px-6 py-5 font-bold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-100">
                    
                    @forelse($pesanans as $p)
                    <tr class="hover:bg-blue-50/30 transition-colors group">
                        <td class="px-6 py-4 font-bold text-blue-600">{{ $p->no_pesanan }}</td>
                        <td class="px-6 py-4 font-semibold text-slate-600">{{ $p->created_at->format('d M Y, H:i') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs flex-shrink-0">
                                    {{ strtoupper(substr($p->nama_pelanggan, 0, 2)) }}
                                </div>
                                <span class="font-bold text-slate-700">{{ $p->nama_pelanggan }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-extrabold text-slate-800">Rp {{ number_format($p->total_tagihan, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 text-center">
                            @if($p->status_pesanan == 'Baru')
                                <span class="inline-flex px-3 py-1.5 rounded-lg text-xs font-bold bg-red-100 text-red-600">Baru</span>
                            @elseif($p->status_pesanan == 'Diproses')
                                <span class="inline-flex px-3 py-1.5 rounded-lg text-xs font-bold bg-blue-100 text-blue-700">Diproses</span>
                            @elseif($p->status_pesanan == 'Dikirim')
                                <span class="inline-flex px-3 py-1.5 rounded-lg text-xs font-bold bg-amber-100 text-amber-700">Dikirim</span>
                            @else
                                <span class="inline-flex px-3 py-1.5 rounded-lg text-xs font-bold bg-green-100 text-green-700">Selesai</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('admin.pesanan.detail', $p->id) }}" class="inline-block px-4 py-2 bg-slate-100 text-slate-600 font-bold rounded-lg hover:bg-blue-600 hover:text-white transition-colors text-xs">Detail</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-500 font-medium">Belum ada pesanan masuk.</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection