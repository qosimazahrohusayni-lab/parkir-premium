@extends('layouts.app')

@section('title', 'Admin - Kendaraan')

@section('content')
<div class="page-box">
    <div class="page-header">
        <h2>Daftar Kendaraan</h2>
        <a href="{{ route('admin.kendaraan.create') }}" class="btn-primary">Tambah Kendaraan</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Plat Nomor</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kendaraans as $kendaraan)
                <tr>
                    <td>{{ $kendaraan->plat_nomor }}</td>
                    <td>{{ $kendaraan->jenis }}</td>
                    <td>{{ $kendaraan->merk }}</td>
                    <td>
                        <a href="{{ route('admin.kendaraan.edit', $kendaraan) }}" class="link-btn">Edit</a>
                        <form action="{{ route('admin.kendaraan.destroy', $kendaraan) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="danger-btn">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
