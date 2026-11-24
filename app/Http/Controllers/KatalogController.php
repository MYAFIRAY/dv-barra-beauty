<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        // 1. Tangkap kata kunci pencarian
        $search = $request->query('search');

        // 2. Query dasar produk
        $query = Produk::where('stok', '>', 0)->orderBy('created_at', 'desc');

        // 3. Jika ada pencarian
        if ($search) {
            $query->where('nama_produk', 'like', "%{$search}%");
        }

        // 4. Ambil data produk
        $produks = $query->get();

        // 5. Tampilkan katalog
        return view('customer.katalog', compact('produks'));
    }

    // FUNCTION DETAIL PRODUK
    public function detail($id)
    {
        $produk = Produk::findOrFail($id);

        return view('customer.detail-produk', compact('produk'));
    }
}
