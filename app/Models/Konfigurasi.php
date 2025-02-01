<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tahun_akademik',
        'semester'
    ];

    protected $table = 'konfigurasi';
    public $timestamps = false;

    public function tahun_akademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'id_tahun_akademik', 'id');
    }
}
