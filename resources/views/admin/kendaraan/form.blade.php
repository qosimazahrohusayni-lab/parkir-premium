@extends('layouts.app')

@section('title', 'Admin - Kendaraan')

@section('content')
<div class="page-box form-box">
    <h2>{{ isset($kendaraan) ? 'Edit Kendaraan' : 'Tambah Kendaraan' }}</h2>
    <form method="POST" action="{{ isset($kendaraan) ? route('admin.kendaraan.update', $kendaraan) : route('admin.kendaraan.store') }}">
        @csrf
        @if(isset($kendaraan)) @method('PUT') @endif
        <input type="text" name="plat_nomor" value="{{ old('plat_nomor', $kendaraan->plat_nomor ?? '') }}" placeholder="Plat Nomor" required>
        <input type="text" name="jenis" value="{{ old('jenis', $kendaraan->jenis ?? '') }}" placeholder="Jenis Kendaraan" required>
        <input type="text" name="merk" value="{{ old('merk', $kendaraan->merk ?? '') }}" placeholder="Merk">
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
