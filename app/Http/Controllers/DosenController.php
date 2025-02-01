<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Dosen::all();
        $jadwalUserIds = DB::table('jadwal_ruangan')->pluck('id_kelas')->toArray();
        return view('pages.dosen.index')->with([
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
            'dosen' => $request->input('dosen')
        ];

        Dosen::create($data);

        return redirect()
            ->route('dosen.index')
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
            'dosen' => $request->input('dosen')
        ];

        $datas = Dosen::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('dosen.index')
            ->with('warning', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Dosen::findOrFail($id);
        $data->delete();
        return back()->with('error','Data Sudah dihapus');
    }
}
