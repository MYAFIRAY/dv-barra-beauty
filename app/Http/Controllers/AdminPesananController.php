<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class AdminPesananController extends Controller
{
    // Menampilkan semua pesanan dari yang paling baru
   public function index(Request $request)
    {
        $status = $request->query('status');
        $search = $request->query('search'); // Tangkap kata kunci pencarian

        $query = Pesanan::query();

        // Filter berdasarkan status jika ada
        if ($status) {
            $query->where('status_pesanan', $status);
        }

        // Filter pencarian berdasarkan nama atau no pesanan
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_pelanggan', 'like', "%{$search}%")
                  ->orWhere('no_pesanan', 'like', "%{$search}%");
            });
        }

        $pesanans = $query->orderBy('created_at', 'desc')->get();
        return view('admin.pesanan.index', compact('pesanans'));
    }

    // Menampilkan detail pesanan untuk diproses (packing/input resi)
    public function detail($id)
    {
        $pesanan = Pesanan::with('rincian.produk')->findOrFail($id);
        return view('admin.pesanan.detail', compact('pesanan'));
    }

    // Mengupdate status pesanan & Nomor Resi
    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        
        $pesanan->status_pesanan = $request->status_pesanan;
        
        if ($request->filled('no_resi')) {
            $pesanan->no_resi = $request->no_resi;
        }

        $pesanan->save();

        return redirect()->route('admin.pesanan.detail', $id)->with('success', 'Status & Resi berhasil diperbarui!');
    }
}