<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WalmurController;
use App\Http\Controllers\KelasController;


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

Route::get('/siswa', function () {
    $title = 'Data Siswa';
    return view('siswa.index', compact('title'));
});

Route::get('/kelas', function () {
    $title = 'Data Kelas';
    return view('kelas', compact('title'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('walmur',WalmurController::class);

Route::resource('kelas', KelasController::class);
//Route::resource('siswa', SiswaController::class);
