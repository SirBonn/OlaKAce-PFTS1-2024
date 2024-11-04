<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'register';
    protected $fillable = [
        'user_uid',
        'dpi',
        'firstName',
        'lastName',
        'birthday'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_uid');
    }
}
