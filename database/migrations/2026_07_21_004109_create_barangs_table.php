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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategoribarangs')->onDelete('cascade');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('jumlah');
            $table->enum('kondisi', ['Baik', 'Rusak Ringan', 'Rusak Berat', 'Hilang'])->default('Baik');
            $table->string('lokasi');
            $table->dateTime('tanggal_masuk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
