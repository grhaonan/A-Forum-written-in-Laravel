<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeReply;
use App\Reply;
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


    public function destroy (Reply $reply)

    {
        //only authorized user-reply creator can delete the reply;
        $this->authorize('delete', $reply);
        $reply->delete();
        return back();
    }


}
