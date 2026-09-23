<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\TransaksiParkir;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    public function transaksi()
    {
        $transaksis = TransaksiParkir::with(['kendaraan', 'area'])->latest()->get();
        return view('owner.transaksi', compact('transaksis'));
    }

    public function rekap()
    {
        $total = TransaksiParkir::sum('total_biaya');
        $transaksis = TransaksiParkir::count();

        return view('owner.rekap', [
            'total' => 'Rp ' . number_format($total, 0, ',', '.'),
            'periode' => 'Bulan ini',
            'transaksis' => $transaksis,
        ]);
    }
}
