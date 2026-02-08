<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bidang_usaha extends Model
{
    use HasFactory;
    protected $table = 'bidang_usaha';
    protected $primaryKey = 'id_bidang';
    protected $fillable = ['nama_bidang' ];

    protected $guarded = [];

    public function JenisUsaha(){
        // has many jenis usaha
        return $this->hasMany(jenis_usaha::class,'id_bidang','id_bidang');
    }
}
