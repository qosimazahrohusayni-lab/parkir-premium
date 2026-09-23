# Parkir Premium

Sistem parkir premium berbasis Laravel dengan role Owner, Admin, dan Petugas.

Fitur utama:
- Login / Logout
- Owner: login, logout, rekap transaksi, laporan sesuai kebutuhan
- Admin: login, logout, CRUD user, CRUD tarif parkir, CRUD area parkir, CRUD kendaraan, akses log aktivitas
- Petugas: login, logout, transaksi parkir, cetak struk
- Sidebar premium dengan gaya hitam, emas, dan putih

Struktur proyek:
- app/Http/Controllers
- app/Models
- database/migrations
- database/seeders
- resources/views
- routes/web.php

Cara cepat jalankan:
1. composer install
2. cp .env.example .env
3. php artisan key:generate
4. php artisan migrate --seed
5. php artisan serve

Akun default:
- owner@parkirpremium.com / password
- admin@parkirpremium.com / password
- petugas@parkirpremium.com / password
