@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
    
    <!-- Header Halaman & Breadcrumb -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-1">
                <a href="/produk" class="hover:text-blue-600 transition-colors">Produk</a>
                <span>/</span>
                <span class="text-blue-600 font-bold">Tambah Baru</span>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Tambah Produk</h1>
            <p class="text-slate-500 mt-1 font-medium">Lengkapi informasi produk baru atau paket bundling Anda.</p>
        </div>
        
        <!-- Tombol Kembali -->
        <a href="/produk" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-slate-700 font-bold rounded-xl shadow-sm hover:bg-slate-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <!-- Form Container -->
    <form action="#" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Kolom Kiri: Informasi Produk (Porsi 2/3) -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-8">
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-4 mb-6">Informasi Produk</h3>
                
                <div class="space-y-5">
                    <!-- Nama Produk -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Produk</label>
                        <input type="text" placeholder="Masukkan Nama Produk" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-medium placeholder-slate-400">
                    </div>

                    <!-- Grid Harga & Stok -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Harga Produk</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <span class="text-slate-400 font-bold">Rp</span>
                                </div>
                                <input type="number" placeholder="0" class="w-full pl-12 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-medium placeholder-slate-400">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Stok Produk</label>
                            <input type="number" placeholder="Masukkan Jumlah Stok" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-medium placeholder-slate-400">
                        </div>
                    </div>

                    <!-- Kategori / Jenis Produk (Tambahan untuk logika Bundling) -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Jenis Penjualan</label>
                        <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-medium appearance-none cursor-pointer">
                            <option value="satuan">Produk Satuan</option>
                            <option value="bundling">Paket Bundling</option>
                        </select>
                    </div>

                    <!-- Deskripsi Produk -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Produk</label>
                        <textarea rows="4" placeholder="Masukkan Deskripsi Produk" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-medium placeholder-slate-400 resize-none"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Upload Gambar & Tombol (Porsi 1/3) -->
        <div class="lg:col-span-1 space-y-6">
            
            <!-- Area Upload -->
            <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-6 flex flex-col items-center justify-center text-center">
                
                <div class="w-full h-56 border-2 border-dashed border-blue-200 bg-blue-50/50 rounded-xl flex flex-col items-center justify-center cursor-pointer hover:bg-blue-50 transition-colors group relative overflow-hidden">
                    <svg class="w-12 h-12 text-blue-400 group-hover:scale-110 transition-transform mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <span class="text-sm font-bold text-blue-700">Tambah Gambar Produk</span>
                    <span class="text-xs font-medium text-slate-500 mt-1">Klik untuk memilih gambar</span>
                    
                    <!-- Input File Hidden (Agar bisa diklik seluruh areanya) -->
                    <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                </div>
                
                <p class="text-[11px] text-slate-400 mt-4 font-medium">Format: JPG, PNG, atau JPEG. Maksimal 2MB.</p>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex gap-3">
                <a href="/produk" class="flex-1 py-3.5 bg-white border border-slate-200 text-slate-600 font-bold rounded-xl shadow-sm hover:bg-slate-50 transition-colors text-center text-sm">
                    Batal
                </a>
                <button type="submit" class="flex-1 py-3.5 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:scale-[1.02] transition-transform text-sm">
                    Simpan Produk
                </button>
            </div>

        </div>
    </form>

</div>
@endsection