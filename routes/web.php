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

/**
 * Registering a user to the platform
 */
Route::get('/user/register', 'UserController@register');
Route::post('/user/register', 'UserController@handleRegister');
Route::post('/users', 'UserController@store');

/**
 * Loggin a user into the platform
 */
Route::get('/user/login', 'UserController@login');
Route::post('/user/login', 'UserController@handleLogin');

/**
 * Logging a user out of the platform
 */
Route::get('/user/logout', 'UserController@logout');

/**
 * Show users on the index page
 */
Route::get('/', 'UserController@index');

/**
 * Show a specific user page
 */
Route::get('/users/{user}', 'UserController@show');


/**
 * Show the edit page of your profile and update your profile
 */
Route::get('/users/edit/{user}', 'UserController@edit');
Route::put('/users/update/{user}', 'UserController@update');

// Route::delete('/student/delete/{id}', 'Studentcontroller@destroy');
