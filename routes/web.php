<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/students', 'StudentController@store');

Route::get('/', 'StudentController@index');

Route::get('/login', function() {
    return view('login');
});

Route::get('/register', function() {
    return view('register');
});

Route::get('/logout', function() {
    echo 'logout page comes here, redirect back to login page';
});

Route::get('/students/', 'StudentController@index');

Route::get('/students/create', 'StudentController@create');

Route::get('/students/{student}', 'StudentController@show');

Route::get('/search', 'StudentController@search');
