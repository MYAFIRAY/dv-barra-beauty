@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Header Halaman -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-1">
                <a href="/pengaturan" class="hover:text-blue-600 transition-colors">Pengaturan</a>
                <span>/</span>
                <span class="text-blue-600 font-bold">Metode Pembayaran</span>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Metode Pembayaran</h1>
            <p class="text-slate-500 mt-1 font-medium">Konfigurasi API Payment Gateway dan aktifkan channel pembayaran.</p>
        </div>
        
        <a href="/pengaturan" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-slate-700 font-bold rounded-xl shadow-sm hover:bg-slate-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <!-- Form Konfigurasi API -->
    <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-8">
        <h3 class="text-lg font-bold text-slate-800 border-b border-slate-100 pb-4 mb-6">Konfigurasi Payment Gateway (Midtrans/Xendit)</h3>
        
        <form action="#" class="space-y-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Environment (Mode)</label>
                    <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-bold appearance-none">
                        <option value="sandbox">Sandbox (Testing)</option>
                        <option value="production">Production (Live)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Provider Gateway</label>
                    <select class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-bold appearance-none">
                        <option value="midtrans">Midtrans</option>
                        <option value="xendit">Xendit</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Client Key</label>
                <input type="text" value="SB-Mid-client-xxxxxxxxxxxxxx" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-mono">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Server Key</label>
                <input type="password" value="SB-Mid-server-xxxxxxxxxxxxxx" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all text-slate-800 font-mono">
            </div>

            <!-- Toggle Channels (Visual) -->
            <div class="pt-6 mt-6 border-t border-slate-100">
                <h4 class="font-bold text-slate-700 mb-4">Channel Pembayaran Aktif</h4>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <label class="flex items-center gap-3 p-4 border border-blue-200 bg-blue-50 rounded-xl cursor-pointer">
                        <input type="checkbox" checked class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                        <span class="font-bold text-slate-700">QRIS</span>
                    </label>
                    <label class="flex items-center gap-3 p-4 border border-blue-200 bg-blue-50 rounded-xl cursor-pointer">
                        <input type="checkbox" checked class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                        <span class="font-bold text-slate-700">BCA VA</span>
                    </label>
                    <label class="flex items-center gap-3 p-4 border border-blue-200 bg-blue-50 rounded-xl cursor-pointer">
                        <input type="checkbox" checked class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                        <span class="font-bold text-slate-700">Mandiri VA</span>
                    </label>
                    <label class="flex items-center gap-3 p-4 border border-slate-200 bg-slate-50 rounded-xl cursor-pointer">
                        <input type="checkbox" class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                        <span class="font-bold text-slate-500">ShopeePay</span>
                    </label>
                </div>
            </div>

            <div class="pt-6 flex justify-end">
                <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:scale-[1.02] transition-transform text-sm">
                    Simpan Konfigurasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection