<?php

// use App\Http\Controllers\ProfileController;

use App\Http\Controllers\dashboard\classRoomController;
use App\Http\Controllers\dashboard\dashboardController;
use App\Http\Controllers\dashboard\lessonController;
use App\Http\Controllers\dashboard\profileController;
use App\Http\Controllers\dashboard\moaveninController;
use App\Http\Controllers\dashboard\modirController;
use App\Http\Controllers\dashboard\schoolController;
use App\Http\Controllers\dashboard\StudentController;
use App\Http\Controllers\dashboard\teacherController;
use App\Http\Controllers\dashboard\validationController;
use App\Http\Controllers\dashboard\disciplineController;
use App\Http\Controllers\dashboard\exampleDisciplineController;
use App\Http\Controllers\dashboard\ReportCartController;
use App\Http\Controllers\dashboard\scoreController;
use App\Http\Controllers\hiddensController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\checkMoaaven;
use App\Http\Middleware\checkModir;
use App\Http\Middleware\checkStudent;
use App\Http\Middleware\checkTeacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::redirect('/','login');
Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('dashboard/profile', [profileController::class , "index"])->name('profile.show');
    Route::put('dashboard/profileUpdate', [profileController::class , "update"])->name('profile.update');
    Route::resource('dashboard/home', dashboardController::class)->names('dashboard');
    Route::resource('dashboard/moavein', moaveninController::class)->names('dashboard.moavein')->middleware(checkModir::class);
    Route::resource('dashboard/schools', schoolController::class)->names('dashboard.schools')->middleware(CheckAdmin::class);
    Route::resource('dashboard/modiran',modirController::class)->names('dashboard.modiran')->middleware(CheckAdmin::class);
    Route::resource('dashboard/teachers', teacherController::class )->names('dashboard.teachers')->middleware(checkMoaaven::class);
    Route::resource('dashboard/classes', classRoomController::class)->names('dashboard.classes')->middleware(checkMoaaven::class);;
    Route::resource('dashboard/lessons', lessonController::class)->names('dashboard.lessons')->middleware(checkMoaaven::class);
    Route::resource('dashboard/students', StudentController::class)->names('dashboard.students')->middleware(checkTeacher::class);
    Route::resource('dashboard/attendances', validationController::class)->names('dashboard.validations')->middleware(checkTeacher::class);;
    Route::resource('dashboard/hiddens', hiddensController::class)->names('dashboard.hiddens')->middleware(checkMoaaven::class);;
    Route::resource('dashboard/disciplines', disciplineController::class)->names("dashboard.disciplines")->middleware(checkMoaaven::class);;
    Route::resource('dashboard/disciplineExamps', exampleDisciplineController::class)->names('dashboard.disciplineExamps');
    Route::resource('dashboard/scores', scoreController::class)->names('dashboard.scores')->middleware(checkTeacher::class);;
    Route::resource('dashboard/reportCart', ReportCartController::class)->names('dashboard.reportcart')->middleware(checkStudent::class);
    Route::post('dashboard/teachers/r/{id}', [teacherController::class, "getClass"])->name('getClass');
    Route::post('dashboard/teachers/s/{id}', [teacherController::class, "getTeacher"])->name('getTeacher');
    Route::post('dashboard/students/d/{id}', [StudentController::class, 'sendData'])->name('getStudent');
    Route::any('dashboard/score/GetScore/{id}/{lesson_id}/{posision}', [scoreController::class, "getScore"])->name('getscore');
    // Route::any('dashboard/hiddens/g', [hiddensController::class, 'sendData'])->name('getData');
    // Route::resource('dashboard/students/')
    Route::get('/logout', function(){Auth::logout();})->name('logout');
});

require __DIR__.'/auth.php';
