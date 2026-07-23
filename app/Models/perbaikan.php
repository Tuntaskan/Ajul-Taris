<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perbaikan extends Model
{
    use HasFactory;
    protected $fillable = [
        'laporankerusakan_id',
        'teknisi_id',
        'tanggal_perbaikan',
        'tanggal_selesai',
        'keterangan',
        'status'
    ];  

    public function laporan()
    {
        return $this->belongsTo(laporankerusakan::class, 'laporankerusakan_id');
    }

    public function teknisi()
    {
        return $this->belongsTo(User::class, 'teknisi_id');
    }
}
