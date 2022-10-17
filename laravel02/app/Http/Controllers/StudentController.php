<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){

        $students = Student::all();
        return view('student.student_manage',['students' => $students]);
    }
    public function get_student_byId($id){
        $student = Student::findOrFail($id);
        return view('student.edit',['student' => $student]);

    }
    public function edit(Request $request, $id){
        $student = Student::findOrFail($id);
        $student->fullname = $request->txtFullName;
        $student->birthday = $request->txtBirthday;
        $student->address = $request->txtAddress;
        $student->save();
        return redirect('/students');
    }
}
