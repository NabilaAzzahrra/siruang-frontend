<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalRuangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mata_kuliah',
        'id_dosen',
        'id_kelas',
        'id_sesi',
        'id_ruang',
        'id_tahun_akademik',
        'id_hari',
        'id_user',
        'semester',
        'id_jenis_kegiatan',
        'no_hp',
        'tgl_pakai',
        'status',
        'verifikasi',
    ];

    protected $table = 'jadwal_ruangan';
    public $timestamps = false;

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'id_mata_kuliah', 'id');
    }
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen', 'id');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'id_sesi', 'id');
    }
    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'id_ruang', 'id');
    }
    public function tahun_akademik()
    {
        return $this->belongsTo(TahunAkademik::class, 'id_tahun_akademik', 'id');
    }
    public function hari()
    {
        return $this->belongsTo(Hari::class, 'id_hari', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
