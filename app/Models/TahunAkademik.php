<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun_akademik'
    ];


    protected $table = 'tahun_akademik';
    public $timestamps = false;

    public function konfigurasi()
    {
        return $this->hasMany(Konfigurasi::class, 'id_tahun_akademik');
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalRuangan::class, 'id_tahun_akademik');
    }
}
