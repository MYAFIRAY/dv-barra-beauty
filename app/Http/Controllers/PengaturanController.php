<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    // =======================================
    // PENGATURAN KHUSUS OWNER (SUPER ADMIN)
    // =======================================
    public function index()
    {
        // Memanggil file grid menu 6 kotak yang ada di dalam folder admin/pengaturan/owner/
        return view('admin.pengaturan.owner.index'); 
    }

    public function update(Request $request)
    {
        return redirect()->back()->with('success', 'Pengaturan owner diperbarui!');
    }

    // =======================================
    // PENGATURAN KHUSUS ADMIN KASIR
    // =======================================
    public function adminIndex()
    {
        // Memanggil form profil simpel milik Kasir
        return view('admin.pengaturan.index');
    }

    // =======================================
    // SUB-MENU PENGATURAN
    // =======================================
    public function informasiToko()
    {
        return view('admin.pengaturan.informasi_toko');
    }

    public function metodePembayaran()
    {
        return view('admin.pengaturan.metode_pembayaran');
    }

    public function pengaturanPengiriman()
    {
        return view('admin.pengaturan.pengiriman');
    }

    public function notifikasi()
    {
        return view('admin.pengaturan.notifikasi');
    }

    public function keamanan()
    {
        return view('admin.pengaturan.keamanan');
    }

    public function backup()
    {
        return view('admin.pengaturan.backup');
    }
}