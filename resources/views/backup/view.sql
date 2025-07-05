-- SESI 6 --
SELECT
  ruang.id AS idRuang,
  ruang.ruang,
  jadwal_ruangan.*,
  hari.hari,
  kelas.kelas,
  kelas.program_studi,
  mata_kuliah.mata_kuliah,
  dosen.dosen,
  jenis_kegiatan.kegiatan
FROM ruang
JOIN (
  SELECT * FROM konfigurasi LIMIT 1
) AS konfigurasi
LEFT JOIN jadwal_ruangan
  ON ruang.id = jadwal_ruangan.id_ruang
  AND jadwal_ruangan.id_sesi = 6
  AND (
    jadwal_ruangan.tgl_pakai = CURDATE()
    OR DAYNAME(CURDATE()) = (
      SELECT hari FROM hari WHERE id = jadwal_ruangan.id_hari LIMIT 1
    )
  )
  AND jadwal_ruangan.id_tahun_akademik = konfigurasi.id_tahun_akademik
  AND jadwal_ruangan.semester = konfigurasi.semester
LEFT JOIN hari
  ON hari.id = jadwal_ruangan.id_hari
LEFT JOIN kelas
  ON kelas.id = jadwal_ruangan.id_kelas
LEFT JOIN mata_kuliah
  ON mata_kuliah.id = jadwal_ruangan.id_mata_kuliah
LEFT JOIN dosen
  ON dosen.id = jadwal_ruangan.id_dosen
LEFT JOIN jenis_kegiatan
  ON jenis_kegiatan.id = jadwal_ruangan.id_jenis_kegiatan
ORDER BY ruang.id ASC
LIMIT 0, 25;
