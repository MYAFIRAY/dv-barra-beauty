<?php

namespace App\Http\Controllers;

use App\Models\PaketBundling;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminPaketBundlingController extends Controller
{
    /**
     * Menampilkan daftar paket bundling.
     */
    public function index()
    {
        $paketBundlings = PaketBundling::with('produk')
            ->latest()
            ->get();

        return view('admin.paket-bundling.index', compact('paketBundlings'));
    }

    /**
     * Menampilkan form tambah paket bundling.
     */
    public function create()
    {
        $produk = Produk::orderBy('nama_produk')->get();

        return view('admin.paket-bundling.create', compact('produk'));
    }

    /**
     * Menyimpan paket bundling baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:aktif,nonaktif',

            'produk' => 'nullable|array',
            'produk.*.id' => 'required|exists:produks,id',
            'produk.*.jumlah' => 'required|integer|min:1',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')
                ->store('paket-bundling', 'public');
        }

        // Data produk tidak disimpan langsung ke tabel paket_bundlings
        unset($validated['produk']);

        $paketBundling = PaketBundling::create($validated);

        // Simpan produk yang menjadi isi paket
        $produkData = [];

        foreach ($request->input('produk', []) as $item) {
            $produkData[$item['id']] = [
                'jumlah' => $item['jumlah'],
            ];
        }

        if (!empty($produkData)) {
            $paketBundling->produk()->sync($produkData);
        }

        return redirect()
            ->route('admin.paket-bundling.index')
            ->with('success', 'Paket bundling berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail paket bundling.
     */
    public function show(PaketBundling $paketBundling)
    {
        $paketBundling->load('produk');

        return view(
            'admin.paket-bundling.show',
            compact('paketBundling')
        );
    }

    /**
     * Menghapus paket bundling.
     */
    public function destroy(PaketBundling $paketBundling)
    {
        $paketBundling->delete();

        return redirect()
            ->route('admin.paket-bundling.index')
            ->with('success', 'Paket bundling berhasil dihapus.');
    }
}