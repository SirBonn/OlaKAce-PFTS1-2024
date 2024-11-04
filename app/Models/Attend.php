<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attend extends Model
{

    protected $table = 'attend';
    protected $primaryKey = 'uid';
    public $timestamps = false;

    protected $fillable = [
        'event_uid',
        'user_uid',
    ];

    public function event(){
        return $this->belongsTo(Event::class, 'event_uid');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_uid');
    }


}
