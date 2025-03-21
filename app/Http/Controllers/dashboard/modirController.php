<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\school;
use App\Models\User;
use Illuminate\Http\Request;

class modirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::where('type', '=', 2)->get()->reverse();
        return view('dashboard.modiran.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $schools = school::all();
        return view('dashboard.modiran.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            "name"=>"required|string",
            "email"=>"required|email",
            "password"=>"required",
            "confirm"=>"required",
            "avatar"=>'mimes:jpg,png,svg,jpeg|max:256'
        ]);

        $checkEmail = User::where('email','=',$request->email)->get();
        if (count($checkEmail)) {
            return redirect()->back()->with("error", "چنین ایمیلی از قبل وجود دارد لطفا ایمیل دیگری وارد نمایید");
        }
     
        if ($request->hasFile('avatar')) {
            $imgName = time() . "_" . $request->avatar->getClientOriginalName();
            $path = public_path('images\users');
            $request->file('avatar')->move($path, $imgName);
            $imgsave = "images/users/" . $imgName;
        }
        else{
            $imgsave = "";
        }   
        $data = [
        "name"=>$request->name,
        "email"=>$request->email,
        "password"=>$request->password,
        "avatar"=>$imgsave,
        "school_id"=>$request->school_id,
        "type"=>2
       ];

       $success = User::create($data);

       if ($success) {
        return redirect()->route('dashboard.modiran.index')->with('success', "معاون شما با موفقیت اضافه شد");
       }
       else{
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
            return view('dashboard.modiran.show', compact('user', 'schools'));
        }else
        {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $schools = school::all();
        return view('dashboard.modiran.update', compact('user', 'schools'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::where('id', '=', $id);
        
        
        $request->validate([
            "name"=>"required|string",
            "email"=>"required|email",
            "avatar"=>'mimes:jpg,png,svg,jpeg|max:256'
        ]);

            
        if ($request->hasFile('avatar')) {
            $imgName = time() . "_" . $request->avatar->getClientOriginalName();
            $path = public_path('images\users');
            $request->file('avatar')->move($path, $imgName);
            $imgsave = "images/users/" . $imgName;
        }
        else{
            $imgsave = $user->first()->avatar;
        }
        
        $data = [
            "name"=>$request->name,
            "email"=>$request->email,
            "avatar"=>$imgsave,
            "school_id"=>$request->school_id
        ];
        
        $success = $user->update($data);
        // dd($request->school_id);

       if ($success) {
        return redirect()->route('dashboard.modiran.index')->with('success', "معاون شما با ویرایش شد");
       }
       else{
        return redirect()->back()->with('Erros', "مشکلی در ویرایش معاون پیش آمد، دوباره تلاش کنید");
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', '=',$id)->first();
        if ($user) {
            $user->delete();
            return response()->json(['success'=>true, "message"=>'حذف موفقیت آمیز بود']);
        }
        else{
            return response()->json(["error"=>true, "message"=>'مشکلی در حذف پیش آمد ']);
        }

    }
}
