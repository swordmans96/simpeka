<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_jabatan'
    ];

    protected $table = 'jabatan';

    public function pegawai()
    {
        return $this->hasMany('App\Models\Pegawais', 'id');
    }
}
