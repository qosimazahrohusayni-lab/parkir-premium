<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\TarifParkir;
use Illuminate\Http\Request;

class TarifParkirController extends Controller
{
    public function index()
    {
        $tarifs = TarifParkir::latest()->get();
        return view('admin.tarif.index', compact('tarifs'));
    }

    public function create()
    {
        return view('admin.tarif.form', ['tarif' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tarif' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string|max:255',
            'tarif_per_jam' => 'required|integer|min:0',
        ]);

        TarifParkir::create($request->all());

        ActivityLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'create_tarif',
            'module' => 'tarif',
            'deskripsi' => 'Menambah tarif ' . $request->nama_tarif,
        ]);

        return redirect()->route('admin.tarif.index')->with('success', 'Tarif parkir berhasil ditambahkan.');
    }

    public function edit(TarifParkir $tarif)
    {
        return view('admin.tarif.form', compact('tarif'));
    }

    public function update(Request $request, TarifParkir $tarif)
    {
        $request->validate([
            'nama_tarif' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string|max:255',
            'tarif_per_jam' => 'required|integer|min:0',
        ]);

        $tarif->update($request->all());

        ActivityLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'update_tarif',
            'module' => 'tarif',
            'deskripsi' => 'Memperbarui tarif ' . $tarif->nama_tarif,
        ]);

        return redirect()->route('admin.tarif.index')->with('success', 'Tarif parkir berhasil diperbarui.');
    }

    public function destroy(TarifParkir $tarif)
    {
        $tarif->delete();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'delete_tarif',
            'module' => 'tarif',
            'deskripsi' => 'Menghapus tarif ' . $tarif->nama_tarif,
        ]);

        return redirect()->route('admin.tarif.index')->with('success', 'Tarif parkir berhasil dihapus.');
    }
}
