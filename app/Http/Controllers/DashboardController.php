<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\TransaksiParkir;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $stats = [
            'pengunjung_hari_ini' => TransaksiParkir::whereDate('jam_masuk', today())->count(),
            'pendapatan_hari_ini' => 'Rp ' . number_format(TransaksiParkir::whereDate('jam_masuk', today())->sum('total_biaya'), 0, ',', '.'),
            'jumlah_kendaraan' => 320,
            'total_transaksi' => TransaksiParkir::count(),
            'role' => $user->role,
        ];

        $recentLogs = ActivityLog::with('user')->latest()->take(5)->get();

        return view('dashboard.index', compact('stats', 'recentLogs'));
    }
}
