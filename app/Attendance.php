<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'room_id', 'user_id', 'attend', 'attend_date', 'updated_at',
    ];
}
