<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = ['id'];

    public function news_histories()
    {
        return $this->hasMany('App\NewsHistory');
    }
}
