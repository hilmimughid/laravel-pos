<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';

    public function user()
    {
        return $this->BelongsTo(UserModel::class, 'user_id');
    }

    public function penjualan_detail()
    {
        return $this->hasMany(PenjualanDetail::class, 'penjualan_id');
    }
}
