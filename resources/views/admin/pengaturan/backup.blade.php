@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Header Halaman -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-1">
                <a href="/pengaturan" class="hover:text-blue-600 transition-colors">Pengaturan</a>
                <span>/</span>
                <span class="text-blue-600 font-bold">Backup Data</span>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Backup Data Database</h1>
            <p class="text-slate-500 mt-1 font-medium">Cadangkan seluruh data penjualan, produk, dan pelanggan toko Anda.</p>
        </div>
        
        <a href="/pengaturan" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-slate-700 font-bold rounded-xl shadow-sm hover:bg-slate-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <!-- Area Konten Backup -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <!-- Action Card -->
        <div class="md:col-span-1 bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-8 flex flex-col items-center justify-center text-center h-fit">
            <div class="w-24 h-24 bg-blue-50 rounded-full flex items-center justify-center text-blue-500 mb-6 shadow-inner relative group">
                <div class="absolute inset-0 bg-blue-100 rounded-full animate-ping opacity-20"></div>
                <svg class="w-12 h-12 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
            </div>
            <h3 class="font-bold text-slate-800 text-lg mb-2">Buat Backup Baru</h3>
            <p class="text-sm text-slate-500 font-medium mb-6">Unduh format SQL dari seluruh database Anda hari ini.</p>
            <button class="w-full py-3.5 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:scale-[1.02] transition-transform text-sm">
                Generate Backup (.sql)
            </button>
        </div>

        <!-- History Card -->
        <div class="md:col-span-2 bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 overflow-hidden">
            <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50">
                <h3 class="font-bold text-lg text-slate-800">Riwayat Pencadangan</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    
                    <!-- Item Riwayat 1 -->
                    <div class="flex items-center justify-between p-4 border border-slate-200 rounded-xl hover:border-blue-300 hover:bg-blue-50/50 transition-colors group">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-green-100 text-green-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800">backup-db-dvbarra-20261001.sql</h4>
                                <p class="text-xs text-slate-500 font-medium mt-0.5">1 Oktober 2026 • 2.4 MB</p>
                            </div>
                        </div>
                        <button class="text-blue-600 font-bold text-sm hover:underline opacity-0 group-hover:opacity-100 transition-opacity">Unduh Ulang</button>
                    </div>

                    <!-- Item Riwayat 2 -->
                    <div class="flex items-center justify-between p-4 border border-slate-200 rounded-xl hover:border-blue-300 hover:bg-blue-50/50 transition-colors group">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-green-100 text-green-600 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800">backup-db-dvbarra-20260901.sql</h4>
                                <p class="text-xs text-slate-500 font-medium mt-0.5">1 September 2026 • 2.1 MB</p>
                            </div>
                        </div>
                        <button class="text-blue-600 font-bold text-sm hover:underline opacity-0 group-hover:opacity-100 transition-opacity">Unduh Ulang</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection