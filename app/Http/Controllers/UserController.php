<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register() {
        return view('users/register');
    }

    public function handleRegister(Request $request) {
        $user = new \App\User();
        $user->name = $request->input('firstName');
        // $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->password = \Hash::make($request->input('password'));
        $user->save();

        return redirect('/user/register');
    }

    public function login() {
        return view('users/login');
    }

    public function handleLogin(Request $request) {

        $credentials = $request->only(['email', 'password']);

        if ( \Auth::attempt($credentials) ){
            $user = auth()->user();

            $data['user'] = \App\User::find($user->id)->where('id', $user->id)->first()->name;

            $name = $data['user'];

            $request->session()->put('name', $name);
            /**
             * ->with is the same as flash
             * return redirect('/')->with('name', $name);
             *  */

            return redirect('/');
        };

        return redirect()->route('login')->withErrors('Your email or password was incorrect!');        
    }

    public function logout() {
        \Auth::logout();
        \Session::flush();

        return redirect('user/login');
    }
}
