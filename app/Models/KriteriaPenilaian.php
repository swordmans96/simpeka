<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaPenilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_aspen',
        'Deskripsi',
        'min',
        'max'
    ];

    protected $table = 'kriteriapenilaian';
    public function aspen()
    {
        return $this->belongsTo('App\Models\AspekPenilaian', 'id_aspen');
    }
}
