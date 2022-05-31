<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

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
}
