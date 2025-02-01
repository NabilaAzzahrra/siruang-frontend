<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kelas::all();
        $jadwalUserIds = DB::table('jadwal_ruangan')->pluck('id_kelas')->toArray();
        return view('pages.kelas.index')->with([
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
            'kelas' => $request->input('kelas'),
            'program_studi' => $request->input('program_studi')
        ];

        Kelas::create($data);

        return redirect()
            ->route('kelas.index')
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
            'kelas' => $request->input('kelas'),
            'program_studi' => $request->input('program_studi')
        ];

        $datas = Kelas::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('kelas.index')
            ->with('warning', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kelas::findOrFail($id);
        $data->delete();
        return back()->with('error','Data Sudah dihapus');
    }
}
