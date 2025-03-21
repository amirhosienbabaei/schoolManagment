<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\classRoom;
use App\Models\Discipline;
use App\Models\school;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class exampleDisciplineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->type == 1) {
            $data = Discipline::all();
        }else{
            $data = Discipline::where('school_id', '=', Auth::user()->school->id)->get();
        }
        return view('dashboard.exampleDiscipline.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->type == 2) {
            $schools = school::all();
            $classes = classRoom::all();
            $students = Student::all();
        }else{
            $schools = [];
            $classes = classRoom::where('school_id', '=', Auth::user()->school->id)->get();
            $students = Student::where('school_id', '=', Auth::user()->school->id)->get();
        }

        return view('dashboard.exampleDiscipline.create', compact('schools', 'classes', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "class_id"=>'required',
            "student_id"=>'required',
            "title"=>'required',
            "score"=>'required',
            "discription"=>'required'
        ]);

        // dd($request);

       
            $data = [
                "user_id"=>Auth::user()->id,
                "student_id"=>$request->student_id,
                "title"=>$request->title,
                "discription"=>$request->discription,
                "score"=>$request->score,
                "dismissal_status"=>$request->dismissal_status,
                "dismissal_count"=>$request->dismissal_count,
                "school_id"=>Auth::user()->school->id,
            ];
    

        $response = Discipline::create($data);

        if ($response) {
            return redirect()->back()->with('success', 'مورد انضباطی با موفقیت ثبت شد');
        }else{
            return redirect()->back()->with('error', 'مشکلی در ثبت این مورد پیش امد، دوباره تلاش کنید');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schools = school::all();
        $classes = classRoom::all();
        $students = Student::all();

        $data = Discipline::find($id);
        return view('dashboard.exampleDiscipline.show', compact('data', 'schools', 'classes', 'students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $schools = school::all();
        $classes = classRoom::all();
        $students = Student::all();

        $data = Discipline::find($id);
        return view('dashboard.exampleDiscipline.update', compact('data', 'schools', 'classes', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "school_id"=>'required',
            "class_id"=>'required',
            "student_id"=>'required',
            "title"=>'required',
            "score"=>'required',
            "discription"=>'required'
        ]);

        $data = [
            "student_id"=>$request->student_id,
            "title"=>$request->title,
            "discription"=>$request->discription,
            "score"=>$request->score,
            "dismissal_status"=>$request->dismissal_status,
            "dismissal_count"=>$request->dismissal_count
        ];

        $discipline = Discipline::find($id);
        // dd($discipline);
        $response = $discipline->update($data);

        if ($response) {
            return redirect()->back()->with('success', 'مورد انضباطی با موفقیت ویرایش شد');
        }else{
            return redirect()->back()->with('error', 'مشکلی در ویرایش این مورد پیش امد، دوباره تلاش کنید');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $discipline = Discipline::where('id', '=', $id)->first();
        if ($discipline) {
            $discipline->delete();
            return response()->json(['success' => true, "message" => 'حذف موفقیت آمیز بود']);
        } else {
            return response()->json(["error" => true, "message" => 'مشکلی در حذف پیش آمد ']);
        }
    }
}
