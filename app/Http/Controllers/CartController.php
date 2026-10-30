<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class CartController extends Controller
{
    public function index()
    {
        $keranjang = session()->get('keranjang', []);
        return view('customer.keranjang', compact('keranjang'));
    }

    public function tambah(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $keranjang = session()->get('keranjang', []);

        if(isset($keranjang[$id])) {
            $keranjang[$id]['jumlah']++;
        } else {
            $keranjang[$id] = [
                "nama_produk" => $produk->nama_produk,
                "jumlah" => 1,
                "harga" => $produk->harga,
                "gambar" => $produk->gambar
            ];
        }

        session()->put('keranjang', $keranjang);
        return redirect()->back()->with('success', 'Produk berhasil ditambah ke keranjang!');
    }

    public function update(Request $request, $id)
    {
        $keranjang = session()->get('keranjang', []);
        if(isset($keranjang[$id])) {
            $keranjang[$id]['jumlah'] = $request->jumlah;
            session()->put('keranjang', $keranjang);
        }
        return redirect()->back()->with('success', 'Jumlah produk diperbarui!');
    }

    public function hapus($id)
    {
        $keranjang = session()->get('keranjang', []);
        if(isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session()->put('keranjang', $keranjang);
        }
        return redirect()->back()->with('success', 'Produk dihapus dari keranjang!');
    }
}