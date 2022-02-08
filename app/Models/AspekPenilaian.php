<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspekPenilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kategori',
        'nama_aspek',
        'bobot'

    ];

    protected $table = 'aspen';

    public function kategori()
    {
        return $this->belongsTo('App\Models\KategoriPenilaian', 'id_kategori');
    }

    public function kriteria()
    {
        return $this->hasMany('App\Models\KriteriaPenilaian', 'id');
    }
}
