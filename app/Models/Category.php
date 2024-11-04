<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'uid';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description'
    ];

    public function events(){
        return $this->hasMany(Event::class, 'category_uid');
    }

}
