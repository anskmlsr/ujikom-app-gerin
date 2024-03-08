<?php

namespace App\Models;

use App\Models\foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
    use HasFactory;

    protected $fillable =[
        'id_foto',
        'id_user',
        'isi_komentar',
    ];


    public function fotos(){
        return $this->belongTo(foto::class,'foto_id','id');
    }

    public function users(){
        return $this->belongTo(User::class,'id_user','id');
    }
    

}
