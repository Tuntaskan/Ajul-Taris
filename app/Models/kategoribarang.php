<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategoribarang extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function barang()
    {
        return $this->hasMany(barang::class, 'kategori_id');
    }
}
