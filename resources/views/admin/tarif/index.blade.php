@extends('layouts.app')

@section('title', 'Admin - Tarif Parkir')

@section('content')
<div class="page-box">
    <div class="page-header">
        <h2>Tarif Parkir</h2>
        <a href="{{ route('admin.tarif.create') }}" class="btn-primary">Tambah Tarif</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Tarif</th>
                <th>Jenis</th>
                <th>Tarif / Jam</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tarifs as $tarif)
                <tr>
                    <td>{{ $tarif->nama_tarif }}</td>
                    <td>{{ $tarif->jenis_kendaraan }}</td>
                    <td>Rp {{ number_format($tarif->tarif_per_jam, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.tarif.edit', $tarif) }}" class="link-btn">Edit</a>
                        <form action="{{ route('admin.tarif.destroy', $tarif) }}" method="POST" style="display:inline;">
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
