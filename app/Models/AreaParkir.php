<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaParkir extends Model
{
    protected $table = 'area_parkirs';

    protected $fillable = [
        'nama_area',
        'kapasitas',
        'tersedia',
    ];
}
