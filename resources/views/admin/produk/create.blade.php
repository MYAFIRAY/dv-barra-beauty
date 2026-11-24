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

    <!-- Form Container (Route action dan method POST sudah diset) -->
    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    
    <div>
        <label class="block text-sm font-bold mb-1">Nama Produk</label>
        <input type="text" name="nama_produk" required class="w-full border rounded-xl px-4 py-2.5">
    </div>

    <div>
        <label class="block text-sm font-bold mb-1">Kategori</label>
        <select name="kategori" required class="w-full border rounded-xl px-4 py-2.5">
            <option value="">-- Pilih Kategori --</option>
            <option value="Skincare">Skincare</option>
            <option value="Makeup">Makeup</option>
            <option value="Bundling">Bundling</option>
            <option value="Wardah">Wardah</option>
            <option value="Scarlett">Scarlett</option>
        </select>
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-bold mb-1">Harga (Rp)</label>
            <input type="number" name="harga" required class="w-full border rounded-xl px-4 py-2.5">
        </div>
        <div>
            <label class="block text-sm font-bold mb-1">Stok</label>
            <input type="number" name="stok" required class="w-full border rounded-xl px-4 py-2.5">
        </div>
    </div>

    <div>
        <label class="block text-sm font-bold mb-1">Deskripsi Produk</label>
        <textarea name="deskripsi" rows="3" class="w-full border rounded-xl px-4 py-2.5"></textarea>
    </div>

    <div>
        <label class="block text-sm font-bold mb-1">Foto Produk</label>
        <input type="file" name="gambar" accept="image/*" required class="w-full border rounded-xl px-4 py-2">
    </div>

    <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-xl">
        Simpan Produk
    </button>
</form>

</div>
@endsection