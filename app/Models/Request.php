<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'request';
    protected $primaryKey = 'uid';
    public $timestamps = false;
    protected $fillable = [
        'user_uid',
        'post_uid',
        'state'
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'post_uid');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_uid');
    }

}
