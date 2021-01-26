<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roompostcomment extends Model
{
    protected $fillable = [
        'roompost_id', 'user_id', 'teacher_id', 'comment', 'date',
    ];
}
