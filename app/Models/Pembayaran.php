<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SPP;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table='pembayaran'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'nama_siswa',
        'semester',
        'tagihan',
        'terbayar',
        'total',
        'status',
    ];

    public function spp()
    {
        return $this->hasOne(SPP::class);
    }
}
