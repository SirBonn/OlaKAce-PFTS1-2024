<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $table = 'reason';
    protected $primaryKey = 'uid';
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function reports(){
        return $this->hasMany(Report::class, 'reason_uid');
    }

}
