@extends('layouts.app')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">
                Manajemen Paket Bundling
            </h1>

            <p class="text-slate-500 mt-1 font-medium">
                Kelola paket bundling produk DV BARRA Beauty.
            </p>
        </div>

        <a href="{{ route('admin.paket-bundling.create') }}"
           class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:scale-105 transition-transform">

            <svg class="w-5 h-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="3"
                      d="M12 4v16m8-8H4">
                </path>
            </svg>

            Tambah Paket
        </a>
    </div>


    {{-- Notifikasi Berhasil --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-4 rounded-xl font-medium">
            {{ session('success') }}
        </div>
    @endif


    {{-- Notifikasi Error --}}
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl">
            <ul class="list-disc list-inside text-sm font-medium">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Tabel Paket Bundling --}}
    <div class="bg-white rounded-2xl shadow-[0_2px_12px_rgba(0,0,0,0.04)] border border-slate-100 overflow-hidden">

        {{-- Header Tabel --}}
        <div class="p-6 border-b border-slate-100 bg-slate-50/50">

            <h2 class="text-lg font-bold text-slate-800">
                Daftar Paket Bundling
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Daftar paket bundling yang tersedia di sistem.
            </p>

        </div>


        {{-- Isi Tabel --}}
        <div class="overflow-x-auto">

            <table class="w-full text-left border-collapse">

                <thead>
                    <tr class="bg-white text-slate-400 text-xs uppercase tracking-widest border-b border-slate-100">

                        <th class="px-6 py-5 font-bold w-16">
                            No
                        </th>

                        <th class="px-6 py-5 font-bold">
                            Informasi Paket
                        </th>

                        <th class="px-6 py-5 font-bold">
                            Harga
                        </th>

                        <th class="px-6 py-5 font-bold text-center">
                            Stok
                        </th>

                        <th class="px-6 py-5 font-bold text-center">
                            Status
                        </th>

                        <th class="px-6 py-5 font-bold text-right">
                            Aksi
                        </th>

                    </tr>
                </thead>


                <tbody class="text-sm divide-y divide-slate-100">

                    @forelse($paketBundlings as $index => $paket)

                    <tr class="hover:bg-blue-50/30 transition-colors group">

                        {{-- Nomor --}}
                        <td class="px-6 py-4 font-bold text-slate-500">
                            {{ $index + 1 }}
                        </td>


                        {{-- Informasi Paket --}}
                        <td class="px-6 py-4">

                            <div class="flex items-center gap-4">

                                {{-- Gambar --}}
                                <div class="w-14 h-14 rounded-xl bg-blue-100 border border-blue-200 flex-shrink-0 flex items-center justify-center text-blue-500 overflow-hidden">

                                    @if($paket->gambar)

                                        <img src="{{ asset('storage/' . $paket->gambar) }}"
                                             alt="{{ $paket->nama_paket }}"
                                             class="w-full h-full object-cover">

                                    @else

                                        <svg class="w-7 h-7"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>

                                        </svg>

                                    @endif

                                </div>


                                {{-- Nama dan Deskripsi --}}
                                <div>

                                    <h4 class="font-bold text-slate-800 text-base">
                                        {{ $paket->nama_paket }}
                                    </h4>

                                    @if($paket->deskripsi)

                                        <p class="text-xs text-slate-500 mt-1">
                                            {{ \Illuminate\Support\Str::limit($paket->deskripsi, 60) }}
                                        </p>

                                    @endif

                                    <span class="inline-block mt-1 px-2 py-0.5 rounded bg-purple-100 text-purple-700 text-[10px] font-bold uppercase tracking-wider">
                                        Bundling
                                    </span>

                                </div>

                            </div>

                        </td>


                        {{-- Harga --}}
                        <td class="px-6 py-4 font-extrabold text-slate-800">

                            Rp {{ number_format($paket->harga, 0, ',', '.') }}

                        </td>


                        {{-- Stok --}}
                        <td class="px-6 py-4 text-center font-bold
                            {{ $paket->stok > 0 ? 'text-slate-700' : 'text-red-600' }}">

                            {{ $paket->stok }}

                        </td>


                        {{-- Status --}}
                        <td class="px-6 py-4 text-center">

                            @if($paket->status === 'aktif')

                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">
                                    Aktif
                                </span>

                            @else

                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                    Nonaktif
                                </span>

                            @endif

                        </td>


                        {{-- Aksi --}}
                        <td class="px-6 py-4">

                            <div class="flex justify-end gap-2">

                                {{-- Detail --}}
                                <a href="{{ route('admin.paket-bundling.show', $paket->id) }}"
                                   class="p-2 text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-600 hover:text-white transition-colors"
                                   title="Detail">

                                    <svg class="w-4 h-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                        </path>

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>

                                    </svg>

                                </a>


                                {{-- Hapus --}}
                                <form action="{{ route('admin.paket-bundling.destroy', $paket->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus paket bundling ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="p-2 text-red-600 bg-red-50 rounded-lg hover:bg-red-600 hover:text-white transition-colors"
                                            title="Hapus">

                                        <svg class="w-4 h-4"
                                             fill="none"
                                             stroke="currentColor"
                                             viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>

                                        </svg>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    {{-- Data Kosong --}}
                    <tr>

                        <td colspan="6" class="px-6 py-16 text-center">

                            <div class="flex flex-col items-center">

                                <div class="w-16 h-16 rounded-2xl bg-blue-50 flex items-center justify-center text-blue-500 mb-4">

                                    <svg class="w-8 h-8"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m-8-4l8 4m0 0v10">
                                        </path>

                                    </svg>

                                </div>

                                <h3 class="text-lg font-bold text-slate-800">
                                    Belum Ada Paket Bundling
                                </h3>

                                <p class="text-sm text-slate-500 mt-1 mb-5">
                                    Tambahkan paket bundling pertama untuk toko DV BARRA Beauty.
                                </p>

                                <a href="{{ route('admin.paket-bundling.create') }}"
                                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 transition-colors">

                                    <svg class="w-5 h-5"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M12 4v16m8-8H4">
                                        </path>

                                    </svg>

                                    Tambah Paket

                                </a>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection