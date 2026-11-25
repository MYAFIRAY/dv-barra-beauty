<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Panel - DV BARRA Beauty</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: { colors: { 'dv-main': '#2b5a8e', 'dv-dark': '#1a3e6c', 'dv-bg': '#dbe8f6' } }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
<style>
    body {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-color: #f8fafc;
    }

    /* Pengaturan khusus cetak laporan Owner */
    @page {
        size: A4 portrait;
        margin: 12mm;
    }

    @media print {

        /* Berlaku khusus halaman yang memiliki print-area */
        body:has(.print-area) {
            display: block !important;
            height: auto !important;
            min-height: 0 !important;
            overflow: visible !important;
            background: white !important;
            color: #1e293b !important;
        }

        /* Sembunyikan sidebar */
        body:has(.print-area) aside {
            display: none !important;
        }

        /* Hilangkan pembatas tinggi konten */
        body:has(.print-area) > div {
            display: block !important;
            width: 100% !important;
            height: auto !important;
            overflow: visible !important;
        }

        /* Hilangkan scrollbar dan padding dashboard */
        body:has(.print-area) main {
            display: block !important;
            width: 100% !important;
            height: auto !important;
            overflow: visible !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        /* Sembunyikan tombol, filter, dan elemen no-print */
        .no-print {
            display: none !important;
        }

        /* Area laporan */
        .print-area {
            display: block !important;
            width: 100% !important;
            max-width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .print-area > div {
            box-shadow: none !important;
            border: none !important;
            border-radius: 0 !important;
        }

        /* Tabel laporan */
        .print-area table {
            width: 100% !important;
            border-collapse: collapse !important;
            font-size: 10pt !important;
        }

        .print-area thead {
            display: table-header-group;
        }

        .print-area tr {
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .print-area th,
        .print-area td {
            padding: 8px 6px !important;
            border-bottom: 1px solid #cbd5e1 !important;
        }

        /* Pertahankan warna saat dicetak */
        * {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    }
</style>

</head>
<body class="text-slate-800 antialiased flex h-screen overflow-hidden">

    <aside class="w-[280px] bg-white h-full flex flex-col border-r border-slate-100 shadow-[4px_0_24px_rgba(0,0,0,0.02)] z-30 relative">
    
    <!-- Logo -->
    <div class="h-24 flex items-center justify-center px-6 mt-4 mb-2 border-b border-slate-50">
        <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="Logo DV BARRA" class="w-40 h-auto object-contain mix-blend-multiply">
    </div>

    <!-- Menu Navigasi Owner -->
    <nav class="flex-1 px-4 space-y-1.5 overflow-y-auto">
        <p class="px-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-3 mt-4">Menu Utama</p>
        
        <!-- Dashboard Owner -->
        <a href="/owner/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200 group {{ request()->is('owner/dashboard*') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/30 transform scale-[1.02]' : 'text-slate-500 hover:bg-blue-50 hover:text-blue-600' }}">
            <svg class="w-5 h-5 transition-colors {{ request()->is('owner/dashboard*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            Dashboard
        </a>
        
        <!-- Laporan -->
        <a href="/owner/laporan" class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200 group {{ request()->is('owner/laporan*') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/30 transform scale-[1.02]' : 'text-slate-500 hover:bg-blue-50 hover:text-blue-600' }}">
            <svg class="w-5 h-5 transition-colors {{ request()->is('owner/laporan*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            Laporan
        </a>

        <!-- Kelola Admin -->
        <a href="/owner/admin" class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200 group {{ request()->is('owner/admin*') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/30 transform scale-[1.02]' : 'text-slate-500 hover:bg-blue-50 hover:text-blue-600' }}">
            <svg class="w-5 h-5 transition-colors {{ request()->is('owner/admin*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            Kelola Admin
        </a>
        
        <p class="px-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-3 mt-6">Sistem</p>

        <!-- Pengaturan Owner -->
        <a href="/owner/pengaturan" class="flex items-center gap-3 px-4 py-3 rounded-xl font-semibold transition-all duration-200 group {{ request()->is('owner/pengaturan*') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/30 transform scale-[1.02]' : 'text-slate-500 hover:bg-blue-50 hover:text-blue-600' }}">
            <svg class="w-5 h-5 transition-colors {{ request()->is('owner/pengaturan*') ? 'text-white' : 'text-slate-400 group-hover:text-blue-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            Akun & Pengaturan
        </a>
    </nav>

    <!-- Tombol Logout Bawah -->
    <div class="p-4 mt-auto border-t border-slate-100">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 text-slate-500 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all font-semibold group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-red-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar Sistem
            </button>
        </form>
    </div>
</aside>

    <!-- Konten Utama -->
    <div class="flex-1 flex flex-col h-full overflow-hidden">
        <!-- Header Atas -->
        <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-8 flex-shrink-0 no-print">
            <h1 class="text-lg font-extrabold text-slate-800">@yield('title', 'Executive Dashboard')</h1>
            <div class="flex items-center gap-4">
                <span class="text-sm font-bold text-slate-600 bg-slate-50 px-4 py-2 rounded-full border border-slate-200">
                    {{ Auth::check() ? Auth::user()->name : 'Owner' }}
                </span>
            </div>
        </header>

        <!-- Area Konten Dinamis -->
        <main class="flex-1 overflow-y-auto p-6 md:p-8">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>