<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\classRoom;
use App\Models\school;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class classRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if (Auth::user()->type == 1) {
            $data = classRoom::all()->reverse();
        }else{
            $data = classRoom::where('school_id', '=', Auth::user()->school->id)->get()->reverse();
        }

        return view('dashboard.classes.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->type == 1) {
            $schools = school::all();
        }else{
            $schools = [];
        }

        return view('dashboard.classes.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(["name"=>'required']);
        
        if (Auth::user()->type == 1) {
            $status = classRoom::create(["name"=>$request->name,"school_id"=>$request->school_id,"status"=>1]);
        }else{
            $status = classRoom::create(["name"=>$request->name,"school_id"=>Auth::user()->school->id,"status"=>1]);
        }

        if ($status) {
            return redirect()->route("dashboard.classes.index")->with('success', 'کلاس شما با موفقیت ایجاد شد');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $schools = school::all();
        $class = classRoom::find($id);
        return view('dashboard.classes.show', compact('schools', 'class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = classRoom::where('id', '=', $id)->first();
        $schools = school::all();
        return view('dashboard.classes.update', compact('schools', 'class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $class = classRoom::find($id);
        $request->validate([
            "name"=>'required',
        ]);

        if (Auth::user()->type == 1) {
        $status = $class->update(["name"=>$request->name, "school_id"=>$request->school_id]);
        }else{
        $status = $class->update(["name"=>$request->name, "school_id"=>Auth::user()->school->id]);

        }

        if ($status) {
            return redirect()->route("dashboard.classes.index")->with('success', 'کلاس شما با موفقیت ایجاد شد');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = classRoom::where('id', '=',$id)->first();
        if ($user) {
            $user->delete();
            return response()->json(['success'=>true, "message"=>'حذف موفقیت آمیز بود']);
        }
        else{
            return response()->json(["error"=>true, "message"=>'مشکلی در حذف پیش آمد ']);
        }
    }
}
