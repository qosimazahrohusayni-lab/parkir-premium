<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarif_parkirs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tarif', 30)->unique();
            $table->string('nama_tarif');
            $table->enum('jenis_kendaraan', ['motor', 'mobil', 'bus', 'truk', 'lainnya'])->index();
            $table->unsignedBigInteger('tarif_per_jam');
            $table->unsignedBigInteger('tarif_maksimal_harian')->nullable();
            $table->boolean('is_active')->default(true)->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarif_parkirs');
    }
};
