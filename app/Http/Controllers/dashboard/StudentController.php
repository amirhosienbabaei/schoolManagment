<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\classRoom;
use App\Models\school;
use App\Models\scroe;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     **/

   public function index()
    {
        
        if (Auth::user()->type == 1) {
            $data  = User::where('type', '=', 5)->get()->reverse();
            $classes = classRoom::all();
        }else{
            $data  = User::where('type', '=', 5)->where('school_id', '=', Auth::user()->school->id)->get()->reverse();
            $classes = classRoom::where('school_id', '=', Auth::user()->school->id)->get();
        }

        return view('dashboard.students.list', compact('classes', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = school::all();
        $classes = classRoom::all();
        return view('dashboard.students.create', compact('schools', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "tell" => 'required|max:12|min:9|regex:/^09\d{9}$/',
            "codemelli"=>'required|max:11|min:9',
            "email" => "required|email",
            "password" => "required",
            "confirm" => "required",
            "avatar" => 'mimes:jpg,png,svg,jpeg|max:256',
            "class_id"=>'required'
        ]);

        $checkEmail = User::where('email', '=', $request->email)->get();
        if (count($checkEmail)) {
            return redirect()->back()->with("error", "چنین ایمیلی از قبل وجود دارد لطفا ایمیل دیگری وارد نمایید");
        }

        if ($request->hasFile('avatar')) {
            $imgName = time() . "_" . $request->avatar->getClientOriginalName();
            $path = public_path('images\users');
            $request->file('avatar')->move($path, $imgName);
            $imgsave = "images/users/" . $imgName;
        } else {
            $imgsave = "";
        }
       
        if (Auth::user()->type == 1) {
            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "avatar" => $imgsave,
                "school_id" => $request->school_id,
                "type" => 5
            ];
    
            $success = User::create($data);
    
            $data2 = [
                "name" => $request->name,
                "phone"=>$request->tell,
                "school_id" => $request->school_id,
                "user_id" => User::all()->last()->id,
                "status" => 1,
                "codemelli"=>$request->codemelli,
                "class_id" => $request->class_id,
            ];
    
            
        }else{
            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "avatar" => $imgsave,
                "school_id" => Auth::user()->school->id,
                "type" => 5
            ];
    
            $success = User::create($data);
    
            $data2 = [
                "name" => $request->name,
                "phone"=>$request->tell,
                "school_id" => Auth::user()->school->id,
                "user_id" => User::all()->last()->id,
                "status" => 1,
                "codemelli"=>$request->codemelli,
                "class_id" => $request->class_id,
            ];
    
            
        }

        $success2 = Student::create($data2);
        

        if ($success2) {
            return redirect()->route('dashboard.students.index')->with('success', "معلم شما با موفقیت اضافه شد");
        } else {
            return redirect()->back()->with('Erros', "مشکلی در ایجاد معلم پیش آمد، دوباره تلاش کنید");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $schools = school::all();
        $student = Student::where("user_id", $user->id)->first();
        return view('dashboard.students.show', compact('user', 'schools', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', '=', $id)->first();
        $student = Student::where('user_id', '=', $user->id)->first();
        $schools = school::all();
        $classes = classRoom::where('school_id', $student->school_id)->get();
        return view('dashboard.students.update', compact('user', 'student', 'schools', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id', '=', $id);
        $userGetted = User::where('id', '=', $id)->first();

        $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "tell"=>'required|regex:/^09\d{9}$/|max:12|min:10',
            "codemelli"=>'required',
            "avatar" => 'mimes:jpg,png,svg,jpeg|max:256',
            "class_id"=>'required'
        ]);


        if ($request->hasFile('avatar')) {
            $imgName = time() . "_" . $request->avatar->getClientOriginalName();
            $path = public_path('images\users');
            $request->file('avatar')->move($path, $imgName);
            $imgsave = "images/users/" . $imgName;
        } else {
            $imgsave = $user->first()->avatar;
        }

        if (Auth::user()->type == 1) {
            
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "avatar" => $imgsave,
            "school_id" => $request->school_id
        ];

        $student = Student::where('user_id', '=', $userGetted->id)->first();
        
        
        $data2 = [
            "name" => $request->name,
            "phone"=>$request->tell,
            "codemelli"=>$request->codemelli,
            "school_id" => $request->school_id,
            "class_id" => $request->class_id,
            "status" => 1,
        ];

       

        }else{

            
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "avatar" => $imgsave,
            "school_id" => Auth::user()->school->id
        ];

        $student = Student::where('user_id', '=', $userGetted->id)->first();
        
        
        $data2 = [
            "name" => $request->name,
            "phone"=>$request->tell,
            "codemelli"=>$request->codemelli,
            "school_id" => Auth::user()->school->id,
            "class_id" => $request->class_id,
            "status" => 1,
        ];

       

        }
        
        $success2 = $student->update($data2);
        $success = $user->update($data);


        if ($success && $success2) {
            return redirect()->route('dashboard.students.index')->with('success', "معلم شما با ویرایش شد");
        } else {
            return redirect()->back()->with('Erros', "مشکلی در ویرایش معلم پیش آمد، دوباره تلاش کنید");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', '=', $id)->first();
        $student = Student::where('user_id', $user->id)->first();
        if ($user) {
            $user->delete();
            $student->delete();
            return response()->json(['success' => true, "message" => 'حذف موفقیت آمیز بود']);
        } else {
            return response()->json(["error" => true, "message" => 'مشکلی در حذف پیش آمد ']);
        }
    }

    public function sendData($id) {

        $data = Student::where('class_id', $id)->where('school_id', '=', Auth::user()->school->id)->get();
        return response()->json(json_decode($data));

    }

}
