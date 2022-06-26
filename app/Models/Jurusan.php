<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Tabungan;
use App\Models\SPP;
use App\Models\Pembayaran;

class Jurusan extends Model
{
    use HasFactory;
    protected $table='jurusan'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'nama_jurusan',
        'total_kelas',
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function Tabungan()
    {
        return $this->hasMany(Tabungan::class);
    }

    public function spp()
    {
        return $this->hasMany(SPP::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
