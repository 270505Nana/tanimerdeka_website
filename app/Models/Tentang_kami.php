<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tentang_kami extends Model
{
    use HasFactory;
    protected $table = 'tentang_kami';
    protected $primaryKey = 'id_tentang_kami';
    protected $fillable = [
        'deskripsi_program',
        'visi',
        'misi',
        'image'
    ];

}
