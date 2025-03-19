<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('teachers', TeacherController::class);
Route::resource('students', StudentController::class);

