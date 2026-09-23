@extends('layouts.app')

@section('title', 'Owner - Rekap')

@section('content')
<div class="page-box">
    <h2>Rekap Parkir</h2>
    <div class="summary-card">
        <span>Total Pendapatan</span>
        <strong>{{ $total }}</strong>
        <small>{{ $periode }}</small>
    </div>

    <div class="summary-meta">
        <span>Jumlah transaksi: {{ $transaksis }}</span>
    </div>
</div>
@endsection
