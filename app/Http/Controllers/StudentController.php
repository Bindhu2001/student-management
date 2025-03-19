<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();
    
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }
    
        if ($request->filled('teacher_id')) {
            $query->where('teacher_id', $request->teacher_id);
        }
    
        $students = $query->with('teacher')->paginate(10);
        $teachers = Teacher::all();
    
        return view('students.index', compact('students', 'teachers'));
    }
    
    public function create() {
        $teachers = Teacher::all();
        return view('students.create', compact('teachers'));
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'address' => 'required',
            'gender' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'teacher_id' => 'required|exists:teachers,id',
        ]);
        
        $validated['photo'] = $request->file('photo')->store('students');
        Student::create($validated);
        return redirect()->route('students.index');
    }
    public function edit($id)
{
    $student = Student::findOrFail($id);
    $teachers = Teacher::all(); 
    return view('students.edit', compact('student', 'teachers'));
}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'age' => 'required|integer|min:1',
        'gender' => 'required|in:Male,Female',
        'address' => 'nullable|string|max:500',
        'teacher_id' => 'required|exists:teachers,id',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $student = Student::findOrFail($id);
    $student->name = $request->name;
    $student->age = $request->age;
    $student->gender = $request->gender;
    $student->address = $request->address;
    $student->teacher_id = $request->teacher_id;

    if ($request->hasFile('photo')) {
        
        if ($student->photo) {
            Storage::delete($student->photo);
        }
        
        $path = $request->file('photo')->store('students', 'public');
        $student->photo = $path;
    }

    $student->save();
    return redirect()->route('students.index')->with('success', 'Student updated successfully');
}

public function destroy($id)
{
    $student = Student::findOrFail($id);

   
    if ($student->photo) {
        Storage::delete($student->photo);
    }

    $student->delete();
    return redirect()->route('students.index')->with('success', 'Student deleted successfully');
}

}
