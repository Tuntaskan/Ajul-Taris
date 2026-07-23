<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perbaikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laporankerusakan_id')->constrained('laporankerusakans')->onDelete('cascade');
            $table->foreignId('teknisi_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('tanggal_perbaikan');
            $table->dateTime('tanggal_selesai')->nullable();
            $table->string('keterangan')->nullable();
            $table->enum('status', ['Menunggu', 'Proses', 'Selesai', 'Tidak Dapat Diperbaiki'])->default('Menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perbaikans');
    }
};
