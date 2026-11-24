
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk - DV BARRA Beauty</title>
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
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }
    </style>
</head>

<body class="text-slate-800 antialiased min-h-screen">

    <!-- Header Customer -->
    <header class="bg-white border-b border-slate-200 shadow-sm">
        <div class="max-w-5xl mx-auto px-4 md:px-6 h-16 md:h-20 flex items-center justify-between">

            <a href="{{ route('keranjang') }}"
               class="text-slate-500 hover:text-dv-main font-bold text-sm">
                ← Kembali ke Keranjang
            </a>

            <img src="{{ asset('images/logo-dv-barra.jpg') }}"
                 alt="DV BARRA"
                 class="h-10 md:h-12 w-auto object-contain">

            <div class="w-24"></div>
        </div>
    </header>

    <!-- Konten Detail Produk -->
    <main class="max-w-5xl mx-auto px-4 md:px-6 py-8 md:py-12">

        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5 md:p-8">

            <h1 class="text-2xl font-extrabold text-slate-800 mb-8">
                Detail Produk
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- Foto Produk -->
                <div class="bg-slate-50 rounded-2xl overflow-hidden">
                    @if($produk->gambar)
                        <img src="{{ asset('images/produk/' . $produk->gambar) }}"
                             alt="{{ $produk->nama_produk }}"
                             class="w-full h-80 object-cover">
                    @endif
                </div>

                <!-- Informasi Produk -->
                <div>
                    <h2 class="text-2xl font-extrabold mb-4">
                        {{ $produk->nama_produk }}
                    </h2>

                    <p class="text-xl font-extrabold text-dv-main mb-6">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </p>

                    <div class="border-t border-slate-100 pt-5">
                        <h3 class="font-bold mb-2">
                            Deskripsi Produk
                        </h3>

                        <p class="text-sm text-slate-600 leading-relaxed">
                            {{ $produk->deskripsi ?? 'Belum ada deskripsi produk.' }}
                        </p>
                    </div>

                    <a href="{{ route('keranjang') }}"
                       class="inline-block mt-8 px-6 py-3 bg-dv-main text-white font-bold text-sm rounded-xl hover:bg-dv-dark">
                        ← Kembali ke Keranjang
                    </a>
                </div>

            </div>
        </div>
    </main>

</body>
</html>
