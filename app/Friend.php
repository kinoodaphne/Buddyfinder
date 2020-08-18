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

    public static function CheckIfFriends($friendId) {

        $myId = \Auth::user()->id;
        $friend = \App\User::getUserid($friendId);

        $friendCount = \App\Friend::where(['user_id' => $myId, 'friend_id' => $friend, 'accepted' => 1])->count();
        $friendCount1 = \App\Friend::where(['user_id' => $friend, 'friend_id' => $myId, 'accepted' => 1])->count();

        // echo ("my id: ". $myId . "<br> Friend id: ". $friend . "<br>".$friendCount1);
        // die;
        if ($friendCount === 1) {
            /**
             * You are friends
             */
            return true;
        } else if ($friendCount1 === 1) {
            return true;
        } else {
            /**
             * You're not friends
             */
            return false;
        }
    }

    public static function amIRequestSender($friendId) {
        $myId = \Auth::user()->id;
        $friend = \App\User::getUserid($friendId);

        $checkRequest = \App\Friend::where(['user_id' => $myId, 'friend_id' => $friend])->count();

        if ($checkRequest === 1) {
            /**
             * You are the sender
             */
            return true;
        } else {
            /**
             * You are the receiver
             */
            return false;
        }
    }

    public static function amIRequestReceiver($friendId) {
        $myId = \Auth::user()->id;
        $friend = \App\User::getUserid($friendId);

        $checkRequest = \App\Friend::where(['user_id' => $friend, 'friend_id' => $myId])->count();

        if ($checkRequest === 1) {
            /**
             * You are the receiver
             */
            return true;
        } else {
            /**
             * You are not the receiver
             */
            return false;
        }
    }

    public static function checkIfRequestSent($friendId) {
        $myId = \Auth::user()->id;
        $friend = \App\User::getUserid($friendId);

        $checkRequestSent = \App\Friend::where(['user_id' => $myId, 'friend_id' => $friend])->orWhere(['user_id' => $friend, 'friend_id' => $myId])->count();

        if ($checkRequestSent === 1) {
            /**
             * Request is already sent
             */
            return true;
        } else {
            /**
             * Request is not sent yet
             */
            return false;
        }
    }

    public static function sendFriendRequest($friendId)
    {
        $myId = \Auth::user()->id;
        $myFriend = \App\User::getUserid($friendId);

        $friend = new \App\Friend();
        $friend->user_id = $myId;
        $friend->friend_id = $myFriend;
        $friend->save();
    }

    // public static function getAllFriends() {
    //     $myId = \Auth::user()->id;
        
    //     $AllFriends = \App\Friend::where(['user_id' => $myId])->orWhere(['friend_id' => $myId])->where(['accepted' => 1]);

    //         $returnData = [];
    //         foreach ($AllFriends->get() as $row) {

    //             if ($row->user_id == $myId) {
    //                 $user = \App\User::where(['id' => $row->friend_id]);
                    
    //                 array_push($returnData, $user->get());
    //             } else {
    //                 $user = \App\User::where(['id' => $row->user_id]);

    //                 array_push($returnData, $user->get());
    //             }
    //         }
    //         return $returnData;
    //         dd($returnData);
    // }

    public static function getFriendCount() {
        $myId = \Auth::user()->id;
        
        $AllFriends = \App\Friend::where(['user_id' => $myId])->orWhere(['friend_id' => $myId])->where(['accepted' => 1]);
    
        return $AllFriends->count();
    }
}
