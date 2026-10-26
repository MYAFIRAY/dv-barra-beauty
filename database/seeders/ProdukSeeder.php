<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'nama_produk' => 'Wardah Crystal Secret Paket Lengkap',
                'kategori'    => 'Bundling',
                'tipe'        => 'Skincare',
                'harga'       => 350000,
                'harga_coret' => 450000,
                'stok'        => 15,
                'deskripsi'   => 'Paket lengkap Wardah Crystal Secret untuk wajah cerah bersinar.',
                'gambar'      => null,
                'terjual'     => 42,
                'rating'      => 4.9,
            ],
            [
                'nama_produk' => 'Scarlett Whitening Body Lotion Romansa',
                'kategori'    => 'Scarlett',
                'tipe'        => 'Bodycare',
                'harga'       => 75000,
                'harga_coret' => 85000,
                'stok'        => 50,
                'deskripsi'   => 'Lotion tubuh wangi tahan lama.',
                'gambar'      => null,
                'terjual'     => 120,
                'rating'      => 4.8,
            ],
            [
                'nama_produk' => 'Emina Bright Stuff Face Wash 100ml',
                'kategori'    => 'Skincare',
                'tipe'        => 'Skincare',
                'harga'       => 25000,
                'harga_coret' => null, // Tidak ada diskon
                'stok'        => 30,
                'deskripsi'   => 'Sabun cuci muka untuk remaja.',
                'gambar'      => null,
                'terjual'     => 85,
                'rating'      => 4.7,
            ],
            [
                'nama_produk' => 'Make Over Powerstay Matte Powder',
                'kategori'    => 'Makeup',
                'tipe'        => 'Makeup',
                'harga'       => 150000,
                'harga_coret' => 180000,
                'stok'        => 0, // Sengaja di-set 0 untuk tes tampilan stok habis
                'deskripsi'   => 'Bedak padat tahan lama seharian.',
                'gambar'      => null,
                'terjual'     => 300,
                'rating'      => 4.9,
            ]
        ];

        foreach ($data as $produk) {
            Produk::create($produk);
        }
    }
}