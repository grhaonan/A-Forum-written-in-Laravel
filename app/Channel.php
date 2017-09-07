<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //

    public function threads ()
    {
        return $this->hasMany('App\thread','channel_id');
    }
}
