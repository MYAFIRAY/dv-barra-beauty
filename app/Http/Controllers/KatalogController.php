<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Wajib dipanggil agar bisa akses tabel produks

class KatalogController extends Controller
{
    public function index()
    {
        // Mengambil semua data produk dari database MySQL
        $produks = Produk::all();
        
        // Melempar variabel $produks ke halaman view katalog
        return view('customer.katalog', compact('produks'));
    }
}