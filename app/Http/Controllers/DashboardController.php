<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'pengunjung_hari_ini' => 128,
            'pendapatan_hari_ini' => 'Rp 2.480.000',
            'jumlah_kendaraan' => 320,
            'total_transaksi' => 1520,
        ];

        return view('dashboard.index', compact('stats'));
    }
}
