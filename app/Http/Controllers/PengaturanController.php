<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    // =======================================
    // PENGATURAN KHUSUS OWNER (SUPER ADMIN)
    // =======================================
    public function index()
    {
        return view('admin.pengaturan.owner.index');
    }

    public function update(Request $request)
    {
        return $this->simpanAkun($request, 'Pengaturan owner diperbarui!');
    }

    // =======================================
    // PENGATURAN KHUSUS ADMIN KASIR
    // =======================================
    public function adminIndex()
    {
        // Memanggil form profil simpel milik Kasir
        return view('admin.pengaturan.index');
    }

    public function adminUpdate(Request $request)
    {
        return $this->simpanAkun($request, 'Profil dan sandi kasir berhasil diperbarui!');
    }

    // =======================================
    // FUNGSI SIMPAN PROFIL & SANDI KE DATABASE
    // =======================================
    private function simpanAkun(Request $request, string $pesanSukses)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->filled('email')) {
            $request->validate([
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);
            $user->email = $request->email;
        }

        if ($request->filled('password')) {
            // Jika form menyertakan input current_password (dari halaman Keamanan Owner)
            if ($request->has('current_password')) {
                $request->validate([
                    'current_password' => 'required',
                    'password'         => 'required|min:6|confirmed',
                ], [
                    'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
                    'password.min'       => 'Password baru minimal 6 karakter.',
                ]);

                if (!Hash::check($request->current_password, $user->password)) {
                    return back()->withErrors(['current_password' => 'Password lama yang Anda masukkan salah.']);
                }
            }

            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', $pesanSukses);
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