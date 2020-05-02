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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function() {
    return view('login');
});

Route::get('/register', function() {
    echo 'register page comes here';
});

Route::get('/logout', function() {
    echo 'logout page comes here, redirect back to login page';
});

Route::get('/students/', function() {
    echo 'An overview of all students comes here';
});

Route::get('/students/{student}', function() {
    echo ' Detail profile of a student';
});

Route::get('/users', function() {
    $user = \DB::table('users')->get();
    dd($user);
});