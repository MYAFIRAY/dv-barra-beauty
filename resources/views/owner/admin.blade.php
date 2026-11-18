@extends('layouts.owner')

@section('title', 'Manajemen Akun Admin')

@section('content')
    
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 text-sm rounded-2xl font-bold flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-2xl font-bold flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Form Tambah Admin Baru -->
        <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(43,90,142,0.08)] h-fit">
            <div class="w-12 h-12 bg-dv-bg text-dv-main rounded-2xl flex items-center justify-center mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            </div>
            <h3 class="text-base font-extrabold text-slate-800 mb-1">Tambah Admin Kasir</h3>
            <p class="text-xs font-medium text-slate-400 mb-6">Buat akun baru untuk karyawan toko.</p>

            <form action="{{ route('owner.admin.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                    <input type="text" name="name" required placeholder="Contoh: Budi Santoso" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-dv-main transition-colors">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Email Akses</label>
                    <input type="email" name="email" required placeholder="budi@dvbarra.com" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-dv-main transition-colors">
                </div>
                <div>
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Password Sementara</label>
                    <input type="password" name="password" required placeholder="Minimal 8 karakter" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-dv-main transition-colors">
                </div>
                <button type="submit" class="w-full py-3.5 bg-dv-main text-white font-extrabold text-sm rounded-xl hover:bg-dv-dark transition-colors shadow-lg shadow-dv-main/30 mt-2">
                    Daftarkan Akun
                </button>
            </form>
        </div>

        <!-- Tabel Daftar Akses -->
        <div class="lg:col-span-2 bg-white rounded-3xl border border-slate-100 shadow-[0_8px_30px_rgb(43,90,142,0.08)] p-6 overflow-hidden">
            <h3 class="text-base font-extrabold text-slate-800 mb-6">Daftar Akun Sistem (Pegawai)</h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-100 text-xs font-bold text-slate-400 uppercase tracking-wider">
                            <th class="pb-4">Nama Pegawai</th>
                            <th class="pb-4">Email / Login</th>
                            <th class="pb-4">Hak Akses</th>
                            <th class="pb-4 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50 text-sm font-medium text-slate-600">
                        @foreach($admins as $user)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="py-4 font-bold text-slate-800">{{ $user->name }}</td>
                            <td class="py-4">{{ $user->email }}</td>
                            <td class="py-4">
                                @if($user->role === 'owner')
                                    <span class="px-3 py-1 bg-purple-100 text-purple-700 text-[10px] font-extrabold uppercase tracking-widest rounded-full">Owner</span>
                                @else
                                    <span class="px-3 py-1 bg-dv-bg text-dv-main text-[10px] font-extrabold uppercase tracking-widest rounded-full">Admin Kasir</span>
                                @endif
                            </td>
                            <td class="py-4 text-right">
                                @if($user->role !== 'owner')
                                    <form action="{{ route('owner.admin.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus akses admin ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-bold text-red-500 hover:text-white hover:bg-red-500 bg-red-50 px-3 py-1.5 rounded-lg transition-colors">
                                            Cabut Akses
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs font-bold text-slate-300 italic">Protected</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection