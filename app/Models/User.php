<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\foto;
use App\Models\comment;
use App\Models\Likefoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'alamat',
        'email',
        'password',
        'nama_lengkap',
        'tanggal_lahir',
        'picture',
        

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function users(){
        return $this->hasMany(foto::class, 'id_user', 'id');
    }
    
    public function komentars(){
        return $this->hasMany(comment::class, 'id_user', 'id');
    }
     public function likefoto(){
        return $this->hasMany(Likefoto::class, 'id_user', 'id_foto');
     }
}

