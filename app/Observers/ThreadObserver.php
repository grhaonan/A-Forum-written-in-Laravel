<?php

namespace App\Observers;

use App\Thread;

class ThreadObserver {


    public function deleting(Thread $thread)

    {
        //delete all replies that belong to this thread
        $thread->replies()->delete();
        //delete all subscriptions that belong to this thread
        $thread->subscriptions()->delete();
    }

}