<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laporankerusakan extends Model
{
    use HasFactory;
    protected $fillable = [
        'barang_id',
        'user_id',
        'tanggal_laporan',
        'keterangan',
        'status'
    ];

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function perbaikan()
    {
        return $this->hasOne(perbaikan::class, 'laporankerusakan_id');
    }
}
