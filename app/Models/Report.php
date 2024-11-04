<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $primaryKey = 'uid';
    public $timestamps = false;
    protected $fillable = [
        'message',
        'reason_uid',
        'post_uid',
        'user_uid'
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'post_uid');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_uid');
    }

    public function reason(){
        return $this->belongsTo(Reason::class, 'reason_uid');
    }
}
