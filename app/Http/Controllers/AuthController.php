<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        // Jika user sudah login sebelumnya, langsung arahkan ke panel masing-masing
        if (Auth::check()) {
            return $this->redirectBerdasarkanRole(Auth::user()->role);
        }
        
        return view('auth.login');
    }

    // Menampilkan halaman login KHUSUS INTERNAL (Admin & Owner)
    public function showAdminLoginForm()
    {
        if (Auth::check()) {
            return $this->redirectBerdasarkanRole(Auth::user()->role);
        }
        return view('auth.login-admin');
    }
    // Memproses data login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect sesuai role (Pemilik, Kasir, Pelanggan)
            return $this->redirectBerdasarkanRole(Auth::user()->role);
        }

        return back()->withErrors([
            'email' => 'Email atau password yang kamu masukkan salah.',
        ])->onlyInput('email');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }

    // Menampilkan halaman form pendaftaran
    public function showRegisterForm()
    {
        if (Auth::check()) {
            return redirect()->route('katalog');
        }
        return view('auth.register');
    }

    // Memproses data pendaftaran pelanggan baru
    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer', // Otomatis diset sebagai pelanggan
        ]);

        // Langsung login otomatis setelah daftar
        Auth::login($user);

        return redirect()->route('katalog')->with('success', 'Akun berhasil dibuat! Selamat berbelanja.');
    }
    // Fungsi bantuan untuk mengarahkan rute
    private function redirectBerdasarkanRole($role)
    {
        if ($role === 'owner') {
            return redirect()->route('owner.dashboard');
        } elseif ($role === 'admin') {
            return redirect()->route('admin.pesanan.index');
        } else {
            return redirect()->route('katalog');
        }
    }
}