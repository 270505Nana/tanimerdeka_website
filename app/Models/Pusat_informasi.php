<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pusat_informasi extends Model
{
    use HasFactory;
    protected $table = 'pusat_informasi';
    protected $primaryKey = 'id_informasi';
    protected $fillable = ['body','image'];

    public function kategori_informasi(){
        return $this->belongsTo(Kategori_informasi::class,'kategori_informasi','id_kategori');
    }
}
