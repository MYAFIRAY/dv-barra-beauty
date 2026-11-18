<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\PesananDetail; // <--- Diperbaiki sesuai nama file asli di projectmu
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    public function index(Request $request)
    {
        // 1. Fitur Filter Rentang Tanggal
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        $queryPesanan = Pesanan::query();
        if ($tanggalMulai && $tanggalSelesai) {
            $queryPesanan->whereBetween('created_at', [$tanggalMulai . ' 00:00:00', $tanggalSelesai . ' 23:59:59']);
        }

        // 2. Statistik Utama
        $totalPendapatan = (clone $queryPesanan)->where('status_pembayaran', 'Sudah Dibayar')->sum('total_tagihan');
        $totalPesanan = (clone $queryPesanan)->count();
        $pesananPending = (clone $queryPesanan)->where('status_pembayaran', 'Belum Dibayar')->count();
        
        $totalProduk = Produk::count();
        $produkHampirHabis = Produk::where('stok', '<=', 5)->count();

        // 3. Tabel Riwayat Pesanan
        $pesananTerbaru = $queryPesanan->orderBy('created_at', 'desc')->paginate(10);

        // 4. Produk Terlaris (Best Seller) menggunakan model PesananDetail
        $produkTerlaris = PesananDetail::select('produk_id', DB::raw('SUM(jumlah) as total_terjual'))
            ->groupBy('produk_id')
            ->orderBy('total_terjual', 'desc')
            ->take(5)
            ->with('produk')
            ->get();

        return view('owner.index', compact(
            'totalPendapatan', 
            'totalPesanan', 
            'pesananPending', 
            'totalProduk', 
            'produkHampirHabis', 
            'pesananTerbaru', 
            'produkTerlaris',
            'tanggalMulai',
            'tanggalSelesai'
        ));
    }

    public function laporan(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');

        // Hanya ambil pesanan yang sudah dibayar untuk laporan keuangan
        $query = Pesanan::where('status_pembayaran', 'Sudah Dibayar')->with('rincian.produk');

        if ($tanggalMulai && $tanggalSelesai) {
            $query->whereBetween('created_at', [$tanggalMulai . ' 00:00:00', $tanggalSelesai . ' 23:59:59']);
        }

        $laporan = $query->orderBy('created_at', 'desc')->get();
        $totalPendapatan = $laporan->sum('total_tagihan');

        return view('owner.laporan', compact('laporan', 'totalPendapatan', 'tanggalMulai', 'tanggalSelesai'));
    }
}