<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPenilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_penilaian'
    ];

    protected $table = 'kategoripenilaian';

    public function aspen()
    {
        return $this->hasMany('App\Models\AspekPenilaian', 'id');
    }
}
