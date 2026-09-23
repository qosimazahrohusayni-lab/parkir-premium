@extends('layouts.app')

@section('title', 'Admin - Area Parkir')

@section('content')
<div class="page-box form-box">
    <h2>{{ isset($area) ? 'Edit Area' : 'Tambah Area' }}</h2>
    <form method="POST" action="{{ isset($area) ? route('admin.area.update', $area) : route('admin.area.store') }}">
        @csrf
        @if(isset($area)) @method('PUT') @endif
        <input type="text" name="nama_area" value="{{ old('nama_area', $area->nama_area ?? '') }}" placeholder="Nama Area" required>
        <input type="number" name="kapasitas" value="{{ old('kapasitas', $area->kapasitas ?? '') }}" placeholder="Kapasitas" required>
        <input type="number" name="tersedia" value="{{ old('tersedia', $area->tersedia ?? '') }}" placeholder="Tersedia" required>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
