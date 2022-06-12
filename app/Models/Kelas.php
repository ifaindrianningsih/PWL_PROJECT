<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jurusan;

class Kelas extends Model
{
    use HasFactory;
    protected $table='kelas'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'nama_kelas',
        'jurusan_id',
        'total_siswa',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
