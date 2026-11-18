<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Internal - DV BARRA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { 'dv-main': '#2b5a8e', 'dv-dark': '#1a3e6c' } } } }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; } </style>
</head>
<body class="bg-slate-900 text-slate-200 antialiased flex items-center justify-center min-h-screen p-4 relative overflow-hidden">
    
    <!-- Ornamen Background -->
    <div class="absolute top-0 left-0 w-full h-2 bg-dv-main"></div>
    <div class="absolute -top-32 -right-32 w-96 h-96 bg-dv-main/10 rounded-full blur-3xl"></div>

    <div class="bg-slate-800/80 backdrop-blur-xl max-w-md w-full rounded-2xl border border-slate-700 shadow-2xl p-8 relative z-10">
        
        <div class="text-center mb-8 border-b border-slate-700 pb-6">
            <div class="w-16 h-16 bg-slate-700 rounded-xl flex items-center justify-center mx-auto mb-4 border border-slate-600">
                <svg class="w-8 h-8 text-dv-main" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"></path></svg>
            </div>
            <h1 class="text-xl font-extrabold text-white tracking-wider uppercase">Staff Portal</h1>
            <p class="text-xs font-medium text-slate-400 mt-1">Sistem Manajemen Terpadu DV BARRA</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-500/10 text-red-400 text-sm font-bold rounded-xl border border-red-500/20 text-center">
                Autentikasi Gagal! Kredensial tidak valid.
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">ID Akses / Email</label>
                <input type="email" name="email" required placeholder="admin@dvbarra.com" class="w-full px-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-sm text-white focus:outline-none focus:border-dv-main">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Kata Sandi</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full px-4 py-3 bg-slate-900 border border-slate-700 rounded-xl text-sm text-white focus:outline-none focus:border-dv-main">
            </div>
            <button type="submit" class="w-full py-4 bg-dv-main text-white font-extrabold text-sm rounded-xl hover:bg-blue-600 transition-colors mt-2 uppercase tracking-widest">
                Otorisasi Masuk
            </button>
        </form>
        
        <p class="text-center text-[10px] text-slate-500 mt-8 uppercase tracking-widest font-bold">
            Restricted Area • Authorized Personnel Only
        </p>
    </div>
</body>
</html>