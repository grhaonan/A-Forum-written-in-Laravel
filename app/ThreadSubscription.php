<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThreadSubscription extends Model
{
    //
    protected $guarded = [];
    use SoftDeletes;
}
