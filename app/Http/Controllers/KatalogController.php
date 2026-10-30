<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        // 1. Tangkap kata kunci pencarian jika ada (dari search bar di navbar)
        $search = $request->query('search');

        // 2. Query dasar produk (ambil yang stoknya lebih dari 0 dan urutkan dari terbaru)
        $query = Produk::where('stok', '>', 0)->orderBy('created_at', 'desc');

        // 3. Jika ada input pencarian, saring berdasarkan nama produk
        if ($search) {
            $query->where('nama_produk', 'like', "%{$search}%");
        }

        // 4. Ambil datanya
        $produks = $query->get();

        // 5. Kirim data ke tampilan halaman depan
      return view('customer.katalog', compact('produks'));
    }
}