<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        $kelas = Kelas::all();
        $adminCount = User::where('role', 'A')->count();
        $jadwalUserIds = DB::table('jadwal_ruangan')->pluck('id_user')->toArray();
        return view('pages.user.index')->with([
            'data' => $data,
            'kelas' => $kelas,
            'adminCount' => $adminCount,
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
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('role'),
            'pw' => $request->input('password'),
        ];

        User::create($data);

        return redirect()
            ->route('user.index')
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
            'name' => $request->input('namee'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => $request->input('rolee'),
        ];

        $datas = User::findOrFail($id);
        $datas->update($data);
        return redirect()
            ->route('user.index')
            ->with('warning', 'Data Sudah diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return back()->with('error','Data Sudah dihapus');
    }
}
