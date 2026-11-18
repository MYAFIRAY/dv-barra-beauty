<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - DV BARRA Beauty</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { theme: { extend: { colors: { 'dv-main': '#2b5a8e', 'dv-dark': '#1a3e6c', 'dv-bg': '#dbe8f6' } } } }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; } </style>
</head>
<body class="text-slate-800 antialiased flex items-center justify-center min-h-screen p-4">
    
    <div class="bg-white max-w-md w-full rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(43,90,142,0.08)] p-8">
        <div class="text-center mb-8">
            <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="DV BARRA" class="h-14 w-auto mx-auto mb-4 object-contain">
            <h1 class="text-2xl font-extrabold text-slate-800">Buat Akun Baru</h1>
            <p class="text-sm font-medium text-slate-500">Daftar sekarang untuk mulai berbelanja.</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 text-red-600 text-sm font-bold rounded-xl border border-red-100 text-center">
                Email sudah digunakan atau password kurang dari 8 karakter.
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: M Yafi Ray" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-dv-main transition-colors">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Alamat Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="Contoh: yafi@gmail.com" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-dv-main transition-colors">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase mb-2">Password</label>
                <input type="password" name="password" required placeholder="Minimal 8 karakter" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-dv-main transition-colors">
            </div>
            <button type="submit" class="w-full py-3.5 bg-dv-main text-white font-extrabold text-sm rounded-xl hover:bg-dv-dark shadow-lg shadow-dv-main/30 transition-transform hover:scale-[1.02] mt-2">
                Daftarkan Akun
            </button>
        </form>
        
        <div class="mt-8 pt-6 border-t border-slate-100 text-center">
            <a href="{{ route('login') }}" class="text-sm font-bold text-slate-400 hover:text-dv-main transition-colors">
                Sudah punya akun? Masuk di sini
            </a>
        </div>
    </div>

</body>
</html>