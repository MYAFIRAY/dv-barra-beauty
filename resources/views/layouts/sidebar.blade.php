<aside class="w-[280px] bg-white h-full flex flex-col border-r border-slate-100 shadow-[4px_0_24px_rgba(0,0,0,0.02)] z-30 relative">
    
    <!-- Logo DV BARRA Asli -->
    <div class="h-24 flex items-center justify-center px-6 mt-4 mb-2 border-b border-slate-50">
        <!-- class w-40 mengatur lebar logonya agar proporsional di sidebar -->
        <img src="{{ asset('images/logo-dv-barra.jpg') }}" alt="Logo DV BARRA" class="w-40 h-auto object-contain mix-blend-multiply">
    </div>

    <!-- Menu Navigasi -->
    <nav class="flex-1 px-4 space-y-1.5 overflow-y-auto">
        <p class="px-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-3 mt-4">Menu Utama</p>
        
        <!-- Menu Inaktif (Contoh Dashboard) -->
        <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 text-slate-500 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 font-semibold group">
            <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
            Dashboard
        </a>
        
        <a href="/produk" class="flex items-center gap-3 px-4 py-3 text-slate-500 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 font-semibold group">
            <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            Produk
        </a>
        
        <a href="/pesanan" class="flex items-center gap-3 px-4 py-3 text-slate-500 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 font-semibold group">
            <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            Pesanan
            <!-- Badge Notifikasi Pintar -->
            <span class="ml-auto bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm">3 Baru</span>
        </a>
        
        <a href="/pengiriman" class="flex items-center gap-3 px-4 py-3 text-slate-500 rounded-xl hover:bg-blue-50 hover:text-blue-600 transition-all duration-200 font-semibold group">
            <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path></svg>
            Pengiriman
        </a>
        
        <p class="px-4 text-[11px] font-bold text-slate-400 uppercase tracking-wider mb-3 mt-6">Sistem</p>

        <!-- Menu Aktif (Contoh Pengaturan) menggunakan Gradient dan Shadow -->
        <a href="/pengaturan" class="flex items-center gap-3 px-4 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-xl font-semibold shadow-lg shadow-blue-500/30 transition-all transform hover:scale-[1.02]">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            Akun & Pengaturan
        </a>
    </nav>

    <!-- Tombol Logout Bawah -->
    <div class="p-4 mt-auto border-t border-slate-100">
        <form action="/logout" method="POST">
            <button type="submit" class="flex items-center gap-3 w-full px-4 py-3 text-slate-500 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all font-semibold group">
                <svg class="w-5 h-5 text-slate-400 group-hover:text-red-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Keluar Sistem
            </button>
        </form>
    </div>
</aside>