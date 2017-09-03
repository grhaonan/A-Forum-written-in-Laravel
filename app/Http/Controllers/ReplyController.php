<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeReply;
use App\Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    //

    public function store (storeReply $request, $channelId, Thread $thread)
    {

        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->user()->id
        ]);

        return back();
    }
}
