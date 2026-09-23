<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\AreaParkir;
use App\Models\Kendaraan;
use App\Models\TarifParkir;
use App\Models\TransaksiParkir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiParkirController extends Controller
{
    public function index()
    {
        $transaksis = TransaksiParkir::with(['kendaraan', 'area'])->latest()->get();
        return view('petugas.transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $kendaraans = Kendaraan::all();
        $areas = AreaParkir::all();
        return view('petugas.transaksi.form', compact('kendaraans', 'areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'area_id' => 'required|exists:area_parkirs,id',
            'jam_masuk' => 'required|date',
        ]);

        $jamMasuk = now();
        if ($request->jam_masuk) {
            $jamMasuk = $request->jam_masuk;
        }

        $kode = 'TRX-' . now()->format('YmdHis');
        $biaya = 5000;

        TransaksiParkir::create([
            'kode_transaksi' => $kode,
            'user_id' => Auth::id(),
            'kendaraan_id' => $request->kendaraan_id,
            'area_id' => $request->area_id,
            'jam_masuk' => $jamMasuk,
            'jam_keluar' => null,
            'total_biaya' => $biaya,
            'status' => 'parkir',
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'aktivitas' => 'create_transaksi',
            'module' => 'transaksi',
            'deskripsi' => 'Membuat transaksi parkir ' . $kode,
        ]);

        return redirect()->route('petugas.transaksi')->with('success', 'Transaksi parkir berhasil dibuat.');
    }

    public function edit(TransaksiParkir $transaksi)
    {
        return view('petugas.transaksi.form', compact('transaksi'));
    }

    public function update(Request $request, TransaksiParkir $transaksi)
    {
        $request->validate([
            'status' => 'required|in:parkir,selesai',
        ]);

        $transaksi->status = $request->status;
        $transaksi->jam_keluar = $request->jam_keluar ?? now();
        $transaksi->total_biaya = $request->total_biaya ?? $transaksi->total_biaya;
        $transaksi->save();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'aktivitas' => 'update_transaksi',
            'module' => 'transaksi',
            'deskripsi' => 'Memperbarui transaksi ' . $transaksi->kode_transaksi,
        ]);

        return redirect()->route('petugas.transaksi')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function destroy(TransaksiParkir $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('petugas.transaksi')->with('success', 'Transaksi berhasil dihapus.');
    }
}
