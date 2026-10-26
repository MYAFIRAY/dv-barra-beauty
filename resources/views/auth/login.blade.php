<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Akun - DV BARRA Beauty</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dv-main': '#2b5a8e',
                        'dv-dark': '#1a3e6c',
                        'dv-bg': '#dbe8f6',
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; } </style>
</head>
<body class="flex items-center justify-center min-h-screen p-4 text-slate-800 relative overflow-x-hidden">

    <div class="fixed top-[-10%] left-[-10%] w-[500px] h-[500px] bg-dv-bg rounded-full mix-blend-multiply filter blur-[80px] opacity-70 pointer-events-none"></div>

    <div class="w-full max-w-md bg-white rounded-3xl shadow-[0_8px_32px_rgba(43,90,142,0.08)] border border-slate-100 p-8 md:p-10 relative z-10">
        
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="DV BARRA" class="h-10 mx-auto object-contain mix-blend-multiply mb-4">
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Selamat Datang Kembali</h1>
            <p class="text-sm font-medium text-slate-500 mt-1">Masuk ke akun kamu untuk melanjutkan belanja</p>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 text-sm rounded-xl font-bold">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 text-sm rounded-xl font-medium">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.proses') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-dv-main focus:bg-white font-medium text-slate-700 transition-all">
            </div>

            <div>
                <div class="flex justify-between items-center mb-2">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider">Password</label>
                    <a href="{{ route('lupa-password') }}" class="text-xs font-bold text-dv-main hover:underline">Lupa Password?</a>
                </div>
                <input type="password" name="password" required placeholder="••••••••" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-dv-main focus:bg-white font-medium text-slate-700 transition-all">
            </div>

            <button type="submit" class="w-full py-4 bg-dv-main text-white font-extrabold text-sm rounded-xl shadow-lg shadow-dv-main/30 hover:bg-dv-dark transition-transform hover:scale-[1.01] cursor-pointer">
                Masuk Sekarang
            </button>
        </form>

        <div class="mt-8 text-center border-t border-slate-100 pt-6">
            <p class="text-sm font-medium text-slate-500">
                Belum punya akun? <a href="{{ route('register') }}" class="font-bold text-dv-main hover:underline">Daftar Akun Baru</a>
            </p>
        </div>

    </div>
</body>
</html>