<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Produk;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class PesananController extends Controller
{
    public function checkout()
    {
        $keranjang = session('keranjang', []);
        if (empty($keranjang)) {
            return redirect()->route('katalog')->with('error', 'Keranjang kamu masih kosong!');
        }

        $total_belanja = 0;
        foreach ($keranjang as $item) {
            $total_belanja += $item['harga'] * $item['jumlah'];
        }

        return view('customer.checkout', compact('total_belanja'));
    }

    public function prosesCheckout(Request $request)
    {
        $keranjang = session('keranjang', []);
        if (empty($keranjang)) {
            return redirect()->route('katalog');
        }

        $no_pesanan = 'ORD-' . date('ymd') . '-' . strtoupper(Str::random(4));

        $pesanan = Pesanan::create([
            'no_pesanan'        => $no_pesanan,
            'nama_pelanggan'    => $request->nama_pelanggan,
            'no_wa'             => $request->no_wa,
            'alamat'            => $request->alamat,
            'total_harga'       => $request->total_harga,
            'ongkir'            => $request->ongkir,
            'total_tagihan'     => $request->total_tagihan,
            'kurir'             => $request->kurir,
            'metode_pembayaran' => 'Midtrans Payment Gateway', // <--- Dibuat otomatis, bukan dari form lagi
            'status_pembayaran' => 'Belum Dibayar',
            'status_pesanan'    => 'Baru',
        ]);

        foreach ($keranjang as $id => $item) {
            PesananDetail::create([
                'pesanan_id'   => $pesanan->id,
                'produk_id'    => $id,
                'jumlah'       => $item['jumlah'],
                'harga_satuan' => $item['harga'],
                'subtotal'     => $item['harga'] * $item['jumlah'],
            ]);

            $produk = Produk::find($id);
            if ($produk) {
                $produk->stok = $produk->stok - $item['jumlah'];
                $produk->save();
            }
        }

        session()->forget('keranjang');
        return redirect()->route('checkout.sukses', $pesanan->id);
    }

    public function sukses($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        Config::$serverKey    = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized  = config('services.midtrans.is_sanitized');
        Config::$is3ds        = config('services.midtrans.is_3ds');

        $params = [
            'transaction_details' => [
                'order_id'     => $pesanan->no_pesanan,
                'gross_amount' => (int) $pesanan->total_tagihan,
            ],
            'customer_details' => [
                'first_name' => $pesanan->nama_pelanggan,
                'phone'      => $pesanan->no_wa,
            ],
        ];

        // Buat Token Snap hanya jika statusnya masih "Belum Dibayar"
        $snapToken = null;
        if ($pesanan->status_pembayaran == 'Belum Dibayar') {
            $snapToken = Snap::getSnapToken($params);
        }

        return view('customer.berhasil', compact('pesanan', 'snapToken'));
    }

    // Method baru untuk mengupdate status pembayaran saat Pop-up Midtrans sukses
    public function bayarSelesai($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status_pembayaran = 'Sudah Dibayar';
        $pesanan->save();

        return redirect()->route('checkout.sukses', $pesanan->id)->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }
    // Menampilkan halaman pelacakan pesanan pelanggan
    public function lacak(Request $request)
    {
        $pesanan = null;
        
        // Jika pelanggan mencari berdasarkan nomor pesanan
        if ($request->has('no_pesanan')) {
            $pesanan = Pesanan::with('rincian.produk')
                ->where('no_pesanan', $request->no_pesanan)
                ->first();
        }

        return view('customer.lacak', compact('pesanan'));
    }
}