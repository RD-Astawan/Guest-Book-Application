<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukutamuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PPIDController;
use App\Http\Controllers\KSPPController;


Route::get('/', function () {
    return view('Home.v_formulir_kunjungan');
});
Route::get('/login', function () {
    return view('v_login');
})->name('login');

Route::post('/store_bt', [BukutamuController::class, 'store'])->name('buku_tamu_store');
Route::post('/postlogin', [LoginController::class, 'login'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::group(['middleware'=>['auth:kspp,ppid','cekusers:kspp,ppid']],function(){
//     route::post('/beranda', [LoginController::class, 'beranda'])->name('beranda');
// });
//Admin Home page after login
// Route::group(['middleware'=>'kspp'], function() {
//     Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
// });
// Route::group(['middleware'=>'ppid'], function() {
//     Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
// });
Route::group(['middleware'=>['auth:kspp,ppid']], function() {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
});
Route::group(['middleware'=>['auth:ppid']], function() {
    //Route data kunjungan
    Route::get('/data_kunjungan', [PPIDController::class, 'v_data_kunjungan'])->name('data_kunjungan');
    Route::get('/add_data_kunjungan', [PPIDController::class, 'v_add_data_kunjungan'])->name('add_data_kunjungan');
    Route::post('/store_data_kunjungan', [PPIDController::class, 'store_data_kunjungan'])->name('store_data_kunjungan');
    Route::get('/data_kunjungan/edit/{id}', [PPIDController::class, 'edit_data_kunjungan'])->name('edit_data_kunjungan');
    Route::post('/data_kunjungan/update/{id}', [PPIDController::class, 'update_data_kunjungan'])->name('update_data_kunjungan');
    Route::get('/data_kunjungan/destroy/{id}', [PPIDController::class, 'destroy_data_kunjungan'])->name('destroy_data_kunjungan');
    //Route data layanan
    Route::get('/data_layanan', [PPIDController::class, 'show_data_layanan'])->name('data_layanan');
    Route::get('/data_layanan/edit/{id}', [PPIDController::class, 'edit_data_layanan'])->name('edit_data_layanan');
    Route::post('/data_layanan/update/{id}', [PPIDController::class, 'update_data_layanan'])->name('update_data_layanan');
    Route::get('/data_layanan/destroy/{id}', [PPIDController::class, 'destroy_data_layanan'])->name('destroy_data_layanan');
    //Route data grafik
    Route::get('/index_grafik', [PPIDController::class, 'index_grafik'])->name('index_grafik');
    //Route Laporan
    Route::get('/index_lap_kunjungan', [PPIDController::class, 'index_lap_kunjungan'])->name('index_lap_kunjungan');
    Route::get('/set_lap_kunjungan', [PPIDController::class, 'set_lap_kunjungan'])->name('set_lap_kunjungan');
    Route::get('/cetak_lap_kunjungan', [PPIDController::class, 'cetak_lap_kunjungan'])->name('cetak_lap_kunjungan');
    Route::get('/index_lap_layanan', [PPIDController::class, 'index_lap_layanan'])->name('index_lap_layanan');
    Route::get('/set_lap_layanan', [PPIDController::class, 'set_lap_layanan'])->name('set_lap_layanan');
    Route::get('/cetak_lap_layanan', [PPIDController::class, 'cetak_lap_layanan'])->name('cetak_lap_layanan');
    //Route Pengaturan
    Route::get('/edit_pengaturan', [PPIDController::class, 'edit_pengaturan'])->name('edit_pengaturan');
    Route::post('/update_pengaturan', [PPIDController::class, 'update_pengaturan'])->name('update_pengaturan');
    //Route Dashboard PPID
    Route::get('/ppid_dashboard', [PPIDController::class, 'ppid_dashboard'])->name('ppid_dashboard');
});
    Route::group(['middleware'=>['auth:kspp']], function() {
    //Route Dashboard KSPP
    Route::get('/kspp_dashboard', [KSPPController::class, 'kspp_dashboard'])->name('kspp_dashboard');
    Route::get('/index_lap_kunjungan_kspp', [KSPPController::class, 'index_lap_kunjungan'])->name('index_lap_kunjungan_kspp');
    Route::get('/konfirm/{kode}', [KSPPController::class, 'update_konfirm_kunjungan'])->name('update_konfirm_kunjungan');
    Route::get('/konfirm2/{kode}', [KSPPController::class, 'update_konfirm_kunjungan2'])->name('update_konfirm_kunjungan2');
    Route::get('/index_lap_layanan_kspp', [KSPPController::class, 'index_lap_layanan'])->name('index_lap_layanan_kspp');
    Route::get('/konfirmBtn/{kode}', [KSPPController::class, 'update_konfirm_layanan'])->name('update_konfirm_layanan');
    Route::get('/konfirmBtn2/{kode}', [KSPPController::class, 'update_konfirm_layanan2'])->name('update_konfirm_layanan2');
    Route::get('/edit_pengaturan_kspp', [KSPPController::class, 'edit_pengaturan_kspp'])->name('edit_pengaturan_kspp');
    Route::post('/update_pengaturan_kspp', [KSPPController::class, 'update_pengaturan_kspp'])->name('update_pengaturan_kspp');
});

