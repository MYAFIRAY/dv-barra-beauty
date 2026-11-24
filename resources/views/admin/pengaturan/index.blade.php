@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div>
        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Pengaturan Akun Kasir</h1>
        <p class="text-slate-500 mt-1 font-medium">Kelola profil dan keamanan akun Anda.</p>
    </div>

    @if(session('success'))
        <div class="p-4 bg-green-50 border border-green-200 text-green-700 text-sm rounded-2xl font-bold">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="p-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-2xl font-bold">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 p-8">
        <form action="{{ route('admin.pengaturan.update') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ auth()->user()->name ?? 'Admin Kasir' }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Email Akun</label>
                <input type="email" name="email" value="{{ auth()->user()->email ?? 'kasir@dvbarra.com' }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            </div>

            <hr class="border-slate-100 my-6">
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Password Baru (Opsional)</label>
                <input type="password" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            </div>

            <div class="pt-4 flex justify-end">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:bg-blue-700 transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection