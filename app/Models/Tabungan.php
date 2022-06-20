<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Jurusan;

class Tabungan extends Model
{
    use HasFactory;
    protected $table= 'tabungan'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'nama_siswa',
        'nis',
        'kelas_id',
        'jurusan_id',
        'nominal',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
