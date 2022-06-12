<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\WaliMurid;

class Siswa extends Model
{
    use HasFactory;
    protected $table='siswa'; 
    protected $primaryKey = 'id_siswa'; 

    protected $fillable = [
        'foto',
        'nis',
        'nama',
        'jeniskelamin',
        'kelas_id',
        'alamat',
        'walmur_id',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function walmur()
    {
        return $this->belongsTo(WaliMurid::class);
    }
}
