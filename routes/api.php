<?php

use App\Http\Controllers\API\mataKuliahAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/mataKuliah/{id}', [mataKuliahAPIController::class, 'get_id_matkul']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
