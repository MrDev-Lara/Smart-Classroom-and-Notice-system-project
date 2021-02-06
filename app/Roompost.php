<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Roompost extends Model
{
    protected $fillable = [
        'room_id', 'posts', 'date',
    ];

    public function roompostfiles(){
        return $this->hasMany(Roompostfile::class);
    }

    public function roompostcomments(){
        return $this->hasMany(Roompostcomment::class);
    }

}
