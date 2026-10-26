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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('no_pesanan')->unique(); // Contoh: ORD-20261007-001
            $table->string('nama_pelanggan');
            $table->string('no_wa');
            $table->text('alamat');
            
            // Detail Harga
            $table->integer('total_harga'); // Harga barang saja
            $table->integer('ongkir'); // Ongkos kirim
            $table->integer('total_tagihan'); // Harga barang + Ongkir
            
            // Logistik & Pembayaran
            $table->string('kurir'); // Kurir Lokal / JNE
            $table->string('no_resi')->nullable();
            $table->string('metode_pembayaran'); // BCA VA, QRIS, dll
            
            // Status
            $table->enum('status_pembayaran', ['Belum Dibayar', 'Sudah Dibayar', 'Batal'])->default('Belum Dibayar');
            $table->enum('status_pesanan', ['Baru', 'Diproses', 'Dikirim', 'Selesai'])->default('Baru');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
