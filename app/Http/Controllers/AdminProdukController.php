<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class AdminProdukController extends Controller
{
    // Menampilkan halaman daftar produk (memanggil index.blade.php kamu)
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $query = Produk::query();
        if ($search) {
            $query->where('nama_produk', 'like', "%{$search}%");
        }

        // Pastikan variabel ini ($produks) sesuai dengan yang kamu pakai di @foreach file index.blade.php kamu
        $produks = $query->latest()->get();

        return view('admin.produk.index', compact('produks'));
    }

    // Menampilkan halaman tambah produk (memanggil create.blade.php kamu)
    public function create()
    {
        return view('admin.produk.create');
    }

    // Menyimpan data produk baru ke database
    public function store(Request $request)
    {
        // 1. Validasi inputan form (Sesuaikan nama field dengan yang ada di database kamu)
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga'       => 'required|numeric',
            'stok'        => 'required|integer',
            // 'deskripsi' => 'nullable|string', // Buka jika ada deskripsi
            // 'gambar'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Buka jika ada upload gambar
        ]);

        // 2. Simpan data (Pastikan model Produk sudah diset $fillable atau $guarded = [])
        Produk::create($request->all());

        // 3. Kembali ke halaman daftar produk
        return redirect()->route('admin.produk.index')->with('success', 'Produk baru berhasil ditambahkan!');
    }
}