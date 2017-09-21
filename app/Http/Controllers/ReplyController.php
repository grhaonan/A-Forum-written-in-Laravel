<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeReply;
use App\Reply;
use App\spam;
use App\Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    //

    public function store (storeReply $request, $channelId, Thread $thread, spam $spam)
    {


        //check if the reply is spammed
        $body = $request->input('body');
        $spam->detect($body);

        $thread->addReply([
            'body' => $body,
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
