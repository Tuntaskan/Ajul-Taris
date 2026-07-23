<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_id',
        'kode_barang',
        'nama_barang',
        'jumlah',
        'kondisi',
        'lokasi',
        'tanggal_masuk'
    ];

    public function kategori()
    {
        return $this->belongsTo(kategoribarang::class, 'kategori_id');
    }

    public function peminjaman()
    {
        return $this->hasMany(peminjaman::class);
    }

    public function laporanKerusakan()
    {
        return $this->hasMany(laporankerusakan::class);
    }
}
