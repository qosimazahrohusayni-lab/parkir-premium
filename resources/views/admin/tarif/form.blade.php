@extends('layouts.app')

@section('title', 'Admin - Tarif Parkir')

@section('content')
<div class="page-box form-box">
    <h2>{{ isset($tarif) ? 'Edit Tarif' : 'Tambah Tarif' }}</h2>
    <form method="POST" action="{{ isset($tarif) ? route('admin.tarif.update', $tarif) : route('admin.tarif.store') }}">
        @csrf
        @if(isset($tarif)) @method('PUT') @endif
        <input type="text" name="nama_tarif" value="{{ old('nama_tarif', $tarif->nama_tarif ?? '') }}" placeholder="Nama Tarif" required>
        <input type="text" name="jenis_kendaraan" value="{{ old('jenis_kendaraan', $tarif->jenis_kendaraan ?? '') }}" placeholder="Jenis Kendaraan" required>
        <input type="number" name="tarif_per_jam" value="{{ old('tarif_per_jam', $tarif->tarif_per_jam ?? '') }}" placeholder="Tarif per Jam" required>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
