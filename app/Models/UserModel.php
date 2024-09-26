<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    protected $guarded = ['user_id'];

    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }

    public function stokBarang()
    {
        return $this->hasMany(StokBarang::class, 'user_id', 'user_id');
    }

    public function user()
    {
        return $this->hasMany(Penjualan::class, 'user_id', 'user_id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'user_id', 'user_id');
    }
}
