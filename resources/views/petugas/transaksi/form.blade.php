@extends('layouts.app')

@section('title', 'Petugas - Form Transaksi')

@section('content')
<div class="page-box form-box">
    <h2>Input Transaksi Parkir</h2>
    <form method="POST" action="{{ route('transaksi.store') }}">
        @csrf
        <select name="kendaraan_id" required>
            <option value="">Pilih kendaraan</option>
            @foreach ($kendaraans as $kendaraan)
                <option value="{{ $kendaraan->id }}">{{ $kendaraan->plat_nomor }} - {{ $kendaraan->jenis }}</option>
            @endforeach
        </select>

        <select name="area_id" required>
            <option value="">Pilih area parkir</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}">{{ $area->nama_area }}</option>
            @endforeach
        </select>

        <input type="datetime-local" name="jam_masuk" required>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
