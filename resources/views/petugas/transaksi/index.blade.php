@extends('layouts.app')

@section('title', 'Petugas - Transaksi')

@section('content')
<div class="page-box">
    <div class="page-header">
        <h2>Transaksi Parkir</h2>
        <a href="{{ route('transaksi.create') }}" class="btn-primary">Tambah Transaksi</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Kendaraan</th>
                <th>Area</th>
                <th>Jam Masuk</th>
                <th>Biaya</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $trx)
                <tr>
                    <td>{{ $trx->kode_transaksi }}</td>
                    <td>{{ $trx->kendaraan->plat_nomor ?? '-' }}</td>
                    <td>{{ $trx->area->nama_area ?? '-' }}</td>
                    <td>{{ $trx->jam_masuk }}</td>
                    <td>Rp {{ number_format($trx->total_biaya, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($trx->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
