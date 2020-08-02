<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register()
    {
        return view('users/register');
    }

    public function handleRegister(Request $request)
    {
        $user = new \App\User();
        $user->name = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->password = \Hash::make($request->input('password'));
        $user->save();

        $data['user'] = \App\User::find($user->id)->where('id', $user->id)->first();
        $name = $data['user']->name;

        $request->session()->put('name', $name);

        return redirect('/user/login');
    }

    public function login()
    {
        return view('users/login');
    }

    public function handleLogin(Request $request)
    {

        $credentials = $request->only(['email', 'password']);

        if (\Auth::attempt($credentials)) {
            $user = auth()->user();

            $data['user'] = \App\User::find($user->id)->where('id', $user->id)->first();

            $name = $data['user']->name;
            $uid = $data['user']->id;

            $request->session()->put('name', $name);
            $request->session()->put('uid', $uid);
            /**
             * ->with is the same as flash
             * return redirect('/')->with('name', $name);
             *  */

            return redirect('/');
        };

        return redirect()->route('login')->withErrors('Your email or password was incorrect!');;
    }

    public function logout()
    {
        \Auth::logout();
        \Session::flush();

        return redirect('user/login');
    }

    public function search()
    {
        $data['users'] = \DB::table('users')->get();
        return view('search', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('uid') == true) {
            $data['users'] = \DB::table('users')->where('id', '!=', session('uid'))->get();
            return view('students/index', $data);
        } else {
            return redirect('/user/login');
        }
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
        $validation = $request->validate([
            'firstName' => 'required|max:200',
            'lastName' => 'required|max:200',
            'email' => 'required',
        ]);

        $request->flash();

        $user = new \App\User();
        $user->name = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->year = $request->input('year');
        $user->location = $request->input('location');
        $user->study_field = $request->input('study_field');
        $user->music = $request->input('music');
        $user->hobbies = $request->input('hobbies');
        $user->series = $request->input('series');
        $user->gaming = $request->input('gaming');
        $user->books = $request->input('books');
        $user->travel = $request->input('travel');
        $user->buddy = $request->input('buddy');
        $user->bio = $request->input('bio');
        $user->password = $request->input('password');

        $user->save();

        // Message will be displayed only once
        $request->session()->flash('message', 'Student saved');

        /**
         * Message will be displayed all the time
         * $request->session()->put('message', 'Permament message');
         * 
         * Message will be removed
         * $request->session()->pull('message', 'Permament message');
         */

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
        // $data['user'] = \App\User::where('id', $id)->with('friends')->first();
        $data['user'] = \App\User::where('id', $id)->first();
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
        if ($id != session('uid')) {
            return redirect('/');
        } else {
            $data['user'] = \App\User::where('id', $id)->first();
            return view('students/edit', $data);
        }
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
        $user = \App\User::find($id);
        $user->name = $request->get('firstName');
        $user->name = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->year = $request->input('year');
        $user->location = $request->input('location');
        $user->study_field = $request->input('study_field');
        $user->music = $request->input('music');
        $user->hobbies = $request->input('hobbies');
        $user->series = $request->input('series');
        $user->gaming = $request->input('gaming');
        $user->books = $request->input('books');
        $user->travel = $request->input('travel');
        $user->buddy = $request->input('buddy');
        $user->bio = $request->input('bio');
        $user->save();

        return back()
            ->with('success', 'Wijzigingen opgeslagen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // $user = \Auth::user();
        $user = \App\User::find($request->user_id);

        $user->delete();
        $request->session()->flash('message', 'Student has been deleted');
        return redirect('/students');
    }
}
