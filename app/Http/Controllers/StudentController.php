<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $data['students'] = \DB::table('students')->get();
        return view('students/index', $data);
    }

    public function show(\App\Student $student) {
        $student = $student;
        dd($student);
    }
}
