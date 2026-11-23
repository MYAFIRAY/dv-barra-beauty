@extends('layouts.app')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div>
        <a href="{{ route('admin.paket-bundling.index') }}"
           class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-blue-600 mb-4 transition-colors">

            <svg class="w-4 h-4"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 19l-7-7 7-7">
                </path>
            </svg>

            Kembali ke Paket Bundling
        </a>

        <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">
            Detail Paket Bundling
        </h1>

        <p class="text-slate-500 mt-1 font-medium">
            Informasi lengkap paket bundling DV BARRA Beauty.
        </p>
    </div>


    {{-- Detail --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Gambar --}}
        <div class="lg:col-span-1">

            <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_2px_12px_rgba(0,0,0,0.04)] overflow-hidden">

                <div class="aspect-square bg-slate-50 flex items-center justify-center">

                    @if($paketBundling->gambar)

                        <img src="{{ asset('storage/' . $paketBundling->gambar) }}"
                             alt="{{ $paketBundling->nama_paket }}"
                             class="w-full h-full object-cover">

                    @else

                        <div class="text-center text-slate-400">

                            <svg class="w-16 h-16 mx-auto mb-3"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.5"
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>

                            </svg>

                            <p class="text-sm font-medium">
                                Tidak ada gambar
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- Informasi Paket --}}
        <div class="lg:col-span-2">

            <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_2px_12px_rgba(0,0,0,0.04)]">

                {{-- Header --}}
                <div class="p-6 border-b border-slate-100">

                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">

                        <div>

                            <span class="inline-block px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-bold uppercase tracking-wider mb-3">
                                Paket Bundling
                            </span>

                            <h2 class="text-2xl font-extrabold text-slate-800">
                                {{ $paketBundling->nama_paket }}
                            </h2>

                        </div>


                        {{-- Status --}}
                        @if($paketBundling->status === 'aktif')

                            <span class="inline-flex items-center w-fit px-3 py-1.5 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200">

                                <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>

                                Aktif

                            </span>

                        @else

                            <span class="inline-flex items-center w-fit px-3 py-1.5 rounded-full text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200">

                                <span class="w-2 h-2 rounded-full bg-slate-400 mr-2"></span>

                                Nonaktif

                            </span>

                        @endif

                    </div>

                </div>


                {{-- Isi --}}
                <div class="p-6 space-y-6">

                    {{-- Harga & Stok --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="p-5 rounded-xl bg-blue-50 border border-blue-100">

                            <p class="text-xs font-bold uppercase tracking-wider text-blue-500">
                                Harga Paket
                            </p>

                            <p class="text-2xl font-extrabold text-slate-800 mt-2">
                                Rp {{ number_format($paketBundling->harga, 0, ',', '.') }}
                            </p>

                        </div>


                        <div class="p-5 rounded-xl bg-slate-50 border border-slate-100">

                            <p class="text-xs font-bold uppercase tracking-wider text-slate-500">
                                Stok Paket
                            </p>

                            <p class="text-2xl font-extrabold mt-2
                                {{ $paketBundling->stok > 0 ? 'text-slate-800' : 'text-red-600' }}">

                                {{ $paketBundling->stok }}

                            </p>

                        </div>

                    </div>


                    {{-- Deskripsi --}}
                    <div>

                        <h3 class="text-sm font-bold text-slate-700 mb-2">
                            Deskripsi Paket
                        </h3>

                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">

                            @if($paketBundling->deskripsi)

                                <p class="text-sm text-slate-600 leading-relaxed whitespace-pre-line">
                                    {{ $paketBundling->deskripsi }}
                                </p>

                            @else

                                <p class="text-sm text-slate-400 italic">
                                    Belum ada deskripsi untuk paket ini.
                                </p>

                            @endif

                        </div>

                    </div>


                    {{-- Informasi Sistem --}}
                    <div>

                        <h3 class="text-sm font-bold text-slate-700 mb-3">
                            Informasi Paket
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>
                                <p class="text-xs text-slate-400">
                                    Dibuat pada
                                </p>

                                <p class="text-sm font-semibold text-slate-700 mt-1">
                                    {{ $paketBundling->created_at?->format('d M Y, H:i') ?? '-' }}
                                </p>
                            </div>

                            <div>
                                <p class="text-xs text-slate-400">
                                    Terakhir diperbarui
                                </p>

                                <p class="text-sm font-semibold text-slate-700 mt-1">
                                    {{ $paketBundling->updated_at?->format('d M Y, H:i') ?? '-' }}
                                </p>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Footer --}}
                <div class="px-6 py-5 border-t border-slate-100 flex justify-between items-center">

                    <a href="{{ route('admin.paket-bundling.index') }}"
                       class="px-5 py-2.5 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200 transition-colors">
                        Kembali
                    </a>


                    <form action="{{ route('admin.paket-bundling.destroy', $paketBundling->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus paket bundling ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="px-5 py-2.5 bg-red-50 text-red-600 font-bold rounded-xl hover:bg-red-600 hover:text-white transition-colors">

                            Hapus Paket

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
@endsection