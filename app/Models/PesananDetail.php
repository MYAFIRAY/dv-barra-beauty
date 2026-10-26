<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;

    // Menghubungkan model dengan tabel pesanan_details di database
    protected $table = 'pesanan_details';

    // Mengizinkan semua kolom untuk diisi (kecuali ID)
    protected $guarded = ['id'];
    
    // Relasi balik ke tabel pesanans
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    // Relasi balik ke tabel produks
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}