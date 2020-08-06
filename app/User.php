<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getUserName($user_id) {
        $getUserId = \App\User::select('name')->where('id', $user_id)->first();
        return $getUserId->name;
    }

    public static function getUserLastName($user_id) {
        $getUserId = \App\User::select('lastName')->where('id', $user_id)->first();
        return $getUserId->lastName;
    }

    public static function getUserLocation($user_id) {
        $getUserId = \App\User::select('location')->where('id', $user_id)->first();
        return $getUserId->location;
    }
    
    public static function getUserEmail($user_id) {
        $getUserId = \App\User::select('email')->where('id', $user_id)->first();
        return $getUserId->email;
    }
    
    public static function getUserYear($user_id) {
        $getUserId = \App\User::select('year')->where('id', $user_id)->first();
        return $getUserId->year;
    }
    
    public static function getUserStudyField($user_id) {
        $getUserId = \App\User::select('study_field')->where('id', $user_id)->first();
        return $getUserId->study_field;
    }
    
    public static function getUserMusic($user_id) {
        $getUserId = \App\User::select('music')->where('id', $user_id)->first();
        return $getUserId->music;
    }
    
    public static function getUserHobbies($user_id) {
        $getUserId = \App\User::select('hobbies')->where('id', $user_id)->first();
        return $getUserId->hobbies;
    }
    
    public static function getUserSeries($user_id) {
        $getUserId = \App\User::select('series')->where('id', $user_id)->first();
        return $getUserId->series;
    }

    public static function getUserGaming($user_id) {
        $getUserId = \App\User::select('gaming')->where('id', $user_id)->first();
        return $getUserId->gaming;
    }
    
    public static function getUserTravel($user_id) {
        $getUserId = \App\User::select('travel')->where('id', $user_id)->first();
        return $getUserId->travel;
    }
    
    public static function getUserBuddy($user_id) {
        $getUserId = \App\User::select('buddy')->where('id', $user_id)->first();
        return $getUserId->buddy;
    }

    public static function getUserBio($user_id) {
        $getUserId = \App\User::select('bio')->where('id', $user_id)->first();
        return $getUserId->bio;
    }
    public static function getUserProfilePicture($user_id) {
        $getUserId = \App\User::select('profile_picture')->where('id', $user_id)->first();
        return $getUserId->profile_picture;
    }

    public static function getUserid($user_id) {
        $getUserId = \App\User::select('id')->where('id', $user_id)->first();
        return $getUserId->id;
    }
}
