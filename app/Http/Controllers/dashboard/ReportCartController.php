<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\classRoom;
use App\Models\school;
use App\Models\Score;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReportCartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::user()->type == 1) {
            $classes = classRoom::all();
            $schools = school::all();
        } else {
            $classes = classRoom::where('school_id', '=', Auth::user()->school->id)->get();
            $schools = [];
        }

        return view('dashboard.ReportCart.list', compact('classes', 'schools'));
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
            "position" => 'required'
        ]);

        if (Auth::user()->type == 5) {
            $student = Student::where('user_id', '=', Auth::user()->id)->first();
            $scores = Score::where('student_id', '=', $student->id)->where('position', '=', $request->position)->get();
        } else {

            $scores = Score::where('student_id', '=', $request->student_id)->where('position', '=', $request->position)->get();
        }

        $count = count($scores);
        // dd($scores[0]->lesson);
        $sum = $scores->sum('score');
        // dd();
        if ($count == 0) {
            $operator = 0;
        } else {
            $operator = $sum / $count;
        }
        Session::flash('Alldatas', $scores);
        Session::flash('moadel', $operator);

        if ($scores) {
            return redirect()->back()->withInput();
        } else {
            return redirect()->back()->with('error', 'مشکلی پیش امد بعدا دوباره امتحان کنید');
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
