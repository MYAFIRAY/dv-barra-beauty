@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    
    <!-- Header Halaman -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-slate-500 font-medium mb-1">
                <a href="/pengaturan" class="hover:text-blue-600 transition-colors">Pengaturan</a>
                <span>/</span>
                <span class="text-blue-600 font-bold">Notifikasi</span>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Notifikasi Sistem</h1>
            <p class="text-slate-500 mt-1 font-medium">Pilih aktivitas apa saja yang ingin Anda terima pemberitahuannya.</p>
        </div>
        
        <a href="/pengaturan" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-white border border-slate-200 text-slate-700 font-bold rounded-xl shadow-sm hover:bg-slate-50 transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali
        </a>
    </div>

    <!-- Form Notifikasi -->
    <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-8">
        
        <div class="space-y-6">
            
            <!-- Item 1: Pesanan Baru -->
            <div class="flex items-center justify-between py-4 border-b border-slate-100">
                <div>
                    <h3 class="font-bold text-slate-800 text-lg">Pesanan Baru</h3>
                    <p class="text-sm text-slate-500 font-medium mt-1">Dapatkan notifikasi sistem dan email setiap ada pesanan masuk.</p>
                </div>
                <!-- Toggle Switch -->
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div class="w-14 h-7 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-500 shadow-inner"></div>
                </label>
            </div>

            <!-- Item 2: Status Pembayaran -->
            <div class="flex items-center justify-between py-4 border-b border-slate-100">
                <div>
                    <h3 class="font-bold text-slate-800 text-lg">Pembayaran Tervalidasi</h3>
                    <p class="text-sm text-slate-500 font-medium mt-1">Pemberitahuan ketika payment gateway berhasil memverifikasi pembayaran.</p>
                </div>
                <!-- Toggle Switch -->
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div class="w-14 h-7 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-500 shadow-inner"></div>
                </label>
            </div>

            <!-- Item 3: Stok Menipis -->
            <div class="flex items-center justify-between py-4 border-b border-slate-100">
                <div>
                    <h3 class="font-bold text-slate-800 text-lg">Peringatan Stok Habis</h3>
                    <p class="text-sm text-slate-500 font-medium mt-1">Sistem akan mengingatkan jika stok produk kosmetik di bawah 5 item.</p>
                </div>
                <!-- Toggle Switch -->
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer">
                    <div class="w-14 h-7 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-500 shadow-inner"></div>
                </label>
            </div>

        </div>

        <div class="pt-8 flex justify-end">
            <button class="px-8 py-3.5 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:scale-[1.02] transition-transform text-sm">
                Simpan Preferensi
            </button>
        </div>
    </div>
</div>
@endsection