<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\LaboratoriumController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'storeLogin']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister']);
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('user')->group(function () {
    Route::get('/user', [UserController::class, 'indexuser']);

    //PIMPINAN
    Route::get('/registrasi-perusahaan/pimpinan/edit', [PerusahaanController::class, 'editPimpinan']);
    Route::post('/registrasi-perusahaan/pimpinan/edit', [PerusahaanController::class, 'updatePimpinan']);
    Route::get('/registrasi-perusahaan/profil', [PerusahaanController::class, 'profilperusahaanbaru']);
    Route::get('/registrasi-perusahaan/formpimpinan', [PerusahaanController::class, 'profilPimpinan']);
    Route::post('/store-pimpinan', [PerusahaanController::class, 'postPimpinan']);

    //PERUSAHAAN
    Route::get('/registrasi-perusahaan', [PerusahaanController::class, 'profilperusahaan']);
    Route::get('/registrasi-perusahaan/perusahan/edit', [PerusahaanController::class, 'editPerusahaan']);
    Route::post('/registrasi-perusahaan/perusahan/edit', [PerusahaanController::class, 'updatePerusahan']);
    Route::post('/store-perusahaan', [PerusahaanController::class, 'postperusahaan']);

    //LABORATORIUM
    Route::get('/laboratorium', [LaboratoriumController::class, 'listLaboratorium']);
    Route::post('/laboratorium', [LaboratoriumController::class, 'postLab']);
    Route::post('/laboratorium/{labID}/lab-update', [LaboratoriumController::class, 'editLab']);
    Route::get('/laboratorium/{labID}/lab-delete', [LaboratoriumController::class, 'deleteLab']);

    //LAPORAN
    Route::get('/laporan', [LaporanController::class, 'listLaporan']);
    Route::get('/laporan/{id}/detail', [LaporanController::class, 'laporandetail']);
    Route::get('/laporan/baru', [LaporanController::class, 'laporanbaru']);
    Route::post('/store-laporan', [LaporanController::class, 'postLaporan']);
    Route::get('/laporan/{id}/edit', [LaporanController::class, 'editLaporan']);
    Route::post('/laporan/{id}/edit', [LaporanController::class, 'updateLaporan']);
    Route::get('/laporan/{laporID}/delete', [LaporanController::class, 'deleteLap']);

    Route::get('/download/{file_lampiran}', [UserController::class, 'download']);
    Route::get('/riwayat', [UserController::class, 'riwayatlap']);
    Route::post('/lokasi-administrasi', [PerusahaanController::class, 'lokasiAdministrasi']);
});


Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);

    //DATA USER
    Route::post('/admin/tambah', [AdminController::class, 'storeAdmin']);
    Route::get('/admin/user', [AdminController::class, 'userList']);
    Route::get('/admin/adminlist', [AdminController::class, 'adminList']);
    Route::get('/admin/user/{id}/aktifasi', [AdminController::class, 'aktifasi']);
    Route::get('/admin/{userID}/user-delete', [AdminController::class, 'userDelete']);

    //DATA BIDANG
    Route::get('/admin/bidang', [AdminController::class, 'bidangList']);
    Route::post('/admin/bidang', [AdminController::class, 'bidangPost']);
    Route::post('/admin/{id}/bidang', [AdminController::class, 'editBidang']);
    Route::get('/admin/{bidangID}/bidang-delete', [AdminController::class, 'bidangDelete']);

    //DATA PERUSAHAAN DAN PIMPINAN
    Route::get('/admin/perusahaan/list', [AdminController::class, 'perusahaanList']);
    Route::get('/download/{filescan_perusahaan}', [AdminController::class, 'download']);
    Route::get('/admin/{perusahaanID}/perusahaan-delete', [AdminController::class, 'perusahaanDelete']);
    Route::get('/status_setuju/{id}', [AdminController::class, 'status_setuju']);
    Route::get('/status_tolak/{id}', [AdminController::class, 'status_tolak']);

    //DATA LABORATORIUM
    Route::get('/admin/perusahaan/laboratorium', [AdminController::class, 'laboratoriumList']);
    Route::get('/admin/perusahaan/laboratorium/{id}/aktifasi', [AdminController::class, 'aktifasiPerusahaan']);
    Route::post('/admin/perusahaan/laboratorium', [AdminController::class, 'postLab']);
    Route::post('/admin/{labID}/lab-update', [AdminController::class, 'editLab']);
    Route::get('/admin/{labID}/lab-delete', [AdminController::class, 'deleteLab']);

    //DATA LAPORAN
    Route::get('/admin/laporan', [AdminController::class, 'laporanList']);
    Route::get('/admin/laporan/{id}/detail', [AdminController::class, 'laporandetail']);
    Route::get('/admin/{laporID}/hapus', [AdminController::class, 'laporanhapus']);
    Route::get('/download/laporan/{filescan_laporan}', [AdminController::class, 'downloadLaporan']);
    Route::get('/status_disetuju/{id}', [AdminController::class, 'status_disetuju']);
    Route::get('/status_ditolak/{id}', [AdminController::class, 'status_ditolak']);

    Route::get('/admin/kadar/{id}/tambah', [AdminController::class, 'addkadar']);
    Route::post('/admin/kadar/{id}/tambah', [AdminController::class, 'addkadarStore']);

    //FEEDBACK
    Route::get('/admin/feedback/{id}/tambah', [AdminController::class, 'addFeedback']);
    Route::post('/admin/feedback/{id}/tambah', [AdminController::class, 'addFeedbackStore']);
    Route::get('/admin/feedback/{id}/delete', [AdminController::class, 'deleteFeedback']);

    //EXPORT FILE EXCEL
    Route::get('/cetak/laporan/{date1}/{date2}/{bidang}/{lokasi}', [ExportController::class, 'laporanView']);
    Route::get('/cetak/laporan/{date1}/{date2}/export', [ExportController::class, 'laporanExport']);
    Route::get('/cetak/laporan', [ExportController::class, 'cetakLaporan']);
    Route::get('/export', [ExportController::class, 'export']);
    Route::get('/rekapitulasi', [AdminController::class, 'seleksirekap']);
    Route::get('/rekapitulasi/{tahun}-{bulan}', [AdminController::class, 'rekapitulasi']);
});
