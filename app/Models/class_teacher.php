<?php

namespace App\Models;

use App\Http\Controllers\dashboard\teacherController;
use Illuminate\Database\Eloquent\Model;

class class_teacher extends Model
{
    protected $table = "class_teacher";
    protected $guarded = [];

    public function name(){
        return $this->belongsTo(classRoom::class, "class_id");
    }


 

}
