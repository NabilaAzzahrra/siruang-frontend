<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan'
    ];

    protected $table = 'jenis_kegiatan';
    public $timestamps = false;
}
