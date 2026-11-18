@extends('layouts.owner')

@section('title', 'Laporan Keuangan')

@section('content')
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm mb-6 flex flex-col md:flex-row items-center justify-between gap-4 no-print">
        <form action="{{ route('owner.laporan') }}" method="GET" class="flex items-center gap-3">
            <input type="date" name="tanggal_mulai" value="{{ $tanggalMulai }}" class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-dv-main">
            <span class="text-xs font-bold text-slate-400">s/d</span>
            <input type="date" name="tanggal_selesai" value="{{ $tanggalSelesai }}" class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-dv-main">
            <button type="submit" class="px-5 py-2.5 bg-dv-main text-white font-extrabold text-sm rounded-xl hover:bg-dv-dark transition-colors">Filter Rekap</button>
            @if($tanggalMulai)
                <a href="{{ route('owner.laporan') }}" class="px-4 py-2.5 bg-slate-100 text-slate-600 font-bold text-sm rounded-xl">Reset</a>
            @endif
        </form>
        <button onclick="window.print()" class="px-5 py-2.5 bg-green-500 text-white font-extrabold text-sm rounded-xl hover:bg-green-600 shadow-lg shadow-green-500/30 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            Cetak PDF Laporan
        </button>
    </div>

    <!-- Kop Surat (Hanya Muncul Saat Diprint) -->
    <div class="hidden print:block text-center mb-8 border-b-2 border-slate-800 pb-4">
        <h1 class="text-2xl font-extrabold text-slate-800">DV BARRA BEAUTY</h1>
        <p class="text-sm text-slate-600">Laporan Rekapitulasi Pendapatan Penjualan</p>
        <p class="text-sm text-slate-600">Periode: {{ $tanggalMulai ? \Carbon\Carbon::parse($tanggalMulai)->format('d M Y') . ' - ' . \Carbon\Carbon::parse($tanggalSelesai)->format('d M Y') : 'Semua Waktu' }}</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-lg font-extrabold text-slate-800 no-print">Data Penjualan (Paid)</h3>
            <div class="text-right">
                <p class="text-xs font-bold text-slate-400 uppercase">Total Omzet Periode Ini</p>
                <p class="text-2xl font-extrabold text-dv-main">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</p>
            </div>
        </div>

        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b-2 border-slate-100 text-xs font-bold text-slate-500 uppercase">
                    <th class="py-3">Tanggal</th>
                    <th class="py-3">No Pesanan</th>
                    <th class="py-3">Pelanggan</th>
                    <th class="py-3">Item Dibeli</th>
                    <th class="py-3 text-right">Nominal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50 text-sm">
                @forelse($laporan as $p)
                <tr>
                    <td class="py-3 text-slate-500">{{ $p->created_at->format('d/m/Y') }}</td>
                    <td class="py-3 font-bold text-dv-main">{{ $p->no_pesanan }}</td>
                    <td class="py-3 text-slate-700">{{ $p->nama_pelanggan }}</td>
                    <td class="py-3 text-slate-500 text-xs">{{ $p->rincian->count() }} macam produk</td>
                    <td class="py-3 font-extrabold text-slate-800 text-right">Rp {{ number_format($p->total_tagihan, 0, ',', '.') }}</td>
                </tr>
                @empty
                <tr><td colspan="5" class="py-8 text-center text-slate-400">Tidak ada data penjualan lunas.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection