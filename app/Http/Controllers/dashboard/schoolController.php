<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\createSchoolRequest;
use App\Models\school;
use App\Models\User;
use Illuminate\Http\Request;

class schoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = school::all();
        return view('dashboard.schools.list', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modirs = User::where('type','=',2)->get();
        return view('dashboard.schools.create', compact('modirs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createSchoolRequest $request)
    {
        $data = [
            "name"=>$request->name,
            "code"=>$request->code,
            "user_id"=>$request->modir_id
        ];

       $success = school::create($data);
        if ($success) {
            return redirect()->back()->with('success', 'مدرسه شما با موفقیت ساخته شد');
        }
        else{
            return redirect()->back()->with('error','مشکلی در ساخت مدرسه پیش آمد');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $school = school::find($id);
        return view('dashboard.schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $school = school::find($id);
        $modirs = User::where('type','=',2)->get();
        return view('dashboard.schools.update', compact('school', 'modirs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(createSchoolRequest $request, string $id)
    {
        $school = school::find($id);
        $data = [
            "name"=>$request->name,
            "code"=>$request->code,
            "user_id"=>$request->modir_id
        ];
        if ($school){
           $success = $school->update($data);
        }
        if ($school) {
            if ($success) {
                return redirect()->back()->with('success', 'مدرسه شما با موفقیت آپدیت شد');
            }
            else{
                return redirect()->back()->with('error','مشکلی در آپدیت مدرسه پیش آمد');
            }
        }
        else{
            return redirect()->back()->with('error','مشکلی در آپدیت مدرسه پیش آمد');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $school = school::where("id", '=', $id)->first();
        if ($school) {
            $school->delete();
            return response()->json(['success'=>true, "message"=>'حذف موفقیت آمیز بود']);
        }
        else{
            return response()->json(["error"=>true, "message"=>'مشکلی در حذف پیش آمد ']);
        }
    }
}
