<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class AdminPengirimanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        
        // Kasir pengiriman fokus pada pesanan yang 'Diproses' atau 'Dikirim'
        $query = Pesanan::whereIn('status_pesanan', ['Diproses', 'Dikirim']);

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_pelanggan', 'like', "%{$search}%")
                  ->orWhere('no_pesanan', 'like', "%{$search}%")
                  ->orWhere('no_resi', 'like', "%{$search}%");
            });
        }

        $pengirimans = $query->orderBy('updated_at', 'desc')->get();
        return view('admin.pengiriman.index', compact('pengirimans'));
    }

    // Mengupdate Nomor Resi Langsung
    public function updateResi(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->no_resi = $request->no_resi;
        $pesanan->status_pesanan = 'Dikirim'; // Otomatis status berubah
        $pesanan->save();

        return redirect()->route('admin.pengiriman')->with('success', 'Resi berhasil diupdate, pesanan masuk ke status Dikirim!');
    }
}