<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function class(){
        return $this->belongsTo(classRoom::class);
    }

    public function school(){
        return $this->belongsTo(school::class);
    }

}
