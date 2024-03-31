<?php

use App\Http\Controllers\AhpController;
use App\Http\Controllers\AhpController2;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SkalaController;
use Illuminate\Support\Facades\Route;

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

// Tidak Autentikasi
Route::get('/', function () {
    return view('user.landing_page');
});
Route::get('/home', function() {
    return redirect('alternatif');
});
Route::get('/petunjuk', function () {
    return view('user.guide_page');
});

// Perhitungan AHP Satu Pengguna
Route::get('/rekomendasi', function () {
    return view('ahp.satu_user.matrix');
});
Route::post('/rekomendasi', [AhpController::class, 'hitungAhp']);

// Perhitungan AHP Dua Pengguna
Route::get('/rekomendasi/dua', function () {
    return view('ahp.dua_user.matrix');
});
Route::post('/rekomendasi/dua', [AhpController2::class, 'hitungAhpGeomean']);

// Autentikasi
Route::middleware(['guest'])->group((function() {
    Route::get('/login', [SesiController::class, 'index'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
}));
Route::middleware(['auth'])->group(function () {
    Route::resource('alternatif', AlternatifController::class);
    Route::resource('/skala/alternatif', SkalaController::class)->names([
        'index' => 'skala.alternatif.index',
        'create' => 'skala.alternatif.create', 
        'store' => 'skala.alternatif.store',
        'show' => 'skala.alternatif.show',
        'destroy' => 'skala.alternatif.destroy',
    ]);
    Route::get('/bobot/alternatif', [SkalaController::class, 'hitungBobotAlternatif']);
    Route::get('/logout', [SesiController::class, 'logout'])->name('logout');
});  






