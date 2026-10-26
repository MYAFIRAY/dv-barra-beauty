@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Header Halaman -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-1">
                <a href="/pengaturan" class="hover:text-blue-600 transition-colors">Pengaturan</a>
                <span>/</span>
                <span class="text-blue-600 font-bold">Informasi Toko</span>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Informasi Toko</h1>
        </div>
        
        <a href="/pengaturan" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-slate-700 font-bold rounded-xl shadow-sm hover:bg-slate-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <!-- Form Container -->
    <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-8">
        
        <!-- Placeholder Logo Toko -->
        <div class="flex flex-col items-center justify-center mb-8">
            <div class="w-24 h-24 rounded-full bg-blue-50 border-4 border-white shadow-lg flex items-center justify-center text-blue-600 relative group cursor-pointer">
                <span class="text-3xl font-serif font-bold">IB</span>
                <div class="absolute inset-0 bg-black/40 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
            </div>
            <p class="text-sm font-bold text-slate-500 mt-3">Ubah Logo Toko</p>
        </div>

        <form action="#" class="space-y-5">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Toko</label>
                <input type="text" value="DV BARRA BEAUTY CHOICES" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-bold">
            </div>
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Lengkap</label>
                <input type="text" value="Jl. Raya Padang No. 123, Padang" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-bold">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Email Toko</label>
                <input type="email" value="Admin@gmail.com" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-bold">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nomor Telepon</label>
                <input type="text" value="086582862992" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-bold">
            </div>

            <div class="pt-4 flex justify-end">
                <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:scale-[1.02] transition-transform text-sm">
                    Simpan Perbaikan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection