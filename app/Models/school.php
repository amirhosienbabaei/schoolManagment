<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    protected $guarded = [];
    public function user(){
       return $this->belongsTo(User::class);
    //    User::where('school_id','=',$this->school_id)->where('type','=',2)->get();
    }
}
