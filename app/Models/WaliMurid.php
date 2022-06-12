<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;

class WaliMurid extends Model
{
    use HasFactory;
    protected $table='walimurid'; 
    protected $primaryKey = 'id'; 

    protected $fillable = [
        'nama_siswa',
        'nama_ayah',
        'pekerjaan_ayah',
        'umur_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'umur_ibu',
        'alamat',
    ];

    public function siswa()
    {
        return $this->hasOne(Siswa::class);
    }
}
