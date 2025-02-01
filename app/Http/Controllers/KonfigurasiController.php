<?php

namespace App\Http\Controllers;

use App\Models\Konfigurasi;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Konfigurasi::all();
        $tahunAkademik = TahunAkademik::all();
        return view('pages.konfigurasi.index')->with([
            'data' => $data,
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
        $data = [
            'id_tahun_akademik' => $request->input('tahun_akademik'),
            'semester' => $request->input('semester')
        ];

        Konfigurasi::create($data);

        return redirect()
            ->route('konfigurasi.index')
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
            'id_tahun_akademik' => $request->input('tahun_akademikk'),
            'semester' => $request->input('semesterr')
        ];

        $datas = Konfigurasi::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('konfigurasi.index')
            ->with('success', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Konfigurasi::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Sudah dihapus');
    }
}
