@extends('layouts.app')

@section('title', 'Admin - Log Aktivitas')

@section('content')
<div class="page-box">
    <h2>Log Aktivitas</h2>
    <table>
        <thead>
            <tr>
                <th>Waktu</th>
                <th>Nama</th>
                <th>Aktivitas</th>
                <th>Module</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $log->user->name ?? '-' }}</td>
                    <td>{{ $log->aktivitas }}</td>
                    <td>{{ $log->module }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
