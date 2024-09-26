<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    protected $guarded = ['barang_id'];

    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_id');
    }

    public function stok()
    {
        return $this->hasOne(StokBarang::class, 'barang_id');
    }

    public function penjualan_detail()
    {
        return $this->hasMany(PenjualanDetail::class, 'barang_id');
    }
}
