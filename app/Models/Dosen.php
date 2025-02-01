<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'dosen'
    ];

    protected $table = 'dosen';
    public $timestamps = false;

    public function jadwal()
    {
        return $this->hasMany(JadwalRuangan::class, 'id_dosen');
    }
}
