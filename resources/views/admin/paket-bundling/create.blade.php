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
            Tambah Paket Bundling
        </h1>

        <p class="text-slate-500 mt-1 font-medium">
            Tambahkan paket bundling baru untuk produk DV BARRA Beauty.
        </p>
    </div>


    {{-- Error Validasi --}}
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-xl">
            <div class="font-bold mb-2">
                Terdapat kesalahan:
            </div>

            <ul class="list-disc list-inside text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- Form --}}
    <form action="{{ route('admin.paket-bundling.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Informasi Utama --}}
            <div class="lg:col-span-2">

                <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_2px_12px_rgba(0,0,0,0.04)]">

                    <div class="p-6 border-b border-slate-100">
                        <h2 class="text-lg font-bold text-slate-800">
                            Informasi Paket
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Masukkan informasi dasar paket bundling.
                        </p>
                    </div>


                    <div class="p-6 space-y-5">

                        {{-- Nama Paket --}}
                        <div>
                            <label for="nama_paket"
                                   class="block text-sm font-bold text-slate-700 mb-2">
                                Nama Paket
                                <span class="text-red-500">*</span>
                            </label>

                            <input type="text"
                                   id="nama_paket"
                                   name="nama_paket"
                                   value="{{ old('nama_paket') }}"
                                   placeholder="Contoh: Paket Glow Beauty"
                                   required
                                   class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition">

                            @error('nama_paket')
                                <p class="text-red-500 text-xs mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- Deskripsi --}}
                        <div>
                            <label for="deskripsi"
                                   class="block text-sm font-bold text-slate-700 mb-2">
                                Deskripsi Paket
                            </label>

                            <textarea id="deskripsi"
                                      name="deskripsi"
                                      rows="5"
                                      placeholder="Jelaskan isi atau keunggulan paket bundling..."
                                      class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition resize-none">{{ old('deskripsi') }}</textarea>

                            @error('deskripsi')
                                <p class="text-red-500 text-xs mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        {{-- Harga & Stok --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                            {{-- Harga --}}
                            <div>
                                <label for="harga"
                                       class="block text-sm font-bold text-slate-700 mb-2">
                                    Harga Paket
                                    <span class="text-red-500">*</span>
                                </label>

                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 font-semibold">
                                        Rp
                                    </span>

                                    <input type="number"
                                           id="harga"
                                           name="harga"
                                           value="{{ old('harga') }}"
                                           min="0"
                                           step="0.01"
                                           placeholder="0"
                                           required
                                           class="w-full pl-12 pr-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition">
                                </div>

                                @error('harga')
                                    <p class="text-red-500 text-xs mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>


                            {{-- Stok --}}
                            <div>
                                <label for="stok"
                                       class="block text-sm font-bold text-slate-700 mb-2">
                                    Stok Paket
                                    <span class="text-red-500">*</span>
                                </label>

                                <input type="number"
                                       id="stok"
                                       name="stok"
                                       value="{{ old('stok', 0) }}"
                                       min="0"
                                       required
                                       class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition">

                                @error('stok')
                                    <p class="text-red-500 text-xs mt-1">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>


                        {{-- Status --}}
                        <div>
                            <label for="status"
                                   class="block text-sm font-bold text-slate-700 mb-2">
                                Status
                                <span class="text-red-500">*</span>
                            </label>

                            <select id="status"
                                    name="status"
                                    required
                                    class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-100 outline-none transition">

                                <option value="aktif"
                                    {{ old('status', 'aktif') === 'aktif' ? 'selected' : '' }}>
                                    Aktif
                                </option>

                                <option value="nonaktif"
                                    {{ old('status') === 'nonaktif' ? 'selected' : '' }}>
                                    Nonaktif
                                </option>

                            </select>

                            @error('status')
                                <p class="text-red-500 text-xs mt-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                    </div>

                </div>

            </div>


            {{-- Gambar --}}
            <div>

                <div class="bg-white rounded-2xl border border-slate-100 shadow-[0_2px_12px_rgba(0,0,0,0.04)]">

                    <div class="p-6 border-b border-slate-100">

                        <h2 class="text-lg font-bold text-slate-800">
                            Gambar Paket
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Upload gambar paket bundling.
                        </p>

                    </div>


                    <div class="p-6">

                        {{-- Preview --}}
                        <div id="preview-container"
                             class="w-full aspect-square rounded-2xl bg-slate-50 border-2 border-dashed border-slate-200 flex flex-col items-center justify-center text-slate-400 overflow-hidden">

                            <svg id="preview-icon"
                                 class="w-12 h-12 mb-3"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.5"
                                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>

                            </svg>

                            <span id="preview-text"
                                  class="text-sm text-center px-4">
                                Belum ada gambar
                            </span>

                            <img id="preview-image"
                                 src=""
                                 alt="Preview"
                                 class="hidden w-full h-full object-cover">
                        </div>


                        {{-- Input Gambar --}}
                        <div class="mt-4">

                            <label for="gambar"
                                   class="flex items-center justify-center gap-2 w-full px-4 py-3 bg-blue-50 text-blue-600 rounded-xl font-bold cursor-pointer hover:bg-blue-100 transition-colors">

                                <svg class="w-5 h-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-3-3m0 0L9 8m3-3v12">
                                    </path>

                                </svg>

                                Pilih Gambar

                            </label>

                            <input type="file"
                                   id="gambar"
                                   name="gambar"
                                   accept="image/jpeg,image/png,image/webp"
                                   class="hidden">

                            <p class="text-xs text-slate-400 text-center mt-3">
                                JPG, JPEG, PNG, atau WEBP.
                                Maksimal 2 MB.
                            </p>

                            @error('gambar')
                                <p class="text-red-500 text-xs mt-1 text-center">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Tombol --}}
        <div class="flex justify-end gap-3 mt-6">

            <a href="{{ route('admin.paket-bundling.index') }}"
               class="px-6 py-3 bg-slate-100 text-slate-600 font-bold rounded-xl hover:bg-slate-200 transition-colors">
                Batal
            </a>

            <button type="submit"
                    class="px-6 py-3 bg-blue-600 text-white font-bold rounded-xl hover:bg-blue-700 shadow-lg shadow-blue-500/20 transition-colors">

                Simpan Paket Bundling

            </button>

        </div>

    </form>

</div>


{{-- Preview Gambar --}}
<script>
    const gambarInput = document.getElementById('gambar');
    const previewImage = document.getElementById('preview-image');
    const previewIcon = document.getElementById('preview-icon');
    const previewText = document.getElementById('preview-text');

    gambarInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            previewImage.classList.add('hidden');
            previewIcon.classList.remove('hidden');
            previewText.classList.remove('hidden');
            previewImage.src = '';

            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {

            previewImage.src = event.target.result;

            previewImage.classList.remove('hidden');
            previewIcon.classList.add('hidden');
            previewText.classList.add('hidden');

        };

        reader.readAsDataURL(file);
    });
</script>

@endsection