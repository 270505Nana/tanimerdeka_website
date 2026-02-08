<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Struktur_organisasi extends Model
{
    use HasFactory;
    protected $table = 'struktur_organisasi';
    protected $primaryKey = 'id_organisasi';
    protected $fillable = ['nama_lengkap','jabatan','image'];

    public function tentangKami()
    {
        return $this->belongsTo(TentangKami::class, 'id_tentang_kami', 'id_tentang_kami');
    }
}
