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
 * Show suggested users on the index page
 */
Route::get('/', 'UserController@index');

/**
 * Show a specific user page
 */
Route::get('/users/{user}', 'UserController@show');
Route::get('/profile/{user}', 'UserController@profile');

/**
 * - Show the edit page of your profile
 * - Update your account information
 * - Update your intrests
 * - Update you password
 */
Route::get('/users/edit/{user}', 'UserController@edit');
Route::patch('/users/update/{user}', 'UserController@update');
Route::patch('/users/update-tags/{user}', 'UserController@updateTags');
Route::patch('/users/update-password/{user}', 'UserController@updatePassword');

/**
 * Show the search page with the results
 */
Route::any('/search', 'UserController@search');

/**
 * Filter any results
 */
Route::any('/filter', 'UserController@filter');

/**
 * Show all the users
 */
Route::any('/all-users', 'UserController@allUsers');

/**
 * - When on a user's profile, you can send them a friendrequest or if you're
 *   already friends, you can delete this friend
 */
Route::match(['get', 'post'], '/add-friend/{userid}', 'UserController@addFriend');
Route::match(['get', 'post'], '/remove-friend/{userid}', 'UserController@removeFriend');

/**
 * - Show the request page where users want to be your friends
 * - Accept or deny a friendrequest
 * - Show the buddies page where you can see who you are friends with
 */
Route::get('/requests', 'UserController@friendsRequests');
Route::get('/accept-request/{userid}', 'UserController@acceptRequest');
Route::get('/cancel-request/{userid}', 'UserController@cancelRequest');
Route::get('/buddies', 'UserController@showBuddies');

/**
 * Delete your user account
 */
Route::delete('/users/delete/{id}', 'UserController@destroy');