<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeLessonRequest;
use App\Models\class_teacher;
use App\Models\classRoom;
use App\Models\lesson;
use App\Models\lesson_teacher;
use App\Models\school;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class lessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::user()->type == 1) {
            $data = lesson_teacher::all();
        } else {
            $data = lesson_teacher::where('school_id', '=', Auth::user()->school->id)->get();
        }

        return view('dashboard.lessons.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if (Auth::user()->type == 1) {
            $schools = school::all();
            $classes = classRoom::all();
            $teachers = Teacher::all();
        } else {
            $schools = [];
            $classes = classRoom::where('school_id', '=', Auth::user()->school->id)->get();
            $teachers = Teacher::where('school_id', '=', Auth::user()->school->id)->get();
        }

        return view('dashboard.lessons.create', compact('schools', 'classes', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "class_id" => "required",
            "teacher_id" => "required"
        ]);

        if (Auth::user()->type == 2) {

            $data = [
                "name" => $request->name,
                "class_id" => $request->class_id,
                "school_id" => $request->school_id,
                "teacher_id" => $request->teacher_id
            ];    

        }
        else{
            $data = [
                "name" => $request->name,
                "class_id" => $request->class_id,
                "school_id" => Auth::user()->school->id,
                "teacher_id" => $request->teacher_id
            ];

        }

        $status = lesson_teacher::create($data);
        if ($status) {
            return redirect()->route("dashboard.lessons.index")->with('success', 'کلاس شما با موفقیت ایجاد شد');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lesson = lesson_teacher::find($id);
        return view('dashboard.lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lesson = lesson_teacher::find($id);
        $schools = school::all();
        $classes = classRoom::all();
        $teachers = Teacher::all();
        return view('dashboard.lessons.update', compact('lesson', 'classes', 'schools', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lesson = lesson_teacher::find($id);

        $request->validate([
            "name" => "required|max:255",
            "class_id" => "required",
            "teacher_id" => "required"
        ]);

        if (Auth::user()->type == 1) {
            $data = [
                "name" => $request->name,
                "class_id" => $request->class_id,
                "school_id" => $request->class_id,
                "teacher_id" => $request->teacher_id
            ];
            
        }else{
            $data = [
                "name" => $request->name,
                "class_id" => $request->class_id,
                "school_id" => Auth::user()->school->id,
                "teacher_id" => $request->teacher_id
            ];
    
        }

        $status = $lesson->update($data);
        if ($status) {
            return redirect()->route("dashboard.lessons.index")->with('success', 'کلاس شما با موفقیت ایجاد شد');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = lesson_teacher::where('id', '=', $id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => true, "message" => 'حذف موفقیت آمیز بود']);
        } else {
            return response()->json(["error" => true, "message" => 'مشکلی در حذف پیش آمد ']);
        }
    }
}
