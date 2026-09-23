<?php

namespace App\Http\Controllers;

class AreaParkirController extends Controller
{
    public function index()
    {
        return view('admin.area.index', [
            'areas' => [
                ['nama' => 'Area A', 'kapasitas' => 40, 'tersedia' => 12],
                ['nama' => 'Area B', 'kapasitas' => 30, 'tersedia' => 8],
            ],
        ]);
    }
}
