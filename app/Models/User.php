<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravolt\Indonesia\Models\Village;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id_user';
    protected $fillable = [
       'nama_lengkap',
        'nik',
        'jenis_kelamin',
        'email',
        'no_hp',
        'indonesia_village_id', 
        'alamat_detail',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    // protected function casts(): array
    // {
    //     return [
    //         'email_verified_at' => 'datetime',
    //         'password' => 'hashed',
    //     ];
    // }

     public function desa()
    {
        return $this->belongsTo(Village::class, 'indonesia_village_id', 'id');
    }

    public function masukan(){
        return $this->hasMany(Masukan::class,'masukan','id_masukan');
    }

   public function ProductSave()
    {
        return $this->belongsToMany(
            Usaha_anggota::class, 
            'simpan_usaha', 
            // fk di table simpan usaha
            'id_user',    
            'id_usaha'   
        );
    }
}