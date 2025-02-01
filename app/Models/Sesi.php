<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;

    protected $fillable = [
        'sesi',
        'waktu_sesi',
    ];

    protected $table = 'sesi';
    public $timestamps = false;

    public function jadwal()
    {
        return $this->hasMany(Sesi::class, 'id_sesi');
    }
}
