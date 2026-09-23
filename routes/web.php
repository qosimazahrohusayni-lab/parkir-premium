<?php

use App\Http\Controllers\AreaParkirController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TarifParkirController;
use App\Http\Controllers\TransaksiParkirController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('owner')->group(function () {
        Route::get('/transaksi', [OwnerController::class, 'transaksi'])->name('owner.transaksi');
        Route::get('/rekap', [OwnerController::class, 'rekap'])->name('owner.rekap');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

        Route::get('/tarif', [TarifParkirController::class, 'index'])->name('admin.tarif.index');
        Route::get('/tarif/create', [TarifParkirController::class, 'create'])->name('admin.tarif.create');
        Route::post('/tarif', [TarifParkirController::class, 'store'])->name('admin.tarif.store');
        Route::get('/tarif/{tarif}/edit', [TarifParkirController::class, 'edit'])->name('admin.tarif.edit');
        Route::put('/tarif/{tarif}', [TarifParkirController::class, 'update'])->name('admin.tarif.update');
        Route::delete('/tarif/{tarif}', [TarifParkirController::class, 'destroy'])->name('admin.tarif.destroy');

        Route::get('/area', [AreaParkirController::class, 'index'])->name('admin.area.index');
        Route::get('/area/create', [AreaParkirController::class, 'create'])->name('admin.area.create');
        Route::post('/area', [AreaParkirController::class, 'store'])->name('admin.area.store');
        Route::get('/area/{area}/edit', [AreaParkirController::class, 'edit'])->name('admin.area.edit');
        Route::put('/area/{area}', [AreaParkirController::class, 'update'])->name('admin.area.update');
        Route::delete('/area/{area}', [AreaParkirController::class, 'destroy'])->name('admin.area.destroy');

        Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('admin.kendaraan.index');
        Route::get('/kendaraan/create', [KendaraanController::class, 'create'])->name('admin.kendaraan.create');
        Route::post('/kendaraan', [KendaraanController::class, 'store'])->name('admin.kendaraan.store');
        Route::get('/kendaraan/{kendaraan}/edit', [KendaraanController::class, 'edit'])->name('admin.kendaraan.edit');
        Route::put('/kendaraan/{kendaraan}', [KendaraanController::class, 'update'])->name('admin.kendaraan.update');
        Route::delete('/kendaraan/{kendaraan}', [KendaraanController::class, 'destroy'])->name('admin.kendaraan.destroy');

        Route::get('/logs', [LogActivityController::class, 'index'])->name('admin.logs.index');
    });

    Route::prefix('petugas')->group(function () {
        Route::get('/transaksi', [PetugasController::class, 'transaksi'])->name('petugas.transaksi');
        Route::get('/struk', [PetugasController::class, 'struk'])->name('petugas.struk');
    });

    Route::get('/transaksi', [TransaksiParkirController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiParkirController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiParkirController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{transaksi}/edit', [TransaksiParkirController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/{transaksi}', [TransaksiParkirController::class, 'update'])->name('transaksi.update');
    Route::delete('/transaksi/{transaksi}', [TransaksiParkirController::class, 'destroy'])->name('transaksi.destroy');
});
