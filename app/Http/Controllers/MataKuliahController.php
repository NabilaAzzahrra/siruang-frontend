<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MataKuliah::all();
        $jadwalUserIds = DB::table('jadwal_ruangan')->pluck('id_mata_kuliah')->toArray();
        return view('pages.mataKuliah.index')->with([
            'data' => $data,
            'jadwalUserIds' => $jadwalUserIds
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
            'mata_kuliah' => $request->input('mata_kuliah'),
            'sks' => $request->input('sks'),
        ];

        MataKuliah::create($data);

        return redirect()
            ->route('mataKuliah.index')
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
            'mata_kuliah' => $request->input('mata_kuliah'),
            'sks' => $request->input('skss')
        ];

        $datas = MataKuliah::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('mataKuliah.index')
            ->with('warning', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = MataKuliah::findOrFail($id);
        $data->delete();
        return back()->with('error','Data Sudah dihapus');
    }
}
