<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'teacher_id', 'course_name', 'course_code', 'course_session', 'class_section', 'class_code',
    ];
}
