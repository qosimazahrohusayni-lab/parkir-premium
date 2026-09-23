<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\AreaParkir;
use Illuminate\Http\Request;

class AreaParkirController extends Controller
{
    public function index()
    {
        $areas = AreaParkir::latest()->get();
        return view('admin.area.index', compact('areas'));
    }

    public function create()
    {
        return view('admin.area.form', ['area' => null]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_area' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'tersedia' => 'required|integer|min:0',
        ]);

        AreaParkir::create($request->all());

        ActivityLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'create_area',
            'module' => 'area',
            'deskripsi' => 'Menambah area parkir ' . $request->nama_area,
        ]);

        return redirect()->route('admin.area.index')->with('success', 'Area parkir berhasil ditambahkan.');
    }

    public function edit(AreaParkir $area)
    {
        return view('admin.area.form', compact('area'));
    }

    public function update(Request $request, AreaParkir $area)
    {
        $request->validate([
            'nama_area' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'tersedia' => 'required|integer|min:0',
        ]);

        $area->update($request->all());

        ActivityLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'update_area',
            'module' => 'area',
            'deskripsi' => 'Memperbarui area parkir ' . $area->nama_area,
        ]);

        return redirect()->route('admin.area.index')->with('success', 'Area parkir berhasil diperbarui.');
    }

    public function destroy(AreaParkir $area)
    {
        $area->delete();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => 'delete_area',
            'module' => 'area',
            'deskripsi' => 'Menghapus area parkir ' . $area->nama_area,
        ]);

        return redirect()->route('admin.area.index')->with('success', 'Area parkir berhasil dihapus.');
    }
}
