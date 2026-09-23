<?php

namespace App\Http\Controllers;

class OwnerController extends Controller
{
    public function transaksi(Request $request)
    {
        $data = [
            ['kode' => 'TRX-001', 'jam_masuk' => '07:20', 'plat' => 'B 1234 ABC', 'tarif' => 'Rp 5.000', 'status' => 'Selesai'],
            ['kode' => 'TRX-002', 'jam_masuk' => '08:15', 'plat' => 'AB 9999 ZY', 'tarif' => 'Rp 12.000', 'status' => 'Selesai'],
        ];

        return view('owner.transaksi', ['data' => $data]);
    }

    public function rekap()
    {
        return view('owner.rekap', [
            'total' => 'Rp 18.650.000',
            'periode' => 'Bulan Ini',
        ]);
    }
}
