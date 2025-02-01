<?php

namespace App\Http\Controllers;

use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TahunAkademikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TahunAkademik::all();
        $jadwalUserIds = DB::table('jadwal_ruangan')->pluck('id_tahun_akademik')->toArray();
        return view('pages.tahunAkademik.index')->with([
            'data' => $data,
            'jadwalUserIds' => $jadwalUserIds,
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
        $data = [
            'tahun_akademik' => $request->input('tahun_akademik')
        ];

        TahunAkademik::create($data);

        return redirect()
            ->route('tahunAkademik.index')
            ->with('success', 'Data Sudah ditambahkan');
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
        $data = [
            'tahun_akademik' => $request->input('tahun_akademik')
        ];

        $datas = TahunAkademik::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('tahunAkademik.index')
            ->with('warning', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TahunAkademik::findOrFail($id);
        $data->delete();
        return back()->with('error','Data Sudah dihapus');
    }
}
