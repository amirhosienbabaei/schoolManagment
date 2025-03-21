<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class lesson_teacher extends Model
{
    protected $table = "lesson_teacher";
    protected $fillable = [
        "name",
        "class_id",
        "teacher_id",
        "school_id",
        "status"
    ];
    public $timestamps = [
        "created_at",
        "updated_at"
    ];

    public function school(){
        return $this->belongsTo(school::class);
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function class(){
        return $this->belongsTo(classRoom::class);
    }

}
