<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'teacher_id', 'course_name', 'course_code', 'course_session', 'class_section', 'class_code',
    ];

    public function users(){
    	return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function roomposts(){
        return $this->hasMany(Roompost::class);
    }
}
