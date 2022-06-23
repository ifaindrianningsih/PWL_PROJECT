<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\Pembayaran;

class SPP extends Model
{
    use HasFactory;
    protected $table='spp'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'nama_siswa',
        'kelas_id',
        'jurusan_id',
        'tagihan_id',
        'total_bayar',
        'tgl_transaksi',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nama_siswa');
    }

    public function tagihan()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
