<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\SPP;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Tabungan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index (){
        $kelas = Kelas::all()->count();
        $jurusan = Jurusan::all()->count();
        $siswa = Siswa::all()->count();
        $spp_lunas = Pembayaran::where('status','Lunas')->count();
        $spp_belum_lunas = Pembayaran::where('status','Belum Lunas')->count();
        $tabungan = Tabungan::all()->count();
        $title = 'Dashboard';
        return view('layouts.dashboard', compact('kelas','siswa','spp_lunas','spp_belum_lunas','jurusan','tabungan','title'));
    }
}
