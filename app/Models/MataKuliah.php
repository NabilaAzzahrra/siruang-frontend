<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'mata_kuliah',
        'sks',
    ];

    protected $table = 'mata_kuliah';
    public $timestamps = false;

    public function jadwal()
    {
        return $this->hasMany(JadwalRuangan::class, 'id_mata_kuliah');
    }
}
