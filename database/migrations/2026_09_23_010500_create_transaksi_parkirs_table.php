<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi_parkirs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi', 40)->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('kendaraan_id')->constrained('kendaraans')->restrictOnDelete();
            $table->foreignId('area_id')->constrained('area_parkirs')->restrictOnDelete();
            $table->foreignId('tarif_id')->constrained('tarif_parkirs')->restrictOnDelete();
            $table->dateTime('jam_masuk')->index();
            $table->dateTime('jam_keluar')->nullable()->index();
            $table->unsignedInteger('durasi_menit')->nullable();
            $table->unsignedBigInteger('total_biaya')->default(0);
            $table->enum('metode_pembayaran', ['tunai', 'debit', 'qris', 'lainnya'])->nullable();
            $table->enum('status', ['parkir', 'selesai', 'dibatalkan'])->default('parkir')->index();
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi_parkirs');
    }
};
