<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Parkir Premium')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <div class="brand">
                <div class="brand-badge">P</div>
                <div>
                    <strong>Parkir Premium</strong>
                    <small>Management System</small>
                </div>
            </div>

            <nav>
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('owner.transaksi') }}">Owner - Transaksi</a>
                <a href="{{ route('owner.rekap') }}">Owner - Rekap</a>
                <a href="{{ route('admin.users.index') }}">Admin - User</a>
                <a href="{{ route('admin.tarif.index') }}">Admin - Tarif</a>
                <a href="{{ route('admin.area.index') }}">Admin - Area</a>
                <a href="{{ route('admin.kendaraan.index') }}">Admin - Kendaraan</a>
                <a href="{{ route('admin.logs.index') }}">Admin - Log Aktivitas</a>
                <a href="{{ route('petugas.transaksi') }}">Petugas - Transaksi</a>
                <a href="{{ route('petugas.struk') }}">Petugas - Cetak Struk</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </nav>
        </aside>

        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>
