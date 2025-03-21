<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class classRoom extends Model
{
    protected $guarded = [];
    protected $table ="classes";

    public function school(){
        return $this->belongsTo(school::class);
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class, "class_teacher", "class_id", "teacher_id");
    }
    
}
