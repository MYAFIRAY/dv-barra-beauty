@extends('layouts.app')

@section('content')
<div class="space-y-6">
    
    <!-- Header Halaman & Breadcrumb -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Manajemen Produk</h1>
            <p class="text-slate-500 mt-1 font-medium">Kelola daftar produk kosmetik, paket bundling, dan stok toko Anda.</p>
        </div>
        
        <!-- Tombol Tambah Produk -->
        <a href="{{ route('admin.produk.create') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:scale-105 transition-transform">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
            Tambah Produk
        </a>
    </div>

    <!-- Area Filter & Tabel -->
    <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 overflow-hidden flex flex-col">
        
        <!-- Topbar Tabel (Pencarian & Filter) -->
        <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-50/50">
            <!-- Search Bar -->
            <form action="{{ route('admin.produk.index') }}" method="GET" class="relative w-full max-w-md">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" class="w-full pl-11 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-700 font-medium placeholder-slate-400 shadow-sm" placeholder="Cari nama produk atau kode...">
            </form>
            
            <!-- Filter Dropdown (Optional: Bisa dibuat dinamis nanti) -->
            <div class="flex items-center gap-3">
                <span class="text-sm font-bold text-slate-500">Filter:</span>
                <select class="bg-white border border-slate-200 text-slate-700 text-sm rounded-xl focus:ring-blue-500 focus:border-blue-500 block p-2.5 font-medium shadow-sm outline-none cursor-pointer">
                    <option selected>Semua Status</option>
                    <option value="aktif">Aktif</option>
                    <option value="habis">Stok Habis</option>
                    <option value="arsip">Diarsipkan</option>
                </select>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="overflow-x-auto w-full">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white text-slate-400 text-xs uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-5 font-bold w-16">No</th>
                        <th class="px-6 py-5 font-bold">Informasi Produk</th>
                        <th class="px-6 py-5 font-bold">Harga</th>
                        <th class="px-6 py-5 font-bold text-center">Stok</th>
                        <th class="px-6 py-5 font-bold text-center">Status</th>
                        <th class="px-6 py-5 font-bold text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-100">
                    
                    @forelse($produks as $index => $p)
                    <tr class="hover:bg-blue-50/30 transition-colors group">
                        <td class="px-6 py-4 font-bold text-slate-500">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-lg bg-blue-100 border border-blue-200 flex-shrink-0 flex items-center justify-center text-blue-500 overflow-hidden">
                                    @if($p->gambar)
                                        <!-- Tampilkan gambar dari database jika ada -->
                                        <img src="{{ asset('storage/' . $p->gambar) }}" alt="{{ $p->nama_produk }}" class="w-full h-full object-cover">
                                    @else
                                        <!-- Icon default jika tidak ada gambar -->
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    @endif
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 text-base">{{ $p->nama_produk }}</h4>
                                    <!-- Logika untuk menampilkan badge berdasarkan jenis produk. Sesuaikan 'jenis' dengan nama field di tabelmu -->
                                    <span class="inline-block mt-1 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider {{ ($p->jenis ?? 'satuan') == 'bundling' ? 'bg-purple-100 text-purple-700' : 'bg-slate-100 text-slate-600' }}">
                                        {{ ucfirst($p->jenis ?? 'Satuan') }}
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-extrabold text-slate-800">Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 font-bold text-center {{ $p->stok > 0 ? 'text-slate-700' : 'text-red-600' }}">
                            {{ $p->stok }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($p->stok > 0)
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">Aktif</span>
                            @else
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 border border-red-200">Habis</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <!-- Tombol Edit (Arahkan ke route edit nanti) -->
                                <a href="#" class="p-2 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-600 hover:text-white transition-colors" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>
                                <!-- Tombol Hapus (Bisa dibuat form DELETE nanti) -->
                                <button class="p-2 text-red-600 bg-red-50 rounded-lg hover:bg-red-600 hover:text-white transition-colors" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-slate-500 font-medium">Belum ada produk. Silakan tambah produk baru.</td>
                    </tr>
                    @endforelse
                    
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Placeholder -->
        <div class="px-6 py-4 border-t border-slate-100 flex items-center justify-between text-sm text-slate-500 font-medium">
            <span>Menampilkan data produk</span>
            <!-- Nanti bisa diganti dengan $produks->links() jika menggunakan paginasi Laravel -->
            <div class="flex gap-1">
                <button class="px-3 py-1 rounded bg-slate-100 text-slate-400 cursor-not-allowed">Sebelumnya</button>
                <button class="px-3 py-1 rounded bg-blue-600 text-white font-bold shadow-md shadow-blue-500/20">1</button>
                <button class="px-3 py-1 rounded bg-slate-100 hover:bg-slate-200 text-slate-700 transition-colors">Selanjutnya</button>
            </div>
        </div>

    </div>
</div>
@endsection