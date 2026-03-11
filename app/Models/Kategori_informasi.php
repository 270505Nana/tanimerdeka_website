<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori_informasi extends Model
{
    use HasFactory;
    protected $table = 'kategori_informasi';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['jenis'];

    public function pusat_informasi(){
        return $this->hasMany(Pusat_informasi::class,'pusat_informasi','id_informasi');
    }
}

