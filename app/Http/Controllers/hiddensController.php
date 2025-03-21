<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\attendance;
use App\Models\classRoom;
use App\Models\lesson_teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class hiddensController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     public function jalaliToGregorian($jy, $jm, $jd)
     {
         $jy = intval($jy) + 1595;
         $jy = intval($jy);
         $jm = intval($jm);
         $jd = intval($jd);
         $days = -355668 + (365 * $jy) + ((int)(($jy) / 33) * 8) + ((int)((($jy % 33) + 3) / 4) + $jd + (($jm < 7) ? ($jm - 1) * 31 : (($jm - 7) * 30) + 186));
         $gy = 400 * ((int)($days / 146097));
         $days %= 146097;
         if ($days > 36524) {
             $gy += 100 * ((int)(--$days / 36524));
             $days %= 36524;
             if ($days >= 365) $days++;
         }
         $gy += 4 * ((int)($days / 1461));
         $days %= 1461;
         if ($days > 365) {
             $gy += (int)(($days - 1) / 365);
             $days = ($days - 1) % 365;
         }
         $gd = $days + 1;
         $sal_a = array(0, 31, (($gy % 4 == 0 and $gy % 100 != 0) or ($gy % 400 == 0)) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
         for ($gm = 0; $gm < 13 and $gd > $sal_a[$gm]; $gm++) $gd -= $sal_a[$gm];
         return array($gy, $gm, $gd);
     }
 
     public function convertJalaliToGregorian($jalaliDate)
     {
         // جدا کردن سال، ماه و روز از تاریخ شمسی
         list($jy, $jm, $jd) = explode('/', $jalaliDate);
 
         // تبدیل به میلادی
         list($gy, $gm, $gd) = $this->jalaliToGregorian($jy, $jm, $jd);
 
         // فرمت‌دهی تاریخ میلادی
         return sprintf("%04d/%02d/%02d", $gy, $gm, $gd);
     }
 

    public function index()
    {
       
        if (Auth::user()->type == 1) {
            $classes = classRoom::all();
            $lessons = lesson_teacher::all();
        }else{
            $classes = classRoom::where('school_id', '=', Auth::user()->school->id)->get();
            $lessons = lesson_teacher::where('school_id', '=', Auth::user()->school->id)->get();
        }

        return view('dashboard.hiddens.list', compact('classes', 'lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "class_id" => 'required',
            "lesson_id" => 'required',
            "zang" => 'required',
            "status" => 'required',
            "date" => 'required|max:11|min:8'
        ]);
        // dd($request->all());
        $newDate = $this->convertJalaliToGregorian($request->date);

        $data = [
            "class_id" => $request->class_id,
            "lesson_id" => $request->lesson_id,
            "bell" => $request->zang,
            "status" => $request->status,
        ];


        $response = attendance::where($data)->orWhere("created_at", "%like%", $newDate)->get();
        
        Session::flash("students", $response);
        Session::flash('date', $request->date);
        Session::flash('dataOld', $request->all());

        if (count($response->toArray()) > 1) {
            return redirect()->back()->withInput();
        }else{
            return redirect()->back()->with("error", "چنین دیتایی یافت نشد");
        }        


        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function sendData(Request $request)
    {
        // dd($request);
        // return response()->json(["name"=>$request]);
    }
}
