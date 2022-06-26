<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SPP;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Siswa;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table='pembayaran'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'siswa',
        'semester',
        'tagihan',
        'jurusan',
        'kelas',
        'status',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function spp()
    {
        return $this->hasOne(SPP::class);
    }
}
