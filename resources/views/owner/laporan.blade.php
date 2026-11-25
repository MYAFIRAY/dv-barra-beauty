
@extends('layouts.owner')

@section('title', 'Laporan Keuangan')

@section('content')

    {{-- Filter Tanggal dan Tombol Cetak --}}
    <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm mb-6 flex flex-col md:flex-row items-center justify-between gap-4 no-print">

        <form action="{{ route('owner.laporan') }}" method="GET"
              class="flex flex-wrap items-center gap-3">

            <input type="date"
                   name="tanggal_mulai"
                   value="{{ $tanggalMulai }}"
                   class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-dv-main">

            <span class="text-xs font-bold text-slate-400">s/d</span>

            <input type="date"
                   name="tanggal_selesai"
                   value="{{ $tanggalSelesai }}"
                   class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-dv-main">

            <button type="submit"
                    class="px-5 py-2.5 bg-dv-main text-white font-extrabold text-sm rounded-xl hover:bg-dv-dark transition-colors">
                Filter Rekap
            </button>

            @if($tanggalMulai || $tanggalSelesai)
                <a href="{{ route('owner.laporan') }}"
                   class="px-4 py-2.5 bg-slate-100 text-slate-600 font-bold text-sm rounded-xl">
                    Reset
                </a>
            @endif
        </form>

        <button onclick="window.print()"
                type="button"
                class="px-5 py-2.5 bg-green-500 text-white font-extrabold text-sm rounded-xl hover:bg-green-600 shadow-lg shadow-green-500/30 flex items-center gap-2">

            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4H9v4a2 2 0 002 2zm6-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                </path>
            </svg>

            Cetak PDF Laporan
        </button>
    </div>


    {{-- AREA KHUSUS CETAK PDF --}}
    <div class="print-area">

        {{-- Kop Laporan --}}
        <div class="hidden print:block text-center mb-8 pb-5 border-b-2 border-slate-800">

            <h1 class="text-2xl font-extrabold text-slate-800">
                DV BARRA BEAUTY
            </h1>

            <p class="text-sm text-slate-600 mt-2">
                LAPORAN REKAPITULASI PENDAPATAN PENJUALAN
            </p>

            <p class="text-sm text-slate-600 mt-1">
                Periode:

                @if($tanggalMulai && $tanggalSelesai)
                    {{ \Carbon\Carbon::parse($tanggalMulai)->format('d/m/Y') }}
                    -
                    {{ \Carbon\Carbon::parse($tanggalSelesai)->format('d/m/Y') }}
                @else
                    Semua Waktu
                @endif
            </p>

        </div>


        {{-- Isi Laporan --}}
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6">

            {{-- Ringkasan Total Omzet --}}
            <div class="flex justify-between items-center mb-6">

                <h3 class="text-lg font-extrabold text-slate-800 no-print">
                    Data Penjualan (Paid)
                </h3>

                <div class="text-right">
                    <p class="text-xs font-bold text-slate-400 uppercase">
                        Total Omzet Periode Ini
                    </p>

                    <p class="text-2xl font-extrabold text-dv-main">
                        Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                    </p>
                </div>

            </div>


            {{-- Tabel Penjualan --}}
            <div class="w-full">

                <table class="w-full text-left border-collapse">

                    <thead>
                        <tr class="border-b-2 border-slate-200 text-xs font-bold text-slate-600 uppercase">

                            <th class="py-3 px-2">
                                No
                            </th>

                            <th class="py-3 px-2">
                                Tanggal
                            </th>

                            <th class="py-3 px-2">
                                No Pesanan
                            </th>

                            <th class="py-3 px-2">
                                Pelanggan
                            </th>

                            <th class="py-3 px-2">
                                Item Dibeli
                            </th>

                            <th class="py-3 px-2 text-right">
                                Nominal
                            </th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 text-sm">

                        @forelse($laporan as $index => $p)

                            <tr>

                                <td class="py-3 px-2 text-slate-600">
                                    {{ $index + 1 }}
                                </td>

                                <td class="py-3 px-2 text-slate-600">
                                    {{ $p->created_at->format('d/m/Y') }}
                                </td>

                                <td class="py-3 px-2 font-bold text-dv-main">
                                    {{ $p->no_pesanan }}
                                </td>

                                <td class="py-3 px-2 text-slate-700">
                                    {{ $p->nama_pelanggan }}
                                </td>

                                <td class="py-3 px-2 text-slate-600">
                                    {{ $p->rincian->count() }} macam produk
                                </td>

                                <td class="py-3 px-2 font-extrabold text-slate-800 text-right">
                                    Rp {{ number_format($p->total_tagihan, 0, ',', '.') }}
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6"
                                    class="py-8 text-center text-slate-400">
                                    Tidak ada data penjualan lunas.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                    {{-- Total Pendapatan --}}
                    <tfoot>

                        <tr class="border-t-2 border-slate-300">

                            <td colspan="5"
                                class="py-4 px-2 text-right font-extrabold text-slate-800 uppercase">
                                Total Pendapatan
                            </td>

                            <td class="py-4 px-2 text-right font-extrabold text-dv-main">
                                Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                            </td>

                        </tr>

                    </tfoot>

                </table>

            </div>

            {{-- Keterangan --}}
            <div class="mt-8 text-xs text-slate-500">
                <p>
                    Keterangan: Laporan ini memuat transaksi penjualan
                    dengan status pembayaran sudah dibayar.
                </p>
            </div>

            {{-- Tanggal Cetak --}}
            <div class="hidden print:block text-right mt-10 text-sm text-slate-600">
                <p>
                    Dicetak pada:
                    {{ now()->format('d/m/Y H:i') }}
                </p>
            </div>

        </div>

    </div>

@endsection
