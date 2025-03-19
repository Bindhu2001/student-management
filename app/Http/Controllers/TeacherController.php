<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index() {
        $teachers = Teacher::with('students')->get();
        return view('teachers.index', compact('teachers'));
    }
    
    public function show($id) {
        $teacher = Teacher::with('students')->findOrFail($id);
        return view('teachers.show', compact('teacher'));
    }
    public function create() {
        return view('teachers.create');
    }
    
    
    public function store(Request $request) {
        Teacher::create($request->validate([
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:teachers,email',
        ]));
        return redirect()->route('teachers.index');
    }
}
