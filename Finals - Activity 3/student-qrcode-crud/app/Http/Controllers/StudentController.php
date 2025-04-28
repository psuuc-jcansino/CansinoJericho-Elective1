<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $students = Student::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%")
                         ->orWhere('email', 'like', "%$search%")
                         ->orWhere('course', 'like', "%$search%");
        })->get();

        return view('students.index', compact('students', 'search'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());
        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        $qrCode = QrCode::size(250)->generate("Name: {$student->name}\nEmail: {$student->email}\nCourse: {$student->course}\nAge: {$student->age}");
        return view('students.show', compact('student', 'qrCode'));
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}