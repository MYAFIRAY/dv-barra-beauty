@extends('layouts.owner')

@section('title', 'Pengaturan Sistem Toko')

@section('content')
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 text-sm rounded-2xl font-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Pengaturan Informasi Toko -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm">
            <h3 class="text-base font-extrabold text-slate-800 mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-dv-main" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                Informasi & Banner Toko
            </h3>
            <form action="{{ route('owner.pengaturan.update') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Toko</label>
                    <input type="text" name="nama_toko" value="{{ $pengaturan['nama_toko'] }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:border-dv-main">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nomor WhatsApp CS</label>
                    <input type="text" name="no_wa_cs" value="{{ $pengaturan['no_wa_cs'] }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:border-dv-main">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Teks Topbar Promo (Header)</label>
                    <input type="text" name="teks_promo" value="{{ $pengaturan['teks_promo'] }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:border-dv-main">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Alamat Fisik (Invoice)</label>
                    <textarea name="alamat" rows="3" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:border-dv-main">{{ $pengaturan['alamat'] }}</textarea>
                </div>
                <button type="submit" class="w-full py-3.5 bg-dv-main text-white font-extrabold text-sm rounded-xl hover:bg-dv-dark">Simpan Perubahan</button>
            </form>
        </div>

        <!-- Pengaturan Integrasi Midtrans -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm h-fit">
            <h3 class="text-base font-extrabold text-slate-800 mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-dv-main" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                Kredensial Midtrans (Payment Gateway)
            </h3>
            <div class="space-y-4">
                <div class="p-4 bg-amber-50 border border-amber-200 rounded-xl text-amber-700 text-xs font-bold">
                    ⚠️ Pengaturan API Key Midtrans saat ini diatur melalui file <code>.env</code> untuk keamanan server.
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Client Key</label>
                    <input type="text" disabled value="{{ config('services.midtrans.client_key') }}" class="w-full px-4 py-3 bg-slate-100 border border-slate-200 rounded-xl text-sm text-slate-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Server Key</label>
                    <input type="password" disabled value="{{ config('services.midtrans.server_key') }}" class="w-full px-4 py-3 bg-slate-100 border border-slate-200 rounded-xl text-sm text-slate-500">
                </div>
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-200">
                    <span class="text-sm font-bold text-slate-700">Mode Sandbox (Testing)</span>
                    <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-extrabold rounded-full">Aktif</span>
                </div>
            </div>
        </div>
    </div>
@endsection