<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'uid';
    public $timestamps = false;

    protected $fillable = [
        'category_uid',
        'tittle',
        'user_uid',
        'public_uid',
        'spaces',
        'site',
        'event_date',
        'event_time'
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_uid');
    }

    public function people(){
        return $this->belongsTo(People::class, 'public_uid');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'event_uid');
    }

    public function attendees() {
        return $this->belongsToMany(User::class, 'attend', 'event_uid', 'user_uid');
    }

    public function attenders() {
        return $this->hasMany(Attend::class, 'event_uid');
    }

}
