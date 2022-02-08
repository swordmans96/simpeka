<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_divisi'
    ];

    protected $table = 'divisi';

    public function pegawai()
    {
        return $this->hasMany('App\Models\Pegawais', 'id');
    }
}
