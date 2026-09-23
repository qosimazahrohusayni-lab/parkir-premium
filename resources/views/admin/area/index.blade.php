@extends('layouts.app')

@section('title', 'Admin - Area Parkir')

@section('content')
<div class="page-box">
    <div class="page-header">
        <h2>Area Parkir</h2>
        <a href="{{ route('admin.area.create') }}" class="btn-primary">Tambah Area</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Area</th>
                <th>Kapasitas</th>
                <th>Tersedia</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($areas as $area)
                <tr>
                    <td>{{ $area->nama_area }}</td>
                    <td>{{ $area->kapasitas }}</td>
                    <td>{{ $area->tersedia }}</td>
                    <td>
                        <a href="{{ route('admin.area.edit', $area) }}" class="link-btn">Edit</a>
                        <form action="{{ route('admin.area.destroy', $area) }}" method="POST" style="display:inline;">
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
