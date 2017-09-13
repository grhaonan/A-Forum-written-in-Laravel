<?php

namespace  App\Observers;

use App\Thread;

class ThreadObserver {


    public function deleting (Thread $thread)

    {
        $thread->replies()->delete();
    }

}