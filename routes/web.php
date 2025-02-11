<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JenisKegiatanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\TahunAkademikController;
use App\Http\Controllers\UserController;
use App\Models\Dosen;
use App\Models\JenisKegiatan;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Ruang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $mataKuliah = MataKuliah::all();
    $dosen = Dosen::all();
    $kelas = Kelas::all();
    $jenisKegiatan = JenisKegiatan::all();
    $ruang = Ruang::get();
    return view('welcome')->with([
        'mataKuliah' => $mataKuliah,
        'dosen' => $dosen,
        'kelas' => $kelas,
        'jenisKegiatan' => $jenisKegiatan,
        'ruang' => $ruang,
    ]);
});

Route::get('/dashboard', function () {
    $mataKuliah = MataKuliah::all();
    $dosen = Dosen::all();
    $kelas = Kelas::all();
    $jenisKegiatan = JenisKegiatan::all();
    $ruang = Ruang::get();

    $id_kelas = Kelas::where('kelas', Auth::user()->name)->first();
    return view('dashboard')->with([
        'mataKuliah' => $mataKuliah,
        'dosen' => $dosen,
        'kelas' => $kelas,
        'jenisKegiatan' => $jenisKegiatan,
        'ruang' => $ruang,
        'id_kelas' => $id_kelas,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('dosen', DosenController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('jenisKegiatan', JenisKegiatanController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('konfigurasi', KonfigurasiController::class);
    Route::resource('mataKuliah', MataKuliahController::class);
    Route::resource('pemesanan', PemesananController::class);
    Route::resource('ruang', RuangController::class);
    Route::resource('tahunAkademik', TahunAkademikController::class);
    Route::resource('user', UserController::class);
    Route::resource('booking', BookingController::class);
    Route::resource('report', ReportController::class);
    Route::patch('/sterilkan/{id}', [JadwalController::class, 'sterilkan'])->name('jadwal.sterilkan');
    Route::post('/importExcel', [JadwalController::class, 'importExcel'])->name('jadwal.importExcel');
    Route::patch('/up/{id}', [JadwalController::class, 'up'])->name('jadwal.up');
});
Route::get('/target-halaman/{tgl}', [BookingController::class, 'targetHalaman'])->name('booking.targetHalaman');

require __DIR__ . '/auth.php';
