<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('plat_nomor', 20)->unique();
            $table->enum('jenis', ['motor', 'mobil', 'bus', 'truk', 'lainnya'])->index();
            $table->string('merk')->nullable();
            $table->string('warna', 50)->nullable();
            $table->string('pemilik')->nullable();
            $table->string('nomor_telepon', 30)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
