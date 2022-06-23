<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaliMuridController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\SPPController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//
Route::get('/dashboard', function () {
    $title = 'Dashboard';
    return view('layouts.dashboard', compact('title')); // mengganti link dashboard
});

// Route::get('/siswa', function () {
//     $title = 'Data Siswa';
//     return view('siswa.index', compact('title'));
// });

// Route::get('/kelas', function () {
//     $title = 'Data Kelas';
//     return view('kelas', compact('title'));
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('walimurid',WaliMuridController::class);

Route::resource('kelas', KelasController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('spp', SPPController::class);
Route::get('siswa/cari/data', [SiswaController::class, 'cari'])->name('siswa.cari');
Route::get('kelas/cari/data', [KelasController::class, 'cari'])->name('kelas.cari');
Route::get('spp/cari/data', [SPPController::class, 'cari'])->name('spp.cari');

Route::resource('pembayaran',PembayaranController::class);

Route::resource('tabungan', TabunganController::class);
Route::get('tabungan/cari/data', [TabunganController::class, 'cari'])->name('tabungan.cari');