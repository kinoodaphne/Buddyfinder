<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $with = ['friends'];

    public function friends() {
        return $this->hasMany('App\Friend', 'user_id_1');
    }
    public function friends1() {
        return $this->hasMany('App\Friend', 'user_id_2');
    }
}
