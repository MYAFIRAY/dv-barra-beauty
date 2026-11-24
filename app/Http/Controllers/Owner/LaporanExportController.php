<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;

class LaporanExportController extends Controller
{
    public function excel(Request $request)
    {
        $query = Pesanan::query();

        // Filter tanggal mulai
        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('created_at', '>=', $request->tanggal_mulai);
        }

        // Filter tanggal akhir
        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('created_at', '<=', $request->tanggal_akhir);
        }

        $pesanans = $query->orderBy('created_at', 'desc')->get();

        $filename = 'laporan-penjualan.csv';

        return response()->streamDownload(function () use ($pesanans) {

            $file = fopen('php://output', 'w');

            // Agar karakter terbaca dengan baik di Excel
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            fputcsv($file, [
                'No Pesanan',
                'Nama Pelanggan',
                'Tanggal Pesanan',
                'Total Harga',
                'Ongkir',
                'Total Tagihan',
                'Metode Pembayaran',
                'Status Pembayaran',
                'Status Pesanan'
            ], ';');

            foreach ($pesanans as $pesanan) {
                fputcsv($file, [
                    $pesanan->no_pesanan,
                    $pesanan->nama_pelanggan,
                    $pesanan->created_at,
                    $pesanan->total_harga,
                    $pesanan->ongkir,
                    $pesanan->total_tagihan,
                    $pesanan->metode_pembayaran,
                    $pesanan->status_pembayaran,
                    $pesanan->status_pesanan
                ], ';');
            }

            fclose($file);

        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
