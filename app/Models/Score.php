<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function lesson() {
        return $this->belongsTo(lesson_teacher::class, 'lesson_id');
    }

}
