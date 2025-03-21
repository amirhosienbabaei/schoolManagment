<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\validatonRequest;
use App\Models\attendance;
use App\Models\class_teacher;
use App\Models\classRoom;
use App\Models\lesson;
use App\Models\lesson_teacher;
use App\Models\Teacher;
use App\Models\validation;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Auth;

class validationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        if (Auth::user()->type == 1) {
            $classes = classRoom::all();
            $lessons = lesson_teacher::all();
            // dd($classes);
        }
        else if (Auth::user()->type == 4) {
            $teacher = Teacher::where('user_id', '=', Auth::user()->id)->first();
            $classes = class_teacher::where('teacher_id', '=', $teacher->id)->get();
            $lessons = $teacher->lessons;
        }
        else{
            $classes = classRoom::where('school_id', '=', Auth::user()->school->id)->get();
            $lessons = lesson_teacher::where('school_id', '=', Auth::user()->school->id)->get();
        }

        return view('dashboard.validations.list', compact('classes', 'lessons'));
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

        $lessonId = $request->lesson_id;
        $zang = $request->zang;
        $classId = $request->class_id;

        $attendanceData = [];
        $userCounter = 0;
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^user_id=(\d+)$/', $key, $matches)) {
                $userCounter++;
                $userId = $matches[1];
                $statusKey = "status{$userCounter}";

                $status = $request->input($statusKey, 0);

                $attendanceData[] = [
                    'lesson_id' => $lessonId,
                    'bell' => $request->zang,
                    'class_id' => $classId,
                    'student_id' => $userId,
                    'status' => $status,
                    "user_id" => Auth::user()->id,
                    'school_id' => Auth::user()->school->id,
                    'created_at' => now()
                ];
            }
        }

        $success = attendance::insert($attendanceData);

        if ($success) {
            return redirect()->back()->with("success", 'حضور و غیاب با موفقیت ثبت شد');
        } else {
            return redirect()->back()->with("error", 'حضور و غیاب با  ثبت نشد');
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
}
