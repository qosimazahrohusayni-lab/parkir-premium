@extends('layouts.app')

@section('title', 'Dashboard - Parkir Premium')

@section('content')
<div class="dashboard">
    <h1>Dashboard Parkir Premium</h1>

    <div class="stats-grid">
        <div class="stat-card">
            <span>Pengunjung hari ini</span>
            <strong>{{ $stats['pengunjung_hari_ini'] }}</strong>
        </div>
        <div class="stat-card">
            <span>Pendapatan hari ini</span>
            <strong>{{ $stats['pendapatan_hari_ini'] }}</strong>
        </div>
        <div class="stat-card">
            <span>Jumlah kendaraan</span>
            <strong>{{ $stats['jumlah_kendaraan'] }}</strong>
        </div>
        <div class="stat-card">
            <span>Total transaksi</span>
            <strong>{{ $stats['total_transaksi'] }}</strong>
        </div>
    </div>

    <div class="panel-box">
        <h3>Aktivitas Terbaru</h3>
        <ul class="activity-list">
            @foreach ($recentLogs as $log)
                <li>
                    <strong>{{ $log->user->name ?? 'System' }}</strong>
                    <span>{{ $log->aktivitas }}</span>
                    <small>{{ $log->created_at->format('d M Y H:i') }}</small>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
