@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Header Halaman -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-1">
                <a href="/pengaturan" class="hover:text-blue-600 transition-colors">Pengaturan</a>
                <span>/</span>
                <span class="text-blue-600 font-bold">Keamanan</span>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Keamanan</h1>
            <p class="text-slate-500 mt-1 font-medium">Jaga keamanan akun Anda dengan pengaturan berikut.</p>
        </div>
        
        <a href="/pengaturan" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-slate-700 font-bold rounded-xl shadow-sm hover:bg-slate-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <!-- Form Ubah Password -->
    <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-8">
        <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-4 mb-6 text-blue-600">Ubah Password</h3>
        
        <form action="#" class="space-y-5 max-w-xl">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Password Lama</label>
                <input type="password" placeholder="Masukkan Password Lama" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-medium placeholder-slate-400">
            </div>
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Password Baru</label>
                <input type="password" placeholder="Masukkan Password Baru" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-medium placeholder-slate-400">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Konfirmasi Password</label>
                <input type="password" placeholder="Konfirmasi Password Baru" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-medium placeholder-slate-400">
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-3.5 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:scale-[1.02] transition-transform text-sm">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection