@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    
    <!-- Header Halaman -->
    <div>
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Pengaturan</h1>
        <p class="text-slate-500 mt-1 font-medium">Kelola pengaturan sistem dan preferensi toko Anda sesuai kebutuhan.</p>
    </div>

    <!-- Daftar Menu Pengaturan -->
    <div class="grid grid-cols-1 gap-4">
        
        <!-- Menu 1: Informasi Toko -->
        <a href="/pengaturan/informasi-toko" class="flex items-center p-5 bg-white rounded-2xl border border-slate-100 shadow-[0_2px_12px_rgba(0,0,0,0.02)] hover:shadow-lg hover:shadow-blue-500/10 hover:border-blue-200 transition-all group">
            <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-inner">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            </div>
            <div class="ml-5 flex-1">
                <h3 class="font-bold text-lg text-slate-800 group-hover:text-blue-600 transition-colors">Informasi Toko</h3>
                <p class="text-sm text-slate-500 font-medium mt-0.5">Atur Profil dan Informasi Anda</p>
            </div>
            <div class="text-slate-300 group-hover:text-blue-600 group-hover:translate-x-2 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </div>
        </a>

        <!-- Menu 2: Metode Pembayaran -->
        <a href="/pengaturan/metode-pembayaran" class="flex items-center p-5 bg-white rounded-2xl border border-slate-100 shadow-[0_2px_12px_rgba(0,0,0,0.02)] hover:shadow-lg hover:shadow-blue-500/10 hover:border-blue-200 transition-all group">
            <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-inner">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
            </div>
            <div class="ml-5 flex-1">
                <h3 class="font-bold text-lg text-slate-800 group-hover:text-blue-600 transition-colors">Metode Pembayaran</h3>
                <p class="text-sm text-slate-500 font-medium mt-0.5">Kelola Metode Pembayaran</p>
            </div>
            <div class="text-slate-300 group-hover:text-blue-600 group-hover:translate-x-2 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </div>
        </a>

        <!-- Menu 3: Pengiriman -->
        <a href="/pengaturan/pengiriman" class="flex items-center p-5 bg-white rounded-2xl border border-slate-100 shadow-[0_2px_12px_rgba(0,0,0,0.02)] hover:shadow-lg hover:shadow-blue-500/10 hover:border-blue-200 transition-all group">
            <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-inner">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
            </div>
            <div class="ml-5 flex-1">
                <h3 class="font-bold text-lg text-slate-800 group-hover:text-blue-600 transition-colors">Pengiriman</h3>
                <p class="text-sm text-slate-500 font-medium mt-0.5">Atur Jasa Pengiriman</p>
            </div>
            <div class="text-slate-300 group-hover:text-blue-600 group-hover:translate-x-2 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </div>
        </a>

        <a href="/pengaturan/notifikasi" class="flex items-center p-5 bg-white rounded-2xl border border-slate-100 shadow-[0_2px_12px_rgba(0,0,0,0.02)] hover:shadow-lg hover:shadow-blue-500/10 hover:border-blue-200 transition-all group">
    <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-inner">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
    </div>
    <div class="ml-5 flex-1">
        <h3 class="font-bold text-lg text-slate-800 group-hover:text-blue-600 transition-colors">Notifikasi</h3>
        <p class="text-sm text-slate-500 font-medium mt-0.5">Pengaturan Notifikasi</p>
    </div>
    <div class="text-slate-300 group-hover:text-blue-600 group-hover:translate-x-2 transition-all">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
    </div>
</a>

        <!-- Menu 5: Keamanan -->
        <a href="/pengaturan/keamanan" class="flex items-center p-5 bg-white rounded-2xl border border-slate-100 shadow-[0_2px_12px_rgba(0,0,0,0.02)] hover:shadow-lg hover:shadow-blue-500/10 hover:border-blue-200 transition-all group">
            <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-inner">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            <div class="ml-5 flex-1">
                <h3 class="font-bold text-lg text-slate-800 group-hover:text-blue-600 transition-colors">Keamanan</h3>
                <p class="text-sm text-slate-500 font-medium mt-0.5">Ubah Kata Sandi & Keamanan</p>
            </div>
            <div class="text-slate-300 group-hover:text-blue-600 group-hover:translate-x-2 transition-all">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
            </div>
        </a>

        <!-- Menu 6: Backup Data -->
        <a href="/pengaturan/backup" class="flex items-center p-5 bg-white rounded-2xl border border-slate-100 shadow-[0_2px_12px_rgba(0,0,0,0.02)] hover:shadow-lg hover:shadow-blue-500/10 hover:border-blue-200 transition-all group">
    <div class="w-14 h-14 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all shadow-inner">
        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
    </div>
    <div class="ml-5 flex-1">
        <h3 class="font-bold text-lg text-slate-800 group-hover:text-blue-600 transition-colors">Backup Data</h3>
        <p class="text-sm text-slate-500 font-medium mt-0.5">Cadangkan Data Toko</p>
    </div>
    <div class="text-slate-300 group-hover:text-blue-600 group-hover:translate-x-2 transition-all">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
    </div>
</a>

    </div>
</div>
@endsection