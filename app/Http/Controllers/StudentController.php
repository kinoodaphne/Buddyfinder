<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function search() {
        $data['students'] = \DB::table('students')->get();
        return view('search', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['students'] = \DB::table('students')->get();
        return view('students/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['student'] = \App\Student::where('id', $id)->with('friends')->first();
        return view('students/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('students/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = new \App\Student();
        $id->firstName = $request->input('firstName');
        $id->lastName = $request->input('lastName');
        $id->email = $request->input('email');
        $id->year = $request->input('year');
        $id->location = $request->input('location');
        $id->study_field = $request->input('study_field');
        $id->music = $request->input('music');
        $id->hobbies = $request->input('hobbies');
        $id->series = $request->input('series');
        $id->gaming = $request->input('gaming');
        $id->books = $request->input('books');
        $id->travel = $request->input('travel');
        $id->buddy = $request->input('buddy'); 
        $id->bio = $request->input('bio'); 
        
        $id->save();
        return redirect('/students/{{$id}}');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
