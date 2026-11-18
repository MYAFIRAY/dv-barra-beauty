<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Hitung pesanan yang masuk (Status: Baru)
        $pesananBaru = Pesanan::where('status_pesanan', 'Baru')->count();
        
        // 2. Hitung pesanan yang sedang diproses / dikirim
        $pesananDiproses = Pesanan::whereIn('status_pesanan', ['Diproses', 'Dikirim'])->count();
        
        // 3. Hitung total produk yang ada di katalog
        $totalProduk = Produk::count();

        // 4. Ambil 5 pesanan terbaru untuk ditampilkan di tabel ringkasan dashboard
        $pesananTerbaru = Pesanan::latest()->take(5)->get();

        // Kirim data ke file view resources/views/admin/dashboard/index.blade.php
        return view('admin.dashboard.index', compact(
            'pesananBaru', 
            'pesananDiproses', 
            'totalProduk',
            'pesananTerbaru'
        ));
    }
}