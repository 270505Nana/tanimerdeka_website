<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\bidang_usaha;

class jenis_usaha extends Model
{
    use HasFactory;
    protected $table = 'jenis_usaha';
    protected $primaryKey = 'id_jenis_usaha';
    protected $fillable = ['nama_jenis_usaha'];
    protected $guarded = [];

    public function BidangUsaha(){
        return $this->belongsTo(bidang_usaha::class, 'id_bidang');
    }
    
    public function usaha_anggota(){
        return $this->hasMany(Usaha_anggota::class,'usaha_anggota','id_usaha');
    }
}
