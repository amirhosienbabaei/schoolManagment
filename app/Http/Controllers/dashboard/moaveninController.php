<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\school;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Extension\SmartPunct\EllipsesParser;
use PhpParser\Node\Expr\Cast\String_;

class moaveninController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->type == 1){
            $data = User::where('type', '=', 3)->get()->reverse();
        }
        else{
            $data = User::where('type', '=', 3)->where('school_id', '=', Auth::user()->school->id)->get()->reverse();
        }
        return view('dashboard.moavenin.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->type == 1) {
        $schools = school::all()->reverse();
        return view('dashboard.moavenin.create', compact('schools'));
        }
        else{
        $schools = [];
        return view('dashboard.moavenin.create', compact('schools'));
        }
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
                "type" => 3
            ];    
        }else{
            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password,
                "avatar" => $imgsave,
                "school_id" => Auth::user()->school->id,
                "type" => 3
            ];    
        }
    
        $success = User::create($data);

        if ($success) {
            return redirect()->route('dashboard.moavein.index')->with('success', "معاون شما با موفقیت اضافه شد");
        } else {
            return redirect()->back()->with('Erros', "مشکلی در ایجاد معاون پیش آمد، دوباره تلاش کنید");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', '=', $id)->first();
        $schools = school::all()->reverse();
        if ($user) {
            return view('dashboard.moavenin.show', compact('user', 'schools'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {

        if (Auth::user()->type == 1) {
            $user = User::where('id', '=', $id)->first();
            $schools = school::all();
        } else {
            $user = User::where('id', '=', $id)->first();
            $schools = [];
        }

        return view('dashboard.moavenin.update', compact('user', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = User::where('id', '=', $id);


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
       }else{
        $data = [
            "name" => $request->name,
            "email" => $request->email,
            "avatar" => $imgsave,
            "school_id" => Auth::user()->school->id
        ];
       }

        $success = $user->update($data);

        if ($success) {
            return redirect()->route('dashboard.moavein.index')->with('success', "معاون شما با ویرایش شد");
        } else {
            return redirect()->back()->with('Erros', "مشکلی در ویرایش معاون پیش آمد، دوباره تلاش کنید");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::where('id', '=', $id)->first();
        if ($user) {
            $user->delete();
            return response()->json(['success' => true, "message" => 'حذف موفقیت آمیز بود']);
        } else {
            return response()->json(["error" => true, "message" => 'مشکلی در حذف پیش آمد ']);
        }
    }
}
