<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    public function user1() {
        return $this->belongsTo('App\Student', 'user_id_1');
    }
    public function user2() {
        return $this->belongsTo('App\Student', 'user_id_2');
    }
}
