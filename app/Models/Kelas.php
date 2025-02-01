<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'kelas',
        'program_studi'
    ];

    protected $table = 'kelas';
    public $timestamps = false;

    public function jadwal()
    {
        return $this->hasMany(JadwalRuangan::class, 'id_kelas');
    }
}
