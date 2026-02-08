<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Masukan extends Model
{
    use HasFactory;
    protected $table = 'masukan';
    protected $primaryKey = 'id_masukan';
    protected $fillable = ['body'];
    protected $guarded = [];

    public function kategori_masukan(){
        return $this->belongsTo(Kategori_masukan::class,'id_kategori','id_kategori');
    }
    public function masukan_users(){
        return $this->belongsTo(User::class,'users','id_user');
    }
    public function masukan_anggota(){
        return $this->belongsTo(AnggotaTani::class,'anggota_tani','id_anggota');
    }
}
