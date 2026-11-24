<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('paket_bundling_produk', function (Blueprint $table) {
            $table->id();

            $table->foreignId('paket_bundling_id')
                ->constrained('paket_bundlings')
                ->cascadeOnDelete();

            $table->foreignId('produk_id')
                ->constrained('produks')
                ->cascadeOnDelete();

            $table->integer('jumlah')->default(1);

            $table->timestamps();

            $table->unique([
                'paket_bundling_id',
                'produk_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('paket_bundling_produk');
    }
};