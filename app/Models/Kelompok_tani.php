<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravolt\Indonesia\Models\Village;

class Kelompok_tani extends Model
{
     use HasFactory;

    protected $table = 'kelompok_tani';
    protected $primaryKey = 'id_kelompok_tani';

    protected $fillable = [
        'nama_kelompok',
        'nomor_sk',
        'indonesia_village_id', 
        'alamat_detail',  
        'sk',
    ];

    public function desa()
    {
        return $this->belongsTo(Village::class, 'indonesia_village_id', 'id');
    }

    public function Anggotatani(){
        return $this->hasMany(AnggotaTani::class,'anggota_tani','id_anggota');
    }
}
