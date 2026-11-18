<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminManagerController extends Controller
{
    public function index()
    {
        // Menampilkan daftar user yang memiliki role 'admin' atau 'owner'
        $admins = User::whereIn('role', ['admin', 'owner'])->orderBy('role', 'desc')->get();
        return view('owner.admin', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'admin', // Otomatis diset sebagai admin kasir
        ]);

        return redirect()->back()->with('success', 'Akun Admin/Kasir baru berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Proteksi: Owner tidak bisa menghapus dirinya sendiri
        if ($user->role === 'owner') {
            return redirect()->back()->with('error', 'Akun Owner tidak dapat dihapus!');
        }

        $user->delete();
        return redirect()->back()->with('success', 'Akun Admin berhasil dihapus.');
    }
}