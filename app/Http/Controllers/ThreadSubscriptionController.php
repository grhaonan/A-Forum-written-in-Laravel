<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class ThreadSubscriptionController extends Controller
{
    protected $userId;

    public function __construct ()

    {

        $this->userId = auth()->id();
    }

    //
    public function store ($channelName, Thread $thread )

    {
        $userId = $this->userId;
        $thread->subscribe($userId);

        return back();

    }

    public function destroy ($channelName, Thread $thread)

    {
        $userId = $this->userId;
        $thread->unsubscribe($userId);

        return back();

    }
}

