<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Hari;
use App\Models\JadwalRuangan;
use App\Models\JenisKegiatan;
use App\Models\Kelas;
use App\Models\Konfigurasi;
use App\Models\MataKuliah;
use App\Models\Ruang;
use App\Models\Sesi;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\IOFactory;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konfigurasi = Konfigurasi::first();
        $idTahunAkademik = $konfigurasi->id_tahun_akademik;
        $semester = $konfigurasi->semester;
        $data = JadwalRuangan::where('verifikasi', 'JADWAL')->where('id_tahun_akademik', $idTahunAkademik)->where('semester', $semester)->get();
        return view('pages.jadwalRuangan.index')->with([
            'data' => $data,
            'idTahunAkademik' => $idTahunAkademik,
            'semester' => $semester
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mataKuliah = MataKuliah::all();
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $sesi = Sesi::all();
        $ruang = Ruang::all();
        $hari = Hari::all();
        $jenisKegiatan = JenisKegiatan::all();
        return view('pages.jadwalRuangan.create')->with([
            'mataKuliah' => $mataKuliah,
            'dosen' => $dosen,
            'kelas' => $kelas,
            'sesi' => $sesi,
            'ruang' => $ruang,
            'hari' => $hari,
            'jenisKegiatan' => $jenisKegiatan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $konfigurasi = Konfigurasi::first();
        $id_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $semester = $konfigurasi->semester;

        if ($request->input('sesi') == null) {
            $data = [
                'id_mata_kuliah' => $request->input('mata_kuliah'),
                'id_dosen' => $request->input('dosen'),
                'id_kelas' => $request->input('kelas'),
                'id_sesi' => $request->input('sesi_dua'),
                'id_ruang' => $request->input('ruang'),
                'id_tahun_akademik' => $id_tahun_akademik,
                'id_hari' => $request->input('hari'),
                'id_user' => Auth::user()->id,
                'semester' => $semester,
                'status' => 'AKTIF',
                'verifikasi' => 'JADWAL',
                'id_jenis_kegiatan' => 0,
            ];
            $dataDua = [
                'id_mata_kuliah' => $request->input('mata_kuliah'),
                'id_dosen' => $request->input('dosen'),
                'id_kelas' => $request->input('kelas'),
                'id_sesi' => $request->input('sesi_selanjutnya'),
                'id_ruang' => $request->input('ruang'),
                'id_tahun_akademik' => $id_tahun_akademik,
                'id_hari' => $request->input('hari'),
                'id_user' => Auth::user()->id,
                'semester' => $semester,
                'status' => 'AKTIF',
                'verifikasi' => 'JADWAL',
                'id_jenis_kegiatan' => 0,
            ];

            JadwalRuangan::create($data);
            JadwalRuangan::create($dataDua);
        } else {
            $data = [
                'id_mata_kuliah' => $request->input('mata_kuliah'),
                'id_dosen' => $request->input('dosen'),
                'id_kelas' => $request->input('kelas'),
                'id_sesi' => $request->input('sesi'),
                'id_ruang' => $request->input('ruang'),
                'id_tahun_akademik' => $id_tahun_akademik,
                'id_hari' => $request->input('hari'),
                'id_user' => Auth::user()->id,
                'semester' => $semester,
                'status' => 'AKTIF',
                'verifikasi' => 'JADWAL',
                'id_jenis_kegiatan' => 0,
            ];

            JadwalRuangan::create($data);
        }

        return redirect()
            ->route('jadwal.index')
            ->with('message', 'Data Sudah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $konfigurasi = Konfigurasi::first();
        $idTahunAkademik = $konfigurasi->id_tahun_akademik;
        $semester = $konfigurasi->semester;
        $data = JadwalRuangan::where('verifikasi', 'JADWAL')->where('id_tahun_akademik', $idTahunAkademik)->where('semester', $semester)->get();
        return view('pages.jadwalRuanganUser.index')->with([
            'data' => $data,
            'idTahunAkademik' => $idTahunAkademik,
            'semester' => $semester
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function sterilkan(Request $request, string $id)
    {
        $konfigurasi = Konfigurasi::first();
        $idTahunAkademik = $konfigurasi->id_tahun_akademik;
        $semester = $konfigurasi->semester;

        $datas = JadwalRuangan::where('verifikasi', 'JADWAL')
            ->where('id_tahun_akademik', $idTahunAkademik)
            ->where('semester', $semester)
            ->get();

        foreach ($datas as $d) {
            $d->update([
                'status' => $d->status === "AKTIF" ? 'TIDAK AKTIF' : 'AKTIF'
            ]);
        }

        return redirect()
            ->route('jadwal.index')
            ->with('message', 'Data sudah diupdate');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datas = JadwalRuangan::findOrFail($id);
        $status = $datas->status;
        if ($status === "AKTIF") {
            $data = [
                'status' => 'TIDAK AKTIF'
            ];
        } else {
            $data = [
                'status' => 'AKTIF'
            ];
        }
        $datas->update($data);
        return redirect()
            ->route('jadwal.index')
            ->with('message', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = JadwalRuangan::findOrFail($id);
        $data->delete();
        return back()->with('message_delete', 'Data Sudah dihapus');
    }

    public function importExcel(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        // Ambil file
        $file = $request->file('file');

        // Baca file Excel
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        // Loop melalui baris di Excel
        foreach (array_slice($sheet, 1) as $row) {

            $waktuAwal = substr($row[5], 0, 5);

            $sesiAwal = Sesi::where('waktu_sesi', 'like', $waktuAwal . '%')->first();
            $sesiDua = $sesiAwal->id + 1;
            //dd($sesiAwal->id);

            $mataKuliah = $row[0] ?? null;

            // Pastikan mata kuliah tidak null atau kosong
            if (!empty($mataKuliah)) {
                // Periksa apakah mata kuliah sudah ada
                $matKul = MataKuliah::firstOrCreate(['mata_kuliah' => $mataKuliah, 'sks' => $row[1]]);
            } else {
                // Skip jika mata kuliah kosong
                continue;
            }

            // Periksa apakah dosen sudah ada
            $dosenName = $row[2];
            $dosen = Dosen::firstOrCreate(['dosen' => $dosenName]);

            // Periksa apakah kelas sudah ada
            $kelasName = $row[3];
            $kelas = Kelas::firstOrCreate(['kelas' => $kelasName], [
                'program_studi' => $row[4]
            ]);

            // Periksa apakah ruang sudah ada
            $ruangName = $row[6];
            $ruang = Ruang::firstOrCreate(['ruang' => $ruangName]);

            // Periksa apakah tahun akademik sudah ada
            $tahunAkademikName = $row[7];
            $tahunAkademik = TahunAkademik::firstOrCreate(['tahun_akademik' => $tahunAkademikName]);

            // Periksa apakah hari sudah ada
            $hariName = $row[8];
            $hariEnglish = match ($hariName) {
                "MINGGU" => "SUNDAY",
                "SENIN" => "MONDAY",
                "SELASA" => "TUESDAY",
                "RABU" => "WEDNESDAY",
                "KAMIS" => "THURSDAY",
                "JUMAT" => "FRIDAY",
                "SABTU" => "SATURDAY",
                default => "",
            };

            $hari = Hari::firstOrCreate(['hari' => $hariEnglish]);

            // Tambahkan data ke array untuk diinsert
            if ($row[1] > 2) {
                $jadwalData[] = [
                    'id_mata_kuliah'    => $matKul->id,
                    'id_dosen'          => $dosen->id,
                    'id_kelas'          => $kelas->id,
                    'id_sesi'           => $sesiAwal->id,
                    'id_ruang'          => $ruang->id,
                    'id_tahun_akademik' => $tahunAkademik->id,
                    'id_hari'           => $hari->id,
                    'id_user'           => 1,
                    'semester'          => $row[9],
                    'id_jenis_kegiatan' => 0,
                    'status'            => 'AKTIF',
                    'verifikasi'        => 'JADWAL',
                ];
                $jadwalDataDua[] = [
                    'id_mata_kuliah'    => $matKul->id,
                    'id_dosen'          => $dosen->id,
                    'id_kelas'          => $kelas->id,
                    'id_sesi'           => $sesiDua,
                    'id_ruang'          => $ruang->id,
                    'id_tahun_akademik' => $tahunAkademik->id,
                    'id_hari'           => $hari->id,
                    'id_user'           => 1,
                    'semester'          => $row[9],
                    'id_jenis_kegiatan' => 0,
                    'status'            => 'AKTIF',
                    'verifikasi'        => 'JADWAL',
                ];
                if (!empty($jadwalData) && !empty($jadwalDataDua)) {
                    JadwalRuangan::insert($jadwalData);
                    JadwalRuangan::insert($jadwalDataDua);
                }
            } else {
                $jadwalData[] = [
                    'id_mata_kuliah'    => $matKul->id,
                    'id_dosen'          => $dosen->id,
                    'id_kelas'          => $kelas->id,
                    'id_sesi'           => $sesiAwal->id,
                    'id_ruang'          => $ruang->id,
                    'id_tahun_akademik' => $tahunAkademik->id,
                    'id_hari'           => $hari->id,
                    'id_user'           => 1,
                    'semester'          => $row[9],
                    'id_jenis_kegiatan' => 0,
                    'status'            => 'AKTIF',
                    'verifikasi'        => 'JADWAL',
                ];
            }
        }

        // Insert data ke tabel jadwal_ruangan


        return redirect()->back()->with('success', 'Data berhasil diimport!');
    }
}
