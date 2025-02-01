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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konfigurasi = Konfigurasi::first();
        $idTahunAkademik = $konfigurasi->id_tahun_akademik;
        $semester = $konfigurasi->semester;
        $data = JadwalRuangan::where('verifikasi', 'BOOKED')->where('id_tahun_akademik', $idTahunAkademik)->where('semester', $semester)->orderBy('tgl_pakai', 'DESC')->get();
        return view('pages.pemesanan.index')->with([
            'data' => $data
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
        return view('pages.pemesanan.create')->with([
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

        $tgl_pakai = date('l', strtotime($request->input('tgl_pakai')));
        $hari_english = strtoupper($tgl_pakai);
        $hari = Hari::get();
        $idHari = $hari->firstWhere('hari', $hari_english)?->id;
        /*DB::beginTransaction();

        try {
            $konfigurasi = Konfigurasi::first();
            $id_tahun_akademik = $konfigurasi->id_tahun_akademik;
            $semester = $konfigurasi->semester;

            $tgl_pakai = date('l', strtotime($request->input('tgl_pakai')));
            $hari_english = strtoupper($tgl_pakai);
            $hari = Hari::get();
            $idHari = $hari->firstWhere('hari', $hari_english)?->id;

            if ($request->input('sesi') == null) {
                $data = [
                    'id_mata_kuliah' => $request->input('mata_kuliah'),
                    'id_dosen' => $request->input('dosen'),
                    'id_kelas' => $request->input('kelas'),
                    'id_sesi' => $request->input('sesi_dua'),
                    'id_ruang' => $request->input('ruang'),
                    'id_tahun_akademik' => $id_tahun_akademik,
                    'id_hari' => $idHari,
                    'id_user' => Auth::user()->id,
                    'semester' => $semester,
                    'status' => 'AKTIF',
                    'verifikasi' => 'BOOKED',
                    'tgl_pakai' => $request->input('tgl_pakai'),
                    'no_hp' => $request->input('no_hp'),
                    'id_jenis_kegiatan' => $request->input('jenis_kegiatan'),
                ];
                $dataDua = [
                    'id_mata_kuliah' => $request->input('mata_kuliah'),
                    'id_dosen' => $request->input('dosen'),
                    'id_kelas' => $request->input('kelas'),
                    'id_sesi' => $request->input('sesi_selanjutnya'),
                    'id_ruang' => $request->input('ruang'),
                    'id_tahun_akademik' => $id_tahun_akademik,
                    'id_hari' => $idHari,
                    'id_user' => Auth::user()->id,
                    'semester' => $semester,
                    'status' => 'AKTIF',
                    'verifikasi' => 'BOOKED',
                    'tgl_pakai' => $request->input('tgl_pakai'),
                    'no_hp' => $request->input('no_hp'),
                    'id_jenis_kegiatan' => $request->input('jenis_kegiatan'),
                ];

                JadwalRuangan::create($data);
                JadwalRuangan::create($dataDua);
            } else {*/
                $data = [
                    'id_mata_kuliah' => $request->input('mata_kuliah'),
                    'id_dosen' => $request->input('dosen'),
                    'id_kelas' => $request->input('kelas'),
                    'id_sesi' => $request->input('sesi'),
                    'id_ruang' => $request->input('ruang'),
                    'id_tahun_akademik' => $id_tahun_akademik,
                    'id_hari' => $idHari,
                    'id_user' => Auth::user()->id,
                    'semester' => $semester,
                    'status' => 'AKTIF',
                    'verifikasi' => 'BOOKED',
                    'tgl_pakai' => $request->input('tgl_pakai'),
                    'no_hp' => $request->input('no_hp'),
                    'id_jenis_kegiatan' => $request->input('jenis_kegiatan'),
                ];

                JadwalRuangan::create($data);
                return back()->with('message_insert', 'Data Sudah ditambahkan');
            /*}

            DB::commit(); // Commit transaksi jika semua berhasil
            return redirect()
                ->route('pemesanan.index')
                ->with('message', 'Data Sudah ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaksi jika ada error

            // Log error untuk debugging
            Log::error('Error menyimpan data: ' . $e->getMessage());

            // Tampilkan halaman error dengan pesan
            return view('error', ['error' => $e->getMessage()]);
        }*/
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $konfigurasi = Konfigurasi::first();
        $idTahunAkademik = $konfigurasi->id_tahun_akademik;
        $semester = $konfigurasi->semester;
        $data = JadwalRuangan::where('id_user', Auth::user()->id)->where('verifikasi', 'BOOKED')->where('id_tahun_akademik', $idTahunAkademik)->where('semester', $semester)->orderBy('tgl_pakai', 'DESC')->get();
        return view('pages.pemesananUser.index')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

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
            ->route('pemesanan.index')
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
}
