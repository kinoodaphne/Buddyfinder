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

    public function create()
    {
        return view('students/create');
    }

    public function store(Request $request)
    {
        $student = new \App\Student();
        $student->firstName = $request->input('firstName');
        $student->lastName = $request->input('lastName');
        $student->email = $request->input('email');
        $student->year = $request->input('year');
        $student->location = $request->input('location');
        $student->study_field = $request->input('study_field');
        $student->music = $request->input('music');
        $student->hobbies = $request->input('hobbies');
        $student->series = $request->input('series');
        $student->gaming = $request->input('gaming');
        $student->books = $request->input('books');
        $student->travel = $request->input('travel');
        $student->buddy = $request->input('buddy'); 
        $student->bio = $request->input('bio'); 
        
        $student->save();
        return redirect('/students');
    }

    public function search() {
        $data['students'] = \DB::table('students')->get();
        return view('search', $data);
    }
}
