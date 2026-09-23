@extends('layouts.app')

@section('title', 'Petugas - Cetak Struk')

@section('content')
<div class="page-box">
    <h2>Cetak Struk</h2>

    @foreach ($transaksis as $trx)
        <div class="receipt-box">
            <strong>Parkir Premium</strong>
            <p>Kode: {{ $trx->kode_transaksi }}</p>
            <p>Plat: {{ $trx->kendaraan->plat_nomor ?? '-' }}</p>
            <p>Area: {{ $trx->area->nama_area ?? '-' }}</p>
            <p>Jam Masuk: {{ $trx->jam_masuk }}</p>
            <p>Total: Rp {{ number_format($trx->total_biaya, 0, ',', '.') }}</p>
            <button class="print-btn" onclick="window.print()">Cetak</button>
        </div>
    @endforeach
</div>
@endsection
