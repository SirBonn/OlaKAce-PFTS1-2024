<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'uid';
    public $timestamps = false;
    protected $fillable = [
        'message',
        'user_uid',
        'event_uid',
        'state'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_uid');
    }

    public function event(){
        return $this->belongsTo(Event::class, 'event_uid');
    }

    public function reports(){
        return $this->hasMany(Report::class, 'post_uid');
    }

}
