<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawais extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_divisi',
        'id_jabatan',
        'nik',
        'nama'

    ];

    protected $table = 'pegawais';
    public function divisi()
    {
        return $this->belongsTo('App\Models\Divisi', 'id_divisi');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\Models\Jabatan', 'id_jabatan');
    }
}
