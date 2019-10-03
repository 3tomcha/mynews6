<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = ['id'];

    public function profile_histories()
    {
        return $this->hasMany('App\ProfileHistory');
    }
}
