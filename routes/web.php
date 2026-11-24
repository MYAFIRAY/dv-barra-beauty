<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KatalogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AdminPesananController;
use App\Http\Controllers\AdminPengirimanController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminPaketBundlingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\AdminManagerController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Halaman Publik
| Katalog, Keranjang, Checkout, Lacak Pesanan
|--------------------------------------------------------------------------
*/

Route::get('/', [KatalogController::class, 'index'])
    ->name('katalog');

Route::get('/keranjang', [CartController::class, 'index'])
    ->name('keranjang');

Route::post('/keranjang/tambah/{id}', [CartController::class, 'tambah'])
    ->name('keranjang.tambah');

Route::post('/keranjang/update/{id}', [CartController::class, 'update'])
    ->name('keranjang.update');

Route::post('/keranjang/hapus/{id}', [CartController::class, 'hapus'])
    ->name('keranjang.hapus');

Route::get('/checkout', [PesananController::class, 'checkout'])
    ->name('checkout');

Route::post('/checkout/proses', [PesananController::class, 'prosesCheckout'])
    ->name('checkout.proses');

Route::get('/checkout/sukses/{id}', [PesananController::class, 'sukses'])
    ->name('checkout.sukses');

Route::get('/checkout/bayar-selesai/{id}', [PesananController::class, 'bayarSelesai'])
    ->name('checkout.bayar_selesai');

Route::get('/lacak-pesanan', [PesananController::class, 'lacak'])
    ->name('lacak.pesanan');


/*
|--------------------------------------------------------------------------
| Autentikasi
| Login, Register, Logout
|--------------------------------------------------------------------------
*/

Route::get('/admin-portal', [AuthController::class, 'showAdminLoginForm'])
    ->name('admin.login');

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);


/*
|--------------------------------------------------------------------------
| AREA TERKUNCI
| Wajib Login untuk Admin & Owner
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // ==========================================
    // PANEL OWNER (PEMILIK BISNIS)
    // ==========================================

    Route::get('/owner/dashboard', [OwnerController::class, 'index'])
        ->name('owner.dashboard');

    Route::get('/owner/admin', [AdminManagerController::class, 'index'])
        ->name('owner.admin.index');

    Route::post('/owner/admin', [AdminManagerController::class, 'store'])
        ->name('owner.admin.store');

    Route::delete('/owner/admin/{id}', [AdminManagerController::class, 'destroy'])
        ->name('owner.admin.destroy');

    Route::get('/owner/laporan', [OwnerController::class, 'laporan'])
        ->name('owner.laporan');

    Route::get('/owner/pengaturan', [PengaturanController::class, 'index'])
        ->name('owner.pengaturan.index');

    Route::post('/owner/pengaturan', [PengaturanController::class, 'update'])
        ->name('owner.pengaturan.update');


    // ==========================================
    // PANEL ADMIN KASIR
    // ==========================================

    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');


    // ==========================================
    // PESANAN
    // ==========================================

    Route::get('/pesanan', [AdminPesananController::class, 'index'])
        ->name('admin.pesanan.index');

    Route::get('/pesanan/{id}', [AdminPesananController::class, 'detail'])
        ->name('admin.pesanan.detail');

    Route::post('/pesanan/status/{id}', [AdminPesananController::class, 'updateStatus'])
        ->name('admin.pesanan.updateStatus');


    // ==========================================
    // PRODUK
    // ==========================================

   // ==========================================
    // PRODUK
    // ==========================================

    Route::get('/produk', [AdminProdukController::class, 'index'])
        ->name('admin.produk.index');

    Route::get('/produk/create', [AdminProdukController::class, 'create'])
        ->name('admin.produk.create');

    Route::post('/produk/store', [AdminProdukController::class, 'store'])
        ->name('admin.produk.store');

    Route::get('/produk/{id}/edit', [AdminProdukController::class, 'edit'])
        ->name('admin.produk.edit');

    Route::put('/produk/{id}', [AdminProdukController::class, 'update'])
        ->name('admin.produk.update');

    Route::delete('/produk/{id}', [AdminProdukController::class, 'destroy'])
        ->name('admin.produk.destroy'); Route::get('/produk', [AdminProdukController::class, 'index'])
        ->name('admin.produk.index');

    Route::get('/produk/create', [AdminProdukController::class, 'create'])
        ->name('admin.produk.create');

    Route::post('/produk/store', [AdminProdukController::class, 'store'])
        ->name('admin.produk.store');


    // ==========================================
    // PAKET BUNDLING - FITUR BARU
    // ==========================================

    Route::prefix('admin/paket-bundling')
        ->name('admin.paket-bundling.')
        ->group(function () {

            // Daftar Paket Bundling
            Route::get('/', [AdminPaketBundlingController::class, 'index'])
                ->name('index');

            // Form Tambah Paket Bundling
            Route::get('/create', [AdminPaketBundlingController::class, 'create'])
                ->name('create');

            // Simpan Paket Bundling
            Route::post('/', [AdminPaketBundlingController::class, 'store'])
                ->name('store');

            // Detail Paket Bundling
            Route::get('/{paketBundling}', [AdminPaketBundlingController::class, 'show'])
                ->name('show');

            // Hapus Paket Bundling
            Route::delete('/{paketBundling}', [AdminPaketBundlingController::class, 'destroy'])
                ->name('destroy');
        });


    // ==========================================
    // PENGIRIMAN
    // ==========================================

    Route::get('/pengiriman', [AdminPengirimanController::class, 'index'])
        ->name('admin.pengiriman.index');

    Route::post('/pengiriman/update/{id}', [AdminPengirimanController::class, 'update'])
        ->name('admin.pengiriman.update');


    // ==========================================
    // PENGATURAN UTAMA ADMIN
    // ==========================================

    Route::get('/pengaturan', [PengaturanController::class, 'adminIndex'])
        ->name('admin.pengaturan.index');
        // ==========================================
    // PENGATURAN UTAMA ADMIN
    // ==========================================

    Route::get('/pengaturan', [PengaturanController::class, 'adminIndex'])
        ->name('admin.pengaturan.index');

    Route::post('/pengaturan', [PengaturanController::class, 'adminUpdate'])
        ->name('admin.pengaturan.update');


    // ==========================================
    // SUB-MENU PENGATURAN
    // ==========================================

    Route::get('/pengaturan/informasi-toko', [PengaturanController::class, 'informasiToko'])
        ->name('admin.pengaturan.informasi');

    Route::get('/pengaturan/metode-pembayaran', [PengaturanController::class, 'metodePembayaran'])
        ->name('admin.pengaturan.pembayaran');

    Route::get('/pengaturan/pengiriman', [PengaturanController::class, 'pengaturanPengiriman'])
        ->name('admin.pengaturan.pengiriman');

    Route::get('/pengaturan/notifikasi', [PengaturanController::class, 'notifikasi'])
        ->name('admin.pengaturan.notifikasi');

    Route::get('/pengaturan/keamanan', [PengaturanController::class, 'keamanan'])
        ->name('admin.pengaturan.keamanan');

    Route::get('/pengaturan/backup', [PengaturanController::class, 'backup'])
        ->name('admin.pengaturan.backup');

});