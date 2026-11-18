<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class AdminPengirimanController extends Controller
{
   public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Ambil pesanan yang sedang diproses atau dikirim
        $query = Pesanan::whereIn('status_pesanan', ['Diproses', 'Dikirim']);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('no_pesanan', 'like', "%{$search}%")
                  ->orWhere('nama_pelanggan', 'like', "%{$search}%")
                  ->orWhere('no_resi', 'like', "%{$search}%");
            });
        }

        // Variabel diubah menjadi $pengirimans (pakai 's') agar cocok dengan file view
        $pengirimans = $query->orderBy('updated_at', 'desc')->get();

        return view('admin.pengiriman.index', compact('pengirimans'));
    }

    // Menyimpan nomor resi yang diinput admin/kasir
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_resi' => 'required|string|max:255',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->no_resi = $request->no_resi;
        
        // Otomatis ubah status menjadi "Dikirim" jika resi diinput
        if ($pesanan->status_pesanan == 'Diproses') {
            $pesanan->status_pesanan = 'Dikirim';
        }
        
        $pesanan->save();

        return redirect()->back()->with('success', 'Nomor resi pengiriman berhasil disimpan dan status diperbarui!');
    }
}