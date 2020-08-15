<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $guarded = ['id'];

    public function friend() {
        return $this->hasOne(\App\User::class, 'friend_id', 'id');
    }

    public function user() {
        return $this->belongsTo(\App\User::class);
    }

    public static function newFriendCount() {
        $user_id = \Auth::user()->id;
        $friendsRequests = \App\Friend::where(['friend_id' => $user_id, 'accepted' => 0])->get();

        return $friendsRequests->count();

    }
}
