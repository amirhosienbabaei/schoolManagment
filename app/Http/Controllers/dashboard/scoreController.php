<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\class_teacher;
use App\Models\classRoom;
use App\Models\lesson;
use App\Models\scroe;
use App\Models\lesson_teacher;
use App\Models\Score;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class scoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if (Auth::user()->type == 1) {
            $classes = classRoom::all();
            $lessons = lesson_teacher::all();
        }
        
        else if (Auth::user()->type == 4) {
            $teacher = Teacher::where('user_id', '=', Auth::user()->id)->first();
            $classes = class_teacher::where('teacher_id', '=', $teacher->id)->get();
            $lessons = $teacher->lessons;
        }
        else{
            $classes = classRoom::where('school_id' , '=', Auth::user()->school->id)->get();
            $lessons = lesson_teacher::where('school_id' , '=', Auth::user()->school->id)->get();
        }

        return view('dashboard.scores.list', compact('classes', 'lessons'));
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
            "lesson_id"=>'required',
            "class_id"=>'required',
        ]);

        $data = [];
        // dd($request);
        $counter = 0;
        // dd($request);
        foreach ($request->all() as $key=>$value) {
            $counter++;
            if (preg_match('/^input_mostamar(\d+)_(\d+)$/', $key, $matches)) {
                $user_id = $matches[1];
                $score = $matches[2];
                $data [] = [
                    "lesson_id"=>$request->lesson_id,
                    "class_id"=>$request->class_id,
                    "user_id"=>Auth::user()->id,
                    "student_id"=>$matches[2],
                    "score"=>$value,
                    "position"=>$matches[1],
                ];

                // dd($data);
            }
            // dd($matches[1]);

        }
        $statuses = Score::where('class_id', $request->class_id)->where('position', '=', $request->position)->where('lesson_id', '=', $request->lesson_id)->get();
        $i=-1;
        // dd($statuses[0]);
        foreach ($statuses as $status) {
            $i++;
            $id = $status->id;
            $score = Score::where('id', '=', $id);
            // dd($data[$i]['score']);
            $score->update([
                "score"=>$data[$i]['score'],
            ]);
            # code...
        }
        $success = true;
        if ($success) {
            return redirect()->back()->with('success', 'نمرات با موفقیت ذخیره شد');
        }else{
           return redirect()->back()->with('error', 'مشکلی در ثبت نمرات پیش آمد بعدا دوباره امتحان کنید'); 
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
        //
    }

    public function getScore ($class_id, $lesson_id, $posision) {
        $scores = Score::where('class_id', '=', $class_id)->where('lesson_id', '=', $lesson_id)->where('position', '=', $posision)->with('student')->get();

        // dd($scor);
        // dd($scores);
        if ($scores->count() > 1) {
            return response()->json(json_decode($scores));
        }

        else{

            $class = classRoom::where('id', '=', $class_id)->where('school_id', '=', Auth::user()->school->id)->first();
            $students = Student::where('class_id', '=', $class->id)->where('school_id', '=', Auth::user()->school->id)->get();
            $all_data = [];
                
            foreach ($students as $student) {

                $data1 = [
                    "user_id"=>Auth::user()->id,
                    "position"=>1,
                    "score"=>"0",
                    "lesson_id"=>$lesson_id,
                    "class_id"=>$class_id,
                    "student_id"=>$student->id,
                ];
    
                $data2 = [
                    "user_id"=>Auth::user()->id,
                    "position"=>2,
                    "score"=>"0",
                    "lesson_id"=>$lesson_id,
                    "class_id"=>$class_id,
                    "student_id"=>$student->id,
                ];

                $push = array_push($all_data, $data1);
                $push2 = array_push($all_data, $data2);
            }

            
           
            $success = Score::insert($all_data);
        }

    }

}
