<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebLaporanController;
use App\Http\Controllers\WebSecAuditLogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('/profile', ProfileController::class);
    Route::resource('/audit-trail', WebSecAuditLogController::class);

    Route::prefix('/pengurusan-pengguna')->group(function () {
        Route::get('/daftar-pengguna', [ProfileController::class, 'daftar_pengguna']);
        Route::get('/senarai-pengguna', [ProfileController::class, 'senarai_pengguna']);
    });

    Route::prefix('/pelaporan')->group(function () {
        Route::get('/semakan-wtd', [WebLaporanController::class, 'semakanWtd']);
        Route::post('/carian-semakan-wtd', [WebLaporanController::class, 'carianSemakanWtd']);

        Route::get('/laporan_gagal_log_masuk', [WebLaporanController::class, 'laporanGagalLogMasuk']);
        Route::post('/carian-gagal-log-masuk', [WebLaporanController::class, 'carianLaporanGagalLogMasuk']);

        Route::get('/laporan_tuntutan_aplikasi', [WebLaporanController::class, 'laporanTuntutanAplikasi']);
        Route::get('/laporan_tempoh_penggunaan_aplikasi', [WebLaporanController::class, 'laporanTempohPenggunaanAplikasi']);

        Route::get('/laporan_permohonan_wtd', [WebLaporanController::class, 'laporanPermohonanWtd']);
    });
});
