<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class CartController extends Controller
{
    // Menampilkan halaman keranjang
    public function index()
    {
        $keranjang = session('keranjang', []);
        return view('customer.keranjang', compact('keranjang'));
    }

    // Menambah produk ke keranjang (Dari halaman Katalog)
    public function tambah(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $keranjang = session('keranjang', []);

        if (isset($keranjang[$id])) {
            $keranjang[$id]['jumlah']++;
        } else {
            $keranjang[$id] = [
                'nama_produk' => $produk->nama_produk,
                'harga'       => $produk->harga,
                'gambar'      => $produk->gambar,
                'kategori'    => $produk->kategori,
                'jumlah'      => 1
            ];
        }

        session(['keranjang' => $keranjang]);
        return redirect()->back()->with('success', 'Asik! Produk berhasil ditambah ke keranjang.');
    }

    // Mengubah jumlah produk di keranjang (+ atau -)
    public function update(Request $request, $id)
    {
        $keranjang = session('keranjang', []);

        if (isset($keranjang[$id])) {
            $aksi = $request->input('aksi'); // 'tambah' atau 'kurang'

            if ($aksi == 'tambah') {
                $keranjang[$id]['jumlah']++;
            } elseif ($aksi == 'kurang') {
                if ($keranjang[$id]['jumlah'] > 1) {
                    $keranjang[$id]['jumlah']--;
                } else {
                    // Kalau jumlah sudah 1 dan dikurang lagi, otomatis hapus barangnya
                    unset($keranjang[$id]);
                }
            }
            session(['keranjang' => $keranjang]);
        }

        return redirect()->back();
    }

    // Menghapus produk dari keranjang (Tombol Tong Sampah)
    public function hapus($id)
    {
        $keranjang = session('keranjang', []);

        if (isset($keranjang[$id])) {
            unset($keranjang[$id]);
            session(['keranjang' => $keranjang]);
        }

        return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
    }
}