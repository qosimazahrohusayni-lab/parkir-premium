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
                <a href="{{ route('owner.transaksi') }}">Owner - Rekap transaksi</a>
                <a href="{{ route('owner.rekap') }}">Owner - Rekap</a>
                <a href="#">Admin - User</a>
                <a href="#">Admin - Tarif parkir</a>
                <a href="#">Admin - Area parkir</a>
                <a href="#">Admin - Kendaraan</a>
                <a href="#">Admin - Log aktivitas</a>
                <a href="#">Petugas - Transaksi</a>
                <a href="#">Petugas - Cetak struk</a>

                <form method="POST" action="{{ route('logout') }}" style="margin-top: 24px;">
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
