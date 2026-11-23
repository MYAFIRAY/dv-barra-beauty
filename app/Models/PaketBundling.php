<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketBundling extends Model
{
    use HasFactory;

    protected $table = 'paket_bundlings';

    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'status',
    ];

    public function produk()
    {
        return $this->belongsToMany(
            Produk::class,
            'paket_bundling_produk',
            'paket_bundling_id',
            'produk_id'
        )->withPivot('jumlah')
         ->withTimestamps();
    }
}