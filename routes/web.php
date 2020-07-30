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


// Route::post('/students', 'StudentController@store');
// Route::post('/students/{student}', 'StudentController@edit');

// Route::get('/', 'StudentController@index');

// Route::get('/students', 'StudentController@index');

// Route::get('/students/create', 'StudentController@create');
// Route::get('/student/{student}/edit', 'StudentController@edit');

// Route::get('/students/{student}', 'StudentController@show');

// Route::get('/search', 'StudentController@search');

Route::post('/users', 'UserController@store');
Route::post('/users/{student}', 'UserController@edit');

Route::get('/', 'UserController@index');

Route::get('/users', 'UserController@index');

Route::get('/users/create', 'UserController@create');
Route::get('/users/{user}/edit', 'UserController@edit');

Route::get('/users/{user}', 'UserController@show');

Route::get('/search', 'UserController@search');


// MANUALLY IMPLEMENTING AUTHENTICATION
Route::get('/user/register', 'UserController@register');
Route::post('/user/register', 'UserController@handleRegister');
Route::get('/user/login', 'UserController@login');
Route::post('/user/login', 'UserController@handleLogin');

Route::get('/user/logout', 'UserController@logout');

Route::delete('/student/delete/{id}', 'Studentcontroller@destroy');
