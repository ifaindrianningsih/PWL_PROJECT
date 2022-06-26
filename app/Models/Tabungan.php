<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Siswa;

class Tabungan extends Model
{
    use HasFactory;
    protected $table= 'tabungan'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'siswa',
        'jurusan_id',
        'kelas_id',
        'nominal',
        'transaksi_akhir',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'siswa_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
