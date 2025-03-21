<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    protected $guarded = [];
    
    public function student(){
        return $this->belongsTo(Student::class);
    }
    
    function gregorianToJalali($gy, $gm, $gd)
    {
        $g_d_m = [0, 31, 59, 90, 120, 151, 181, 212, 243, 273, 304, 334];

        $gy2 = ($gm > 2) ? ($gy + 1) : $gy;
        $gy = (int)$gy;
        $gm = (int)$gm;
        $gd = (int)$gd;
        $days = 355666 + (365 * $gy) + ((int)(($gy2 + 3) / 4)) - ((int)(($gy2 + 99) / 100)) + ((int)(($gy2 + 399) / 400)) + $gd + $g_d_m[$gm - 1];

        $jy = -1595 + (33 * ((int)($days / 12053)));
        $days %= 12053;

        $jy += 4 * ((int)($days / 1461));
        $days %= 1461;

        if ($days > 365) {
            $jy += (int)(($days - 1) / 365);
            $days = ($days - 1) % 365;
        }

        if ($days < 186) {
            $jm = 1 + (int)($days / 31);
            $jd = 1 + ($days % 31);
        } else {
            $jm = 7 + (int)(($days - 186) / 30);
            $jd = 1 + (($days - 186) % 30);
        }

        return array($jy, $jm, $jd);
    }


    function convertToJalali($gregorianDate)
    {
        list($year, $month, $day) = explode('-', $gregorianDate);

        $timePart = explode(' ', $gregorianDate)[1];
        list($hour, $minute, $second) = explode(':', $timePart);


        list($jy, $jm, $jd) = $this->gregorianToJalali($year, $month, $day);


        return sprintf('%04d-%02d-%02d %02d:%02d:%02d', $jy, $jm, $jd, $hour, $minute, $second);
    }


    public function persianDate () {
        return $this->convertToJalali($this->created_at);
    }

}
