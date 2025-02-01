<?php

namespace App\Http\Controllers;

use App\Models\JenisKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = JenisKegiatan::all();
        $jadwalUserIds = DB::table('jadwal_ruangan')->pluck('id_jenis_kegiatan')->toArray();
        return view('pages.jenisKegiatan.index')->with([
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
            'kegiatan' => $request->input('jenis_kegiatan')
        ];

        JenisKegiatan::create($data);

        return redirect()
            ->route('jenisKegiatan.index')
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
            'kegiatan' => $request->input('jenis_kegiatan')
        ];

        $datas = JenisKegiatan::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('jenisKegiatan.index')
            ->with('warning', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = JenisKegiatan::findOrFail($id);
        $data->delete();
        return back()->with('error','Data Sudah dihapus');
    }
}
