<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravolt\Indonesia\Models\Village;

class Usaha_anggota extends Model
{
    use HasFactory;
    protected $table = 'usaha_anggota';
    protected $primaryKey = 'id_usaha';
    protected $fillable = [
        'id_anggota',
        'nama_produk',
        'id_jenis_usaha',
        'luas_lahan',
        'indonesia_village_id',
        'alamat_detail',
        'tanggal_tanam',
        'tanggal_panen',
        'potensi_panen_pohon',
        'satuan_panen',
        'durasi_panen',
        'potensi_produksi',
        'bobot_hewan',
        'satuan_bobot',
        'jumlah_hewan',
        'harga',
        'image',
        'deskripsi'    
    ];

    public function desa()
    {
        return $this->belongsTo(Village::class, 'indonesia_village_id', 'id');
    }

    public function Anggota(){
        return $this->belongsTo(AnggotaTani::class,'anggota_tani','id_anggota');
    }
    
    public function Jenis_usaha(){
        return $this->belongsTo(jenis_usaha::class,'jenis_usaha','id_jenis_usaha');
    }

    public function disimpanOleh()
    {
        return $this->belongsToMany(
            User::class,        
            'simpan_usaha',     
            'id_usaha',         
            'id_user'           
        )
        ->withPivot('id_simpan') 
        ->withTimestamps();      
    }
}
