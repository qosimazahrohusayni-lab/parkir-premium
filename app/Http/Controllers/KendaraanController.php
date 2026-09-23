<?php

namespace App\Http\Controllers;

class KendaraanController extends Controller
{
    public function index()
    {
        return view('admin.kendaraan.index', [
            'kendaraans' => [
                ['plat' => 'B 1234 ABC', 'jenis' => 'Motor', 'merk' => 'Yamaha'],
                ['plat' => 'AB 4951 ZY', 'jenis' => 'Mobil', 'merk' => 'Toyota'],
            ],
        ]);
    }
}
