<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $guarded = [];
    protected $table = 'teachers';

    public function Classes(){
        return $this->hasMany(class_teacher::class, "teacher_id");
    }
    public function lessons () {
        return $this->hasMany(lesson_teacher::class);
    }
    // public function classes() {
    //     return $this->belongsToMany(classRoom::class, "class_teacher", "class_id");
    // }

}
