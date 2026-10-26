<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AdminPesananController;
use App\Http\Controllers\AdminPengirimanController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Halaman Publik (Katalog & Keranjang)
|--------------------------------------------------------------------------
*/
Route::get('/', [KatalogController::class, 'index'])->name('katalog');

Route::get('/keranjang', [CartController::class, 'index'])->name('keranjang');
Route::post('/keranjang/tambah/{id}', [CartController::class, 'tambah'])->name('keranjang.tambah');
Route::post('/keranjang/update/{id}', [CartController::class, 'update'])->name('keranjang.update');
Route::post('/keranjang/hapus/{id}', [CartController::class, 'hapus'])->name('keranjang.hapus');
Route::get('/lacak-pesanan', [PesananController::class, 'lacak'])->name('lacak.pesanan');

/*
|--------------------------------------------------------------------------
| Halaman Checkout & Pemrosesan Pesanan
|--------------------------------------------------------------------------
*/
Route::get('/checkout', [PesananController::class, 'checkout'])->name('checkout');
Route::post('/checkout/proses', [PesananController::class, 'prosesCheckout'])->name('checkout.proses');
Route::get('/checkout/sukses/{id}', [PesananController::class, 'sukses'])->name('checkout.sukses');
Route::get('/checkout/bayar-selesai/{id}', [PesananController::class, 'bayarSelesai'])->name('checkout.bayarselesai');

/*
|--------------------------------------------------------------------------
| Halaman Autentikasi
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin'])->name('login.proses');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'prosesRegister'])->name('register.proses');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Menghilangkan error RouteNotFoundException [lupa-password]
Route::get('/lupa-password', function () {
    return view('auth.lupa_password');
})->name('lupa-password');

/*
|--------------------------------------------------------------------------
| Halaman Admin
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', fn () => view('admin.dashboard.index'));
Route::get('/produk', fn () => view('admin.produk.index'));
Route::get('/produk/create', fn () => view('admin.produk.create'));

// --- MANAJEMEN PESANAN ---
Route::get('/pesanan', [AdminPesananController::class, 'index'])->name('admin.pesanan');
Route::get('/pesanan/{id}', [AdminPesananController::class, 'detail'])->name('admin.pesanan.detail');
Route::post('/pesanan/update/{id}', [AdminPesananController::class, 'updateStatus'])->name('admin.pesanan.update');

// --- PENGATURAN & LAINNYA ---
Route::get('/pengiriman', [AdminPengirimanController::class, 'index'])->name('admin.pengiriman');
Route::post('/pengiriman/update-resi/{id}', [AdminPengirimanController::class, 'updateResi'])->name('admin.pengiriman.update');
Route::get('/pengaturan', fn () => view('admin.pengaturan.index'));
Route::get('/pengaturan/informasi-toko', fn () => view('admin.pengaturan.informasi_toko'));
Route::get('/pengaturan/keamanan', fn () => view('admin.pengaturan.keamanan'));
Route::get('/pengaturan/metode-pembayaran', fn () => view('admin.pengaturan.metode_pembayaran'));
Route::get('/pengaturan/pengiriman', fn () => view('admin.pengaturan.pengiriman'));
Route::get('/pengaturan/notifikasi', fn () => view('admin.pengaturan.notifikasi'));
Route::get('/pengaturan/backup', fn () => view('admin.pengaturan.backup'));