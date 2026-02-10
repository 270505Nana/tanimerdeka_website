<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\Village;

class AnggotaTani extends Model
{
    use HasFactory;

    protected $table = 'anggota_tani';
    protected $primaryKey = 'id_anggota';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'jenis_kelamin',
        'email',
        'no_hp',
        'indonesia_village_id',
        'alamat_detail',
        'id_kelompok_tani',
        'jabatan',
        'password',
        'role',
    ];
    protected $hidden = [
        'password',
    ];

    public function desa()
    {
        return $this->belongsTo(Village::class, 'indonesia_village_id', 'id');
    }

    public function KelompokTani(){
        return $this->hasOne(Kelompok_tani::class,'kelompok_tani','id_kelompok_tani');
    }

    public function masukan(){
        return $this->hasMany(Masukan::class,'masukan','id_masukan');
    }
    public function usaha_anggota(){
        return $this->hasMany(Usaha_anggota::class,'usaha_anggota','id_usaha');
    }

    public function followers(){
        return $this->belongsToMany(
            User::class,'follower','follow_to','follow_from','id_anggota','id_user'
    );
    }

}
