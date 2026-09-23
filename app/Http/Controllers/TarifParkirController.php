<?php

namespace App\Http\Controllers;

class TarifParkirController extends Controller
{
    public function index()
    {
        return view('admin.tarif.index', [
            'tarifs' => [
                ['nama' => 'Motor', 'jenis' => 'Motor', 'tarif' => 5000],
                ['nama' => 'Mobil', 'jenis' => 'Mobil', 'tarif' => 12000],
                ['nama' => 'Bus', 'jenis' => 'Bus', 'tarif' => 25000],
            ],
        ]);
    }
}
