<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kabar_berita extends Model
{
    use HasFactory;
    protected $table = 'kabar_berita';
    protected $primaryKey = 'id_kabar_berita';
    protected $fillable = ['judul','body_berita','image'];
}
