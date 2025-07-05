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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $konfigurasi = Konfigurasi::first();
        $id_tahun_akademik = $konfigurasi->id_tahun_akademik;
        $semester = $konfigurasi->semester;
        $idKonfigurasi = $konfigurasi->id;

        $tgl_pakai = date('l', strtotime($request->input('tgl_pakai')));
        $hari_english = strtoupper($tgl_pakai);
        $hari = Hari::get();
        $idHari = $hari->firstWhere('hari', $hari_english)?->id;

        $data = [
            'id_mata_kuliah' => $request->input('mata_kuliah'),
            'id_dosen' => $request->input('dosen'),
            'id_kelas' => $request->input('kelas'),
            'id_sesi' => $request->input('sesi'),
            'id_ruang' => $request->input('ruang'),
            'id_tahun_akademik' => $id_tahun_akademik,
            'id_hari' => $idHari,
            'id_user' => Auth::user()->id,
            'id_konfigurasi' => $idKonfigurasi,
            'semester' => $semester,
            'status' => 'AKTIF',
            'verifikasi' => 'BOOKED',
            'tgl_pakai' => $request->input('tgl_pakai'),
            'no_hp' => $request->input('no_hp'),
            'id_jenis_kegiatan' => $request->input('jenis_kegiatan'),
        ];

        JadwalRuangan::create($data);

        $tglPakai = $request->input('tgl_pakai');
        $dataKegiatan = JenisKegiatan::where('id', $request->input('jenis_kegiatan'))->first();
        $kegiatan = $dataKegiatan->kegiatan;

        $dataDosen = Dosen::where('id', $request->input('dosen'))->first();
        $dosen = $dataDosen->dosen;

        $dataKelas = Kelas::where('id', $request->input('kelas'))->first();
        $kelas = $dataKelas->kelas;

        $dataRuang = Ruang::where('id', $request->input('ruang'))->first();
        $ruang = $dataRuang->ruang;

        //MESSAGE
        Http::post('http://localhost:3000/send-wa', [
            'phone' => '6287732016515',
            'message' => "PEMESANAN RUANGAN\n\n" .
                "RUANG    : " . $ruang . "\n" .
                "KELAS    : " . $kelas . "\n" .
                "DOSEN    : " . $dosen . "\n" .
                "KEGIATAN : " . $kegiatan . "\n\n" .
                "TANGGAL PAKAI : " . $tglPakai . "\n\n" .
                "TERIMA KASIH"
        ]);

        return back()->with('message_insert', 'Data Sudah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function targetHalaman($tgl)
    {
        $data = DB::table('satu_all')
            ->where(function ($query) use ($tgl) {
                $query->where('tgl_pakai', $tgl)
                    ->where('verifikasi', 'BOOKED');
            })
            ->orWhere(function ($query) use ($tgl) {
                $query->where('hari', DB::raw('DAYNAME("' . $tgl . '")'))
                    ->where('verifikasi', 'JADWAL');
            })
            ->get();

        $dataDua = DB::table('dua_all')
            ->where(function ($query) use ($tgl) {
                $query->where('tgl_pakai', $tgl)
                    ->where('verifikasi', 'BOOKED');
            })
            ->orWhere(function ($query) use ($tgl) {
                $query->where('hari', DB::raw('DAYNAME("' . $tgl . '")'))
                    ->where('verifikasi', 'JADWAL');
            })
            ->get();

        $dataTiga = DB::table('tiga_all')
            ->where(function ($query) use ($tgl) {
                $query->where('tgl_pakai', $tgl)
                    ->where('verifikasi', 'BOOKED');
            })
            ->orWhere(function ($query) use ($tgl) {
                $query->where('hari', DB::raw('DAYNAME("' . $tgl . '")'))
                    ->where('verifikasi', 'JADWAL');
            })
            ->get();

        $dataEmpat = DB::table('empat_all')
            ->where(function ($query) use ($tgl) {
                $query->where('tgl_pakai', $tgl)
                    ->where('verifikasi', 'BOOKED');
            })
            ->orWhere(function ($query) use ($tgl) {
                $query->where('hari', DB::raw('DAYNAME("' . $tgl . '")'))
                    ->where('verifikasi', 'JADWAL');
            })
            ->get();
        $dataLima = DB::table('lima_all')
            ->where(function ($query) use ($tgl) {
                $query->where('tgl_pakai', $tgl)
                    ->where('verifikasi', 'BOOKED');
            })
            ->orWhere(function ($query) use ($tgl) {
                $query->where('hari', DB::raw('DAYNAME("' . $tgl . '")'))
                    ->where('verifikasi', 'JADWAL');
            })
            ->get();

        $dataEnam = DB::table('enam_all')
            ->where(function ($query) use ($tgl) {
                $query->where('tgl_pakai', $tgl)
                    ->where('verifikasi', 'BOOKED');
            })
            ->orWhere(function ($query) use ($tgl) {
                $query->where('hari', DB::raw('DAYNAME("' . $tgl . '")'))
                    ->where('verifikasi', 'JADWAL');
            })
            ->get();

        $ruang = Ruang::all();
        $mataKuliah = MataKuliah::all();
        $dosen = Dosen::all();
        $kelas = Kelas::all();
        $jenisKegiatan = JenisKegiatan::all();
        $tgl = $tgl;
        $id_kelas = Kelas::where('kelas', Auth::user()->name)->first();
        return view('target', ['tanggal' => $tgl])->with([
            'data' => $data,
            'dataDua' => $dataDua,
            'dataTiga' => $dataTiga,
            'dataEmpat' => $dataEmpat,
            'dataLima' => $dataLima,
            'dataEnam' => $dataEnam,
            'ruang' => $ruang,
            'mataKuliah' => $mataKuliah,
            'dosen' => $dosen,
            'kelas' => $kelas,
            'jenisKegiatan' => $jenisKegiatan,
            'tgl' => $tgl,
            'id_kelas' => $id_kelas,
        ]);
    }
}
