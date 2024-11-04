<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'uid';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dpi',
        'nickname',
        'password',
        'email',
        'rol_uid'
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_uid');
    }

    public function bans(){
        return $this->hasMany(Ban::class, 'user_uid');
    }

    public function register(){
        return $this->hasOne(Register::class, 'user_uid');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'user_uid');
    }

    public function requests(){
        return $this->hasMany(Request::class, 'user_uid');
    }

    public function attends(){
        return $this->belongsToMany(Attend::class, 'user_uid');
    }

    public function hasRole($rol)
    {
        return $this->rol->name === $rol;
    }

}
