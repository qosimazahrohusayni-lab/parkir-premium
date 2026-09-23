<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiParkir extends Model
{
    protected $table = 'transaksi_parkirs';

    protected $fillable = [
        'kode_transaksi',
        'user_id',
        'kendaraan_id',
        'area_id',
        'jam_masuk',
        'jam_keluar',
        'total_biaya',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function area()
    {
        return $this->belongsTo(AreaParkir::class, 'area_id');
    }
}
