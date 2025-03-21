<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\class_teacher;
use App\Models\classRoom;
use App\Models\school;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\CompatibilityTest;

use function PHPSTORM_META\type;

class teacherController extends Controller
{
    protected $resourceDefaults = ["index", "create", "store", "show", "edit", "destroy", "update", "getClass"];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->type == 1) {
            $data  = User::where('type', '=', 4)->get()->reverse();
        } else {
            $data  = User::where('type', '=', 4)->where('school_id', '=', Auth::user()->school->id)->get()->reverse();
        }
        return view('dashboard.teachers.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->type == 1) {
            $schools = school::all();
            $classes = classRoom::all();
        } else {
            $schools = [];
            $classes = classRoom::where('school_id', '=', Auth::user()->school->id)->get();
        }

        return view('dashboard.teachers.create', compact('schools', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "password" => "required",
            "confirm" => "required",
            "avatar" => 'mimes:jpg,png,svg,jpeg|max:256'
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
                "type" => 4
            ];
            
            $success = User::create($data);

            $data2 = [
                "name" => $request->name,
                "school_id" => Auth::user()->school->id,
                "user_id" => User::all()->last()->id,
                "status" => 1,
                "class_id" => "",
            ];

        } else {
            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "avatar" => $imgsave,
                "school_id" => Auth::user()->school->id,
                "type" => 4
            ];
            $success = User::create($data);

            $data2 = [
                "name" => $request->name,
                "school_id" => Auth::user()->school->id,
                "user_id" => User::all()->last()->id,
                "status" => 1,
                "class_id" => "",
            ];
        }


        foreach ($request->class_id as $class) {
            $data2["class_id"] = $class;
        }

        $success2 = Teacher::create($data2);

        foreach ($request->class_id as $class) {
            if (Auth::user()->type==1) {
                $data3 = [
                    "school_id" => $request->school_id,
                    "class_id" => $class,
                    "teacher_id" => Teacher::all()->last()->id,
                ];
            }else{
                $data3 = [
                    "school_id" => Auth::user()->school->id,
                    "class_id" => $class,
                    "teacher_id" => Teacher::all()->last()->id,
                ];
            }
            class_teacher::create($data3);
        }

        if ($success2) {
            return redirect()->route('dashboard.teachers.index')->with('success', "معلم شما با موفقیت اضافه شد");
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
        $teacher = Teacher::where('user_id', '=', $user->id)->first();
        $TeacherClasses = $teacher->classes;
        if (Auth::user()->type == 1) {
            $schools = school::all();
        }else{
            $schools = [];
        }
        return view('dashboard.teachers.show', compact('user', 'schools', 'teacher', 'TeacherClasses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', '=', $id)->first();
        $teacher = Teacher::where('user_id', '=', $user->id)->first();
        if (Auth::user()->type == 1) {
            $schools = school::all();
        }else{
            $schools = [];
        }
        $teacher_classes = $teacher->classes;
        $classes = classRoom::all();
        return view('dashboard.teachers.update', compact('user', 'teacher', 'schools', 'classes'));
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
            "avatar" => 'mimes:jpg,png,svg,jpeg|max:256'
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

        $data2 = [
            "name" => $request->name,
            "school_id" => $request->school_id,
            "status" => 1,
            "class_id" => ''
        ];

        }else{
            
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "avatar" => $imgsave,
            "school_id" => Auth::user()->school->id
        ];

        $data2 = [
            "name" => $request->name,
            "school_id" => Auth::user()->school->id,
            "status" => 1,
            "class_id" => ''
        ];

        }

        foreach ($request->class_id as $class) {
            $data2['class_id'] = $class;
        }


        $teacher = Teacher::where('user_id', '=', $userGetted->id)->first();
        
        if (Auth::user()->type == 1) {
            $data3 = [
                "school_id" => $request->school_id,
                "class_id" => ''
            ];    
        }else{
            $data3 = [
                "school_id" => Auth::user()->school->id,
                "class_id" => ''
            ];
        }

        foreach ($request->class_id as $key => $class) {
            $data3['class_id'] = $class;
            $CTeacher = class_teacher::where('teacher_id', '=', $teacher->id)->get();
            $success3 =  $CTeacher[$key]->update($data3);
            // dd($CTeacher);
        }
        $success2 = $teacher->update($data2);
        $success = $user->update($data);


        if ($success && $success2) {
            return redirect()->route('dashboard.teachers.index')->with('success', "معلم شما با ویرایش شد");
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
        if ($user) {
            $user->delete();
            return response()->json(['success' => true, "message" => 'حذف موفقیت آمیز بود']);
        } else {
            return response()->json(["error" => true, "message" => 'مشکلی در حذف پیش آمد ']);
        }
    }

    public function getClass($id)
    {
        $class = classRoom::where('school_id', '=', $id)->get();
        // dd($class);
        return response()->json($class);
    }

    public function getTeacher($id)
    {
        $classRoom = classRoom::where('id', $id)->first();
        $data = $classRoom->teachers;

        // dd($classRoom->teachers);
        // $data = $classes
        // $data = [];
        // foreach ($classes as $class) {
        //     $teacher = Teacher::where('id', '=', $class->teacher_id)->first();
        //     array_push($data, $teacher);
        // }

        return response()->json($data);
    }
}
