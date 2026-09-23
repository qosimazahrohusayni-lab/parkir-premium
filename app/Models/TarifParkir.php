<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TarifParkir extends Model
{
    protected $table = 'tarif_parkirs';

    protected $fillable = [
        'nama_tarif',
        'jenis_kendaraan',
        'tarif_per_jam',
    ];
}
