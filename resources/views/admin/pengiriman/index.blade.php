@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Pengiriman</h1>
        <p class="text-slate-500 mt-1 font-medium">Kelola resi pengiriman untuk pesanan yang sedang diproses.</p>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl font-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 overflow-hidden flex flex-col">
        <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-6 bg-slate-50/50">
            <div class="flex items-center gap-2">
                <span class="px-5 py-2.5 bg-blue-100 text-blue-700 font-bold text-sm rounded-xl">Pesanan Siap Kirim</span>
            </div>
            <form action="{{ route('admin.pengiriman') }}" method="GET" class="relative w-full md:w-64 flex-shrink-0">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Resi / Nama..." class="w-full pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all font-medium placeholder-slate-400 shadow-sm">
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white text-slate-400 text-xs uppercase tracking-widest border-b border-slate-100">
                        <th class="px-6 py-5 font-bold">Pesanan</th>
                        <th class="px-6 py-5 font-bold">Kurir</th>
                        <th class="px-6 py-5 font-bold">Input Resi & Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-slate-100">
                    @forelse($pengirimans as $p)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <p class="font-bold text-blue-600">{{ $p->no_pesanan }}</p>
                            <p class="font-semibold text-slate-600 mt-1">{{ $p->nama_pelanggan }}</p>
                            <p class="text-xs text-slate-400 font-medium">{{ $p->alamat }}</p>
                        </td>
                        <td class="px-6 py-4 font-extrabold text-slate-700">{{ $p->kurir }}</td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.pengiriman.update', $p->id) }}" method="POST" class="flex gap-2">
                                @csrf
                                <input type="text" name="no_resi" value="{{ $p->no_resi }}" placeholder="Ketik nomor resi..." class="px-3 py-2 bg-white border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 font-bold text-slate-700 w-48" required>
                                <button type="submit" class="px-4 py-2 bg-slate-800 text-white font-bold rounded-lg hover:bg-blue-600 transition-colors text-xs">Simpan Resi</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-12 text-center text-slate-500 font-medium">Tidak ada paket yang menunggu dikirim.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection