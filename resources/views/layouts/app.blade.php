<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DV BARRA Beauty - Admin Panel</title>
    
    <!-- Menggunakan Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Plus Jakarta Sans (Sangat populer di startup profesional) -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: #f3f8ff; /* Biru sangat muda dan bersih */
        }
        
        /* Custom Scrollbar Premium */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="flex h-screen overflow-hidden text-slate-800 antialiased selection:bg-blue-200 selection:text-blue-900">
    
    <!-- Memanggil Sidebar -->
    @include('layouts.sidebar')

    <!-- Area Konten Utama -->
    <div class="flex-1 flex flex-col h-screen relative overflow-hidden">
        
        <!-- Top Navbar (Efek Glassmorphism) -->
        <header class="h-20 bg-white/70 backdrop-blur-md border-b border-white/40 flex items-center justify-end px-8 z-20 sticky top-0">
            <div class="flex items-center gap-6">
                <!-- Tombol Notifikasi -->
                <button class="relative p-2 text-slate-400 hover:text-blue-600 transition-colors rounded-full hover:bg-blue-50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    <!-- Titik Merah Notif -->
                    <span class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 border-2 border-white rounded-full"></span>
                </button>
                
                <!-- Garis Pemisah -->
                <div class="h-8 w-px bg-slate-200"></div>
                
                <!-- Profil Admin -->
                <div class="flex items-center gap-3 cursor-pointer group">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-600 to-blue-400 text-white flex items-center justify-center font-bold shadow-md shadow-blue-500/20 group-hover:scale-105 transition-transform">
                        A
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-bold text-slate-700 group-hover:text-blue-600 transition-colors">Halo, Admin</span>
                        <span class="text-xs text-slate-500 font-medium">Super Admin</span>
                    </div>
                    <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </div>
            </div>
        </header>

        <!-- Area Halaman Dinamis -->
        <main class="flex-1 overflow-y-auto p-8 relative z-0">
            @yield('content')
        </main>
        
    </div>
</body>
</html>