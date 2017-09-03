<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{


    protected $guarded = [];


    public function path ()

    {
        return '/threads/' . $this->channel->name. '/'.$this->id;
    }

    public function channel(){


        return $this->belongsTo('App\Channel', 'channel_id');

    }

    public function replies ()

    {
        return $this->hasMany('App\Reply', 'thread_id');
    }

   //The user who post the thread
    public function user ()

    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function addReply ($reply)

    {
        $this->replies()->create($reply);
    }


}
