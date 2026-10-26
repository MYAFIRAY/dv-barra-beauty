<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('kategori'); // Skincare, Makeup, Bundling, dll
            $table->string('tipe'); // Satuan atau Bundling
            $table->integer('harga'); // Harga jual
            $table->integer('harga_coret')->nullable(); // Harga sebelum diskon (bisa kosong)
            $table->integer('stok');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable(); // Nama file gambar
            $table->integer('terjual')->default(0); // Jumlah terjual (untuk rating)
            $table->decimal('rating', 2, 1)->default(5.0); // Bintang 1.0 - 5.0
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
