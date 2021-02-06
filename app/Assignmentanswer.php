<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignmentanswer extends Model
{
    protected $fillable = [
        'assignment_id', 'user_id', 'assignment_file', 'assignment_submit_date','assignment_submit_time',
    ];
}
