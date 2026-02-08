<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori_masukan extends Model
{
    use HasFactory;
    protected $table = 'kategori_masukan';
    protected $primaryKey = 'id_kategori';
    protected $fillable = ['jenis'];
    protected $guarded=[];

    public function Masukan(){
        return $this->hasMany(Masukan::class,'id_masukan');
    }
}

