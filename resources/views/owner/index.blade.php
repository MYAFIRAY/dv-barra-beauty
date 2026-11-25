@extends('layouts.owner')

@section('title', 'Ringkasan Bisnis')

@section('content')
    <!-- Bar Filter Tanggal -->
    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm mb-8 flex flex-col md:flex-row items-center justify-between gap-4 no-print">
        <form action="{{ route('owner.dashboard') }}" method="GET" class="flex items-center gap-3 w-full md:w-auto">
            <input type="date" name="tanggal_mulai" value="{{ $tanggalMulai }}" class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-600 focus:outline-none focus:border-dv-main">
            <span class="text-xs font-bold text-slate-400">s/d</span>
            <input type="date" name="tanggal_selesai" value="{{ $tanggalSelesai }}" class="px-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-600 focus:outline-none focus:border-dv-main">
            <button type="submit" class="px-5 py-2 bg-dv-main text-white font-extrabold text-xs rounded-xl hover:bg-dv-dark transition-colors">Filter</button>
            @if($tanggalMulai || $tanggalSelesai)
                <a href="{{ route('owner.dashboard') }}" class="px-3 py-2 bg-slate-100 text-slate-500 font-bold text-xs rounded-xl hover:bg-slate-200">Reset</a>
            @endif
        </form>
        
    </div>

    <!-- Kartu Statistik Utama -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <div class="w-12 h-12 bg-dv-bg text-dv-main rounded-2xl flex items-center justify-center font-bold text-lg mb-4">💰</div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Total Omzet</p>
            <h3 class="text-xl font-extrabold text-slate-800">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center font-bold text-lg mb-4">📦</div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Transaksi Masuk</p>
            <h3 class="text-xl font-extrabold text-slate-800">{{ $totalPesanan }} Pesanan</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-2xl flex items-center justify-center font-bold text-lg mb-4">⏳</div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Belum Dibayar</p>
            <h3 class="text-xl font-extrabold text-slate-800">{{ $pesananPending }} Pesanan</h3>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <div class="w-12 h-12 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center font-bold text-lg mb-4">⚠️</div>
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Peringatan Stok (≤5)</p>
            <h3 class="text-xl font-extrabold text-slate-800">{{ $produkHampirHabis }} Item</h3>
        </div>
    </div>

    <!-- Grafik dan Best Seller -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
        <!-- Grafik Dummy Penjualan -->
        <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-sm p-6 no-print">
            <h3 class="text-base font-extrabold text-slate-800 mb-6">Tren Penjualan (Bulan Ini)</h3>
            <canvas id="salesChart" height="100"></canvas>
        </div>

        <!-- Produk Terlaris -->
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
            <h3 class="text-base font-extrabold text-slate-800 mb-6 flex items-center gap-2">🔥 Best Seller</h3>
            <div class="space-y-4">
                @forelse($produkTerlaris as $pt)
                    <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl border border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white rounded-lg overflow-hidden border border-slate-200">
                                @if($pt->produk && $pt->produk->gambar)
                                    <img src="{{ asset('images/produk/' . $pt->produk->gambar) }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div>
                                <h4 class="font-bold text-slate-800 text-xs line-clamp-1">{{ $pt->produk->nama_produk ?? 'Dihapus' }}</h4>
                                <span class="text-[10px] font-semibold text-slate-400">Terjual: {{ $pt->total_terjual }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 py-4 text-center">Belum ada data penjualan.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Konfigurasi Grafik Chart.js
    const ctx = document.getElementById('salesChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
            datasets: [{
                label: 'Total Pendapatan (Rp)',
                data: [1500000, 3200000, 2800000, {{ $totalPendapatan }}], // Dummy data di awal, total asli di akhir
                borderColor: '#2b5a8e',
                backgroundColor: 'rgba(43, 90, 142, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });
</script>
@endpush