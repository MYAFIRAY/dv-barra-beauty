<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function paketBundlings()
    {
        return $this->belongsToMany(
            PaketBundling::class,
            'paket_bundling_produk',
            'produk_id',
            'paket_bundling_id'
        )->withPivot('jumlah')
         ->withTimestamps();
    }
}