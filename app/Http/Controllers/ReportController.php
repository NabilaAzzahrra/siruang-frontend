<?php

namespace App\Http\Controllers;

use App\Models\JadwalRuangan;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAkademik = TahunAkademik::all();
        return view('pages.report.index')->with([
            'tahunAkademik' => $tahunAkademik
        ]);
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
        $tahunAkademik = $request->input('tahun_akademik');
        $semester = $request->input('semester');
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');

        if ($semester == NULL) {
            $data = JadwalRuangan::where('id_tahun_akademik', $tahunAkademik)
                ->orWhereBetween('tgl_pakai', [$dari, $sampai])
                ->get();

            $dataGroup = JadwalRuangan::join('ruang', 'ruang.id', '=', 'jadwal_ruangan.id_ruang')
                ->selectRaw('ruang as ruang_name, id_ruang, COUNT(*) as total')
                ->where('id_tahun_akademik', $tahunAkademik)
                ->orwhereBetween('tgl_pakai', [$dari, $sampai])
                ->groupBy('ruang.ruang', 'id_ruang')
                ->get();

        } else {
            $data = JadwalRuangan::where('id_tahun_akademik', $tahunAkademik)
                ->where('semester', $semester)
                ->orWhereBetween('tgl_pakai', [$dari, $sampai])
                ->get();

            $dataGroup = JadwalRuangan::join('ruang', 'ruang.id', '=', 'jadwal_ruangan.id_ruang')
                ->selectRaw('ruang.ruang as ruang_name, id_ruang, COUNT(*) as total')
                ->where('id_tahun_akademik', $tahunAkademik)
                ->where('semester', $semester)
                ->orwhereBetween('tgl_pakai', [$dari, $sampai])
                ->groupBy('ruang.ruang', 'id_ruang')
                ->get();
        }

        $ta = TahunAkademik::where('id', $tahunAkademik)->first();

        $labels = $dataGroup->pluck('ruang_name');
        $totals = $dataGroup->pluck('total');

        return view('pages.report.view')->with([
            'tahunAkademik' => $tahunAkademik,
            'semester' => $semester,
            'dari' => $dari,
            'sampai' => $sampai,
            'data' => $data,
            'ta' => $ta,
            'dataGroup' => $dataGroup,
            'labels' => $labels,
            'totals' => $totals,
        ]);
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
}
