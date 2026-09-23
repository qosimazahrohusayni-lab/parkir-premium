<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('area_parkirs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_area', 30)->unique();
            $table->string('nama_area');
            $table->unsignedInteger('kapasitas');
            $table->unsignedInteger('terisi')->default(0);
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif')->index();
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('area_parkirs');
    }
};
