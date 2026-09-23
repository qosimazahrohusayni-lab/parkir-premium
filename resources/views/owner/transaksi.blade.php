@extends('layouts.app')

@section('title', 'Owner Rekap Transaksi')

@section('content')
<div class="page-box">
    <h2>Rekap Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Jam Masuk</th>
                <th>Plat</th>
                <th>Tarif</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row['kode'] }}</td>
                    <td>{{ $row['jam_masuk'] }}</td>
                    <td>{{ $row['plat'] }}</td>
                    <td>{{ $row['tarif'] }}</td>
                    <td>{{ $row['status'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
