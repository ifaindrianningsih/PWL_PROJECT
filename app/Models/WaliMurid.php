<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliMurid extends Model
{
    use HasFactory;
    protected $table = 'walmur';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama_siswa',
        'nama_ayah',
        'pekerjaan_ayah',
        'umur_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'umur_ibu',
        'alamat',
    ];
}