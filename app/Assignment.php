<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $fillable = [
        'room_id', 'assignment_title', 'assignment_description', 'assignment_file', 'assignment_post_date', 'assignment_post_time', 'assignment_due_date', 'assignment_due_time',
    ];

    public function assignmentanswers(){
        return $this->hasMany(Assignmentanswer::class);
    }
}
