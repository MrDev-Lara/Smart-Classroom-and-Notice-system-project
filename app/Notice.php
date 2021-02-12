<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'teacher_id', 'notice_title', 'notice_description', 'notice_file', 'notice_post_date', 'notice_post_time',
    ];
}
