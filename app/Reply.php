<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //Creator is someone who replied.

    protected $guarded = [];

    public function creator()

    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
