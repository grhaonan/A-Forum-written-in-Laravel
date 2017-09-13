<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reply extends Model
{
    //Creator is someone who replied.

    protected $guarded = [];
    protected $with =['creator'];
    use SoftDeletes;


    public function creator()

    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
