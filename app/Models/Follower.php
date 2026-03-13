<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follower extends Model
{
    use HasFactory;

    protected $table = 'followers';
    protected $primaryKey = 'id_follow';

    protected $fillable = [
        'follow_from',
        'follow_to'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'follow_from','id_user');
    }

    public function Anggota()
    {
        return $this->belongsTo(AnggotaTani::class,'follow_to','id_anggota');
    }
}
