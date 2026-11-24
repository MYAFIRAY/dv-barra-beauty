<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\File;

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
    $request->validate([
        'nama_produk' => 'required|string|max:255',
        'kategori'    => 'required|string|max:100',
        'harga'       => 'required|numeric|min:0',
        'stok'        => 'required|integer|min:0',
        'deskripsi'   => 'nullable|string',
        'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
    ]);

    $pathGambar = null;
    if ($request->hasFile('gambar')) {
        // Menyimpan file fisik ke folder public/images/produk agar langsung tampil & aman saat pindah hosting
        $file = $request->file('gambar');
        $namaFile = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $file->move(public_path('images/produk'), $namaFile);
        $pathGambar = 'images/produk/' . $namaFile;
    }

    Produk::create([
        'nama_produk' => $request->nama_produk,
        'kategori'    => $request->kategori,
        'tipe'        => $request->tipe ?? 'satuan', // <-- Tambahkan baris ini
        'harga'       => $request->harga,
        'stok'        => $request->stok,
        'deskripsi'   => $request->deskripsi,
        'gambar'      => $pathGambar,
    ]);

    return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan!');
}
public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori'    => 'required|string|max:100',
            'harga'       => 'required|numeric|min:0',
            'stok'        => 'required|integer|min:0',
            'deskripsi'   => 'nullable|string',
            'gambar'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $pathGambar = $produk->gambar;

        if ($request->hasFile('gambar')) {
            // Hapus foto lama jika ada di folder public/images/produk
            if ($produk->gambar && str_starts_with($produk->gambar, 'images/produk/') && File::exists(public_path($produk->gambar))) {
                File::delete(public_path($produk->gambar));
            }

            $file = $request->file('gambar');
            $namaFile = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('images/produk'), $namaFile);
            $pathGambar = 'images/produk/' . $namaFile;
        }

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'kategori'    => $request->kategori,
            'tipe'        => $request->tipe ?? $produk->tipe ?? 'satuan',
            'harga'       => $request->harga,
            'stok'        => $request->stok,
            'deskripsi'   => $request->deskripsi,
            'gambar'      => $pathGambar,
        ]);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        // Hapus file fisik gambar agar tidak menumpuk di hosting
        if ($produk->gambar && str_starts_with($produk->gambar, 'images/produk/') && File::exists(public_path($produk->gambar))) {
            File::delete(public_path($produk->gambar));
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}