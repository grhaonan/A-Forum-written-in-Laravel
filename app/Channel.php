<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Channel extends Model
{
    //
    use SoftDeletes;

    public function threads ()
    {
        return $this->hasMany('App\thread','channel_id');
    }
}
