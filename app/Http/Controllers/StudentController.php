<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function add(){
        $student = new Student();
        $student->name = 'salwa';
        $student->email = 'salwa@gmail.cim';
        $student->save();
        return "enregistrement ajouté";
    }

    public function voir(){
        $result = Student::get();
        // $result = Student::where('id',1)->get();
        return view('voirenr', compact('result'));
    }

    public function update(){
        $stud = Student::where('id',1)->first();
        $stud->name = 'farid';
        $stud->name = 'farid^hotmail.com';
        $stud->update();
    }

    public function delete(){
        $stud = Student::where('id',2)->first();
        $stud->delete();
    }

    public function all_student_show(){
        // $all_students = Student::get();
        $all_students = Student::with('rPhone')->get();
        // $all_students = Phone::with('rStudent')->get();

        return view('allstudents', compact('all_students'));
    }
}
