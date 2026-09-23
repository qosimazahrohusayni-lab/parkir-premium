<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::latest()->get();
        return view('admin.kendaraan.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('admin.kendaraan.form', ['kendaraan' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required|string|max:20|unique:kendaraans',
            'jenis' => 'required|string|max:50',
            'merk' => 'nullable|string|max:100',
        ]);

        Kendaraan::create($request->all());

        ActivityLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'create_kendaraan',
            'module' => 'kendaraan',
            'deskripsi' => 'Menambah kendaraan ' . $request->plat_nomor,
        ]);

        return redirect()->route('admin.kendaraan.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function edit(Kendaraan $kendaraan)
    {
        return view('admin.kendaraan.form', compact('kendaraan'));
    }

    public function update(Request $request, Kendaraan $kendaraan)
    {
        $request->validate([
            'plat_nomor' => 'required|string|max:20|unique:kendaraans,plat_nomor,' . $kendaraan->id,
            'jenis' => 'required|string|max:50',
            'merk' => 'nullable|string|max:100',
        ]);

        $kendaraan->update($request->all());

        ActivityLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'update_kendaraan',
            'module' => 'kendaraan',
            'deskripsi' => 'Memperbarui kendaraan ' . $kendaraan->plat_nomor,
        ]);

        return redirect()->route('admin.kendaraan.index')->with('success', 'Kendaraan berhasil diperbarui.');
    }

    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'delete_kendaraan',
            'module' => 'kendaraan',
            'deskripsi' => 'Menghapus kendaraan ' . $kendaraan->plat_nomor,
        ]);

        return redirect()->route('admin.kendaraan.index')->with('success', 'Kendaraan berhasil dihapus.');
    }
}
