<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    use HasFactory;

    protected $fillable = [
        'hari'
    ];

    protected $table = 'hari';
    public $timestamps = false;

    public function jadwal()
    {
        return $this->hasMany(JadwalRuangan::class, 'id_hari');
    }
}
