<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;

    protected $fillable = [
        'ruang'
    ];

    protected $table = 'ruang';
    public $timestamps = false;

    public function jadwal()
    {
        return $this->hasMany(JadwalRuangan::class, 'id_ruang');
    }
}
