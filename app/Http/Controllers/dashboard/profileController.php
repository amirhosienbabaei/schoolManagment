<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\modir;
use App\Models\school;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = school::all()->reverse();
        return view('profile.create', compact('schools'));
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
        //
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
    public function update(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "avatar"=>'mimes:jpg,png,jpeg,svg|max:250'
        ]);
        
        if ($request->hasFile('avatar')) {
            $imgName = time() . "_" . $request->avatar->getClientOriginalName();
            $path = public_path('images\users');
            $request->file('avatar')->move($path, $imgName);
            $imgsave = "images/users/" . $imgName;
        }
        else{
            $imgsave = Auth::user()->avatar;
        }
        
        $data = [
            "name" => $request->name,
            "avatar"=>$imgsave
        ];
    
        $user = User::where('id',"=",Auth::user()->id);
        $school = school::where('id',"=",Auth::user()->school->id);
        $success1 = $user->update($data);  


      if ($success1) {
        return redirect()->back()->with("success","پروفایل  شما با موفقیت آپدیت شد");
      }
      else{
        return redirect()->back()->with("error","مشکلی پیش آمد ، لطفا دوباره امتحان نمایید");
      }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
