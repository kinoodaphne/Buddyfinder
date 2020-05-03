<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $data['students'] = \DB::table('students')->get();
        return view('students/index', $data);
    }

    public function show($student) {
        $data['student'] = \App\Student::where('id', $student)->with('friends')->first();
        return view('students/show', $data);
    }
}
