<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';
    protected $primaryKey = 'uid';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'age_min'
    ];

    public function events(){
        return $this->hasMany(Event::class, 'people_uid');
    }


}
