<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Ruang::all();
        $jadwalUserIds = DB::table('jadwal_ruangan')->pluck('id_ruang')->toArray();
        return view('pages.ruang.index')->with([
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
            'ruang' => $request->input('ruang')
        ];

        Ruang::create($data);

        return redirect()
            ->route('ruang.index')
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
            'ruang' => $request->input('ruang')
        ];

        $datas = Ruang::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('ruang.index')
            ->with('warning', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Ruang::findOrFail($id);
        $data->delete();
        return back()->with('error','Data Sudah dihapus');
    }
}
