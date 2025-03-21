<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\attendance;
use App\Models\classRoom;
use App\Models\Discipline;
use App\Models\lesson_teacher;
use App\Models\school;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class disciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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


    public function index()
    {
       
        if (Auth::user()->type == 1) {
            $classes = classRoom::all();
            $schools = school::all();
            $students = Student::all();
        }else{
            $classes = classRoom::where('school_id', '=', Auth::user()->school->id)->get();
            $schools = [];
            $students = Student::where('school_id', '=', Auth::user()->school->id)->get();
        }
        return view('dashboard.disciplines.list', compact('classes', 'schools', 'students'));
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
            "school_id" => 'required',
            "class_id" => 'required',
            "student_id" => 'required'
        ]);


        
        $attandance_data = attendance::where('student_id','=',$request->student_id)->where("status", '=', 0)->get();
        $discipline_data = Discipline::where('student_id', '=', $request->student_id)->get();
   
        $discipline_data2 = $discipline_data->toArray();

        foreach ($attandance_data as $data) {
            array_push($discipline_data2, $data);
        }

        $All_data = collect($discipline_data2);
        $int = 20;
        $sum = 20 - intval($All_data->sum('score'));

        // dd($sum);
 

        if ($sum < 1) {
            $sum = 0;
        }

        
        $count = count($attandance_data);
        $math = 20 - (intval($count)/2);
        $finalScore = $math;
        
        $status = "";

        switch ($sum) {
            case $sum < 12:
                $status = "مردود";
            break;

            case $sum === 13 : 
                $status = "قابل قبول";
            break;    
            case $sum === 14 : 
                $status = "قابل قبول";
            break;
            case $sum === 15 :
                $status = "خوب";
            break;

            case $sum > 16 :
                $status = "عالی";
            break;  
        }

        Session::flash('Alldatas', $attandance_data);
        Session::flash('score', $finalScore);
        Session::flash('dis_data', $discipline_data);
        Session::flash('final_score', $sum);
        Session::flash('status', $status);

        if ($attandance_data) {
            return redirect()->back()->withInput();
        } else {
            return redirect()->back()->with("error", "این دانش آموز هیچ مورد انضباطی ندارد");
        }
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
        $attandance = attendance::find($id);
        if ($attandance) {
            $data = ["status"=>2];
            $response = $attandance->update($data);

            if ($response) {
                return response()->json(['success' => true, "message" => 'موجه سازی موفقیت آمیز بود']);
            }
            else {
                return response()->json(['error' => true, "message" => 'موجه سازی موفقیت آمیز نبود']);
            }
        }
        else{
            return response()->json(['error' => true, "message" => 'موجه سازی موفقیت آمیز نبود']);
        }
    }
}
