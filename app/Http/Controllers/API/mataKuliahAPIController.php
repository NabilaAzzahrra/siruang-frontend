<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class mataKuliahAPIController extends Controller
{
    public function get_id_matkul($id)
    {
        $mataKuliah = MataKuliah::where('id', $id)->first();
        return response()->json([
            'mataKuliah' => $mataKuliah,
        ]);
    }
}
