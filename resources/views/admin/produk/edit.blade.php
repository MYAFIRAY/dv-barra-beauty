@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800">Edit Produk</h1>
            <p class="text-sm text-slate-500">Perbarui informasi, harga, stok, atau foto produk.</p>
        </div>
        <a href="{{ route('admin.produk.index') }}" class="px-4 py-2 bg-slate-100 text-slate-700 font-bold text-sm rounded-xl hover:bg-slate-200">
            ← Kembali
        </a>
    </div>

    <div class="bg-white p-6 md:p-8 rounded-2xl border border-slate-100 shadow-sm">
        <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:border-blue-500 outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Kategori</label>
                <select name="kategori" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:border-blue-500 outline-none">
                    @foreach(['Skincare', 'Makeup', 'Bundling', 'Wardah', 'Scarlett'] as $kat)
                        <option value="{{ $kat }}" {{ old('kategori', $produk->kategori) == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Harga (Rp)</label>
                    <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:border-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Stok</label>
                    <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:border-blue-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Deskripsi Produk</label>
                <textarea name="deskripsi" rows="4" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm font-medium focus:border-blue-500 outline-none">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Foto Produk (Kosongkan jika tidak ingin mengganti)</label>
                @if($produk->gambar)
                    <div class="mb-3">
                        <img src="{{ asset(str_starts_with($produk->gambar, 'images/') ? $produk->gambar : 'storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="w-24 h-24 rounded-xl object-cover border border-slate-200">
                    </div>
                @endif
                <input type="file" name="gambar" accept="image/*" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm">
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full py-3.5 bg-blue-600 text-white font-extrabold text-sm rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-500/20">
                    Simpan Perubahan Produk
                </button>
            </div>
        </form>
    </div>
</div>
@endsection