<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\attendance;
use App\Models\classRoom;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $StudentsCount = Student::count();
        $MoaveninCount = User::where('type', '3')->where('school_id', '=', Auth::user()->school->id)->count();
        $TeachersCount = User::where('type', '4')->where('school_id', '=', Auth::user()->school->id)->count();
        $time = Carbon::today();
        $now = $time->format("Y-m-d H:i:s");

        $validations = attendance::where(
            'school_id',
            '=',
            Auth::user()->school_id
        )->where('status', '=', 0)->whereDate('created_at', $time)->count();

        $classRooms = classRoom::where(
            'school_id',
            '=',
            Auth::user()->school_id
        )->get();

        $attands = attendance::where('school_id', '=', Auth::user()->school->id)->where('status', '=', 0)->whereDate('created_at' , $now)->get();

        $data1 = [];
        $data2 = [];
        foreach ($classRooms as $classRoom) {
            $data1[] = [
                $classRoom->name
            ];
            $main = attendance::where('class_id', '=', $classRoom->id)->whereDate('created_at' , $now)->where('status', '=', 0)->get()->count();
            $data2[] = [
                $main
            ];

        }        
        return view(
            'dashboard.index.index',
            compact(
                'StudentsCount',
                'MoaveninCount',
                'TeachersCount',
                'validations',
                'data1',
                'data2'
            )
        );
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
