<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\IuranController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\PengumumanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard.index');
});

// Tampilkan halaman index (form + tabel)
Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
// Simpan data pengajuan surat
Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');


Route::get('/warga/tambah', [DataController::class, 'createWarga']);
Route::post('/warga', [DataController::class, 'storeWarga']);

Route::get('/iuran/tambah', [IuranController::class, 'createIuran']);
Route::post('/iuran', [IuranController::class, 'storeIuran']);

// Routes Aduan
Route::resource('aduan', AduanController::class);
Route::resource('pengumuman', PengumumanController::class);
