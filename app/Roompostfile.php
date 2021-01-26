<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roompostfile extends Model
{
    protected $fillable = [
        'roompost_id', 'file',
    ];
}
