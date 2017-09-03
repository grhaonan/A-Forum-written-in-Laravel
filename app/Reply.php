<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //Creator is someone who replied.

    public function creator()

    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
