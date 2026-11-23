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
        Schema::table('paket_bundlings', function (Blueprint $table) {
            $table->string('nama_paket')->after('id');
            $table->text('deskripsi')->nullable()->after('nama_paket');
            $table->decimal('harga', 12, 2)->after('deskripsi');
            $table->integer('stok')->default(0)->after('harga');
            $table->string('gambar')->nullable()->after('stok');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif')->after('gambar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paket_bundlings', function (Blueprint $table) {
            $table->dropColumn([
                'nama_paket',
                'deskripsi',
                'harga',
                'stok',
                'gambar',
                'status',
            ]);
        });
    }
};