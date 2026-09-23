<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role', ['owner', 'admin', 'petugas'])->default('admin');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('phone')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('tarif_parkirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tarif');
            $table->string('jenis_kendaraan');
            $table->integer('tarif_per_jam');
            $table->timestamps();
        });

        Schema::create('area_parkirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_area');
            $table->integer('kapasitas');
            $table->integer('tersedia')->default(0);
            $table->timestamps();
        });

        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('plat_nomor')->unique();
            $table->string('jenis');
            $table->string('merk')->nullable();
            $table->timestamps();
        });

        Schema::create('transaksi_parkirs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('kendaraan_id')->nullable()->constrained('kendaraans');
            $table->foreignId('area_id')->nullable()->constrained('area_parkirs');
            $table->dateTime('jam_masuk');
            $table->dateTime('jam_keluar')->nullable();
            $table->bigInteger('total_biaya')->default(0);
            $table->enum('status', ['parkir', 'selesai'])->default('parkir');
            $table->timestamps();
        });

        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('aktivitas');
            $table->string('module');
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('transaksi_parkirs');
        Schema::dropIfExists('kendaraans');
        Schema::dropIfExists('area_parkirs');
        Schema::dropIfExists('tarif_parkirs');
        Schema::dropIfExists('users');
    }
};
