<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdetail extends Model
{
     protected $fillable = [
        'user_id', 'biography', 'about',
    ];
}
