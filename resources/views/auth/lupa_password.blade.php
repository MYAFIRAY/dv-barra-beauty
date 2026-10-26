<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - DV BARRA Beauty</title>
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

    <!-- Efek Latar Belakang -->
    <div class="fixed top-[-10%] left-[-10%] w-[500px] h-[500px] bg-dv-bg rounded-full mix-blend-multiply filter blur-[80px] opacity-70 pointer-events-none"></div>

    <div class="w-full max-w-md bg-white rounded-3xl shadow-[0_8px_32px_rgba(43,90,142,0.08)] border border-slate-100 p-8 md:p-10 relative z-10">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mx-auto mb-4 text-dv-main">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path></svg>
            </div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Lupa Password?</h1>
            <p class="text-sm font-medium text-slate-500 mt-2 leading-relaxed">Jangan khawatir! Masukkan email kamu yang terdaftar, dan kami akan mengirimkan instruksi untuk mengatur ulang password.</p>
        </div>

        <!-- Form Lupa Password -->
        <form action="#" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email Address</label>
                <input type="email" name="email" required placeholder="nama@email.com" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:border-dv-main focus:bg-white font-medium text-slate-700 transition-all">
            </div>

            <!-- Tombol dengan alert dummy untuk presentasi -->
            <button type="button" onclick="alert('Simulasi Presentasi: Link pemulihan password telah dikirim ke email tersebut (Tahap Pengembangan).')" class="w-full py-4 bg-dv-main text-white font-extrabold text-sm rounded-xl shadow-lg shadow-dv-main/30 hover:bg-dv-dark transition-transform hover:scale-[1.01] cursor-pointer">
                Kirim Link Pemulihan
            </button>
        </form>

        <!-- Tombol Kembali -->
        <div class="mt-8 text-center border-t border-slate-100 pt-6">
            <a href="{{ route('login') }}" class="text-sm font-bold text-slate-500 hover:text-dv-main transition-colors flex items-center justify-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Halaman Login
            </a>
        </div>

    </div>
</body>
</html>