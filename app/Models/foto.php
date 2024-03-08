<?php

namespace App\Models;

use App\Models\User;
use App\Models\Album;
use App\Models\comment;
use App\Models\Likefoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class foto extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table='foto';

    //Relasi nilai balik ke tabel user
    public function users(){
        return $this->belongTo(User::class, 'id_user', 'id');
    }

    // Relasi ke table likefotos
    public function likefoto(){
        return $this->hasMany(Likefoto::class, 'id_foto', 'id');
    }
    
    public function albums(){
        return $this->hasMany(Album::class, 'album_id', 'id');
    }

    public function komentars(){
        return $this->hasMany(comment::class, 'id_foto', 'id');
    }

   
}
