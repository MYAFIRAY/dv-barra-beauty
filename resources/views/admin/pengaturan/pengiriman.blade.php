@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Header Halaman -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-1">
                <a href="/pengaturan" class="hover:text-blue-600 transition-colors">Pengaturan</a>
                <span>/</span>
                <span class="text-blue-600 font-bold">Jasa Pengiriman</span>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Atur Jasa Pengiriman</h1>
            <p class="text-slate-500 mt-1 font-medium">Aktifkan kurir ekspedisi dan atur tarif pengiriman lokal toko Anda.</p>
        </div>
        
        <a href="/pengaturan" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-slate-700 font-bold rounded-xl shadow-sm hover:bg-slate-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <!-- Form Pengaturan Ekspedisi -->
    <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-8">
        
        <form action="#" class="space-y-8">
            
            <!-- Pengiriman Lokal (Toko) -->
            <div>
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-3 mb-5 text-blue-600">Pengiriman Lokal (Kurir Toko)</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
                    <label class="flex items-start gap-4 p-5 border-2 border-blue-500 bg-blue-50/50 rounded-xl cursor-pointer">
                        <div class="mt-0.5">
                            <input type="checkbox" checked class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                        </div>
                        <div>
                            <span class="block font-bold text-slate-800 text-lg">Kurir Lokal Padang</span>
                            <span class="block text-sm text-slate-500 mt-1 font-medium">Pengiriman langsung oleh kurir internal DV BARRA untuk area Koto Tangah dan sekitarnya.</span>
                        </div>
                    </label>

                    <!-- Set Tarif Flat -->
                    <div class="bg-slate-50 p-5 rounded-xl border border-slate-200">
                        <label class="block text-sm font-bold text-slate-700 mb-2">Tarif Flat (Ongkir Lokal)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-slate-400 font-bold">Rp</span>
                            </div>
                            <input type="number" value="15000" class="w-full pl-12 pr-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-bold shadow-sm">
                        </div>
                        <p class="text-xs text-slate-400 mt-2 font-medium">*Tarif ini akan ditambahkan otomatis ke total belanja pelanggan.</p>
                    </div>
                </div>
            </div>

            <!-- Pengiriman Nasional (Ekspedisi) -->
            <div>
                <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-3 mb-5">Ekspedisi Nasional</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <label class="flex items-center gap-3 p-4 border border-slate-200 bg-white rounded-xl cursor-pointer hover:border-blue-300 transition-colors">
                        <input type="checkbox" checked class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                        <span class="font-bold text-slate-700">JNE Express</span>
                    </label>
                    <label class="flex items-center gap-3 p-4 border border-slate-200 bg-white rounded-xl cursor-pointer hover:border-blue-300 transition-colors">
                        <input type="checkbox" checked class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                        <span class="font-bold text-slate-700">J&T Express</span>
                    </label>
                    <label class="flex items-center gap-3 p-4 border border-slate-200 bg-white rounded-xl cursor-pointer hover:border-blue-300 transition-colors">
                        <input type="checkbox" class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                        <span class="font-bold text-slate-700">SiCepat</span>
                    </label>
                </div>
            </div>

            <!-- Tombol Simpan -->
            <div class="pt-4 flex justify-end border-t border-slate-100">
                <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:scale-[1.02] transition-transform text-sm">
                    Simpan Jasa Pengiriman
                </button>
            </div>

        </form>
    </div>
</div>
@endsection