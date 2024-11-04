<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Ban extends Model
{
    protected $table = 'ban';
    protected $primaryKey = 'uid';
    protected $fillable = [
        'user_uid',
        'reason'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_uid');
    }

}
