<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\TransaksiParkir;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    public function transaksi()
    {
        $transaksis = TransaksiParkir::with(['kendaraan', 'area'])->latest()->get();
        return view('petugas.transaksi.index', compact('transaksis'));
    }

    public function struk()
    {
        $transaksis = TransaksiParkir::with(['kendaraan', 'area'])->latest()->take(10)->get();
        return view('petugas.struk.index', compact('transaksis'));
    }
}
