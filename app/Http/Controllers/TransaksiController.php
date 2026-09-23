<?php

namespace App\Http\Controllers;

class TransaksiController extends Controller
{
    public function index()
    {
        return view('petugas.transaksi.index', [
            'transaksis' => [
                ['kode' => 'TRX-001', 'kendaraan' => 'B 1234 ABC', 'masuk' => '07:20', 'keluar' => '08:15', 'total' => 'Rp 12.000'],
                ['kode' => 'TRX-002', 'kendaraan' => 'AB 9999 ZY', 'masuk' => '08:15', 'keluar' => '10:10', 'total' => 'Rp 22.000'],
            ],
        ]);
    }
}
