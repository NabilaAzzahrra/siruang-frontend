<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_ruangan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_mata_kuliah');
            $table->integer('id_dosen');
            $table->integer('id_kelas');
            $table->integer('id_sesi');
            $table->integer('id_ruang');
            $table->integer('id_tahun_akademik');
            $table->integer('id_hari');
            $table->integer('id_user');
            $table->string('semester');
            $table->integer('id_jenis_kegiatan');
            $table->string('no_hp');
            $table->date('tgl_pakai');
            $table->string('status');
            $table->string('verifikasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_ruangan');
    }
};
