<?php

namespace App\Models;

use App\Models\foto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Likefoto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_foto',
    ];

    protected $table = 'likefoto';

    //Relasi nilai balik
    public function fotos(){
        return $this->belongTo(foto::class, 'id_user','id');
    }
}
