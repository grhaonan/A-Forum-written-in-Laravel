<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Http\Requests\storeThread;
use App\Thread;
use App\User;
use Illuminate\Http\Request;

class ThreadController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($channelSlug = null)
    {
        //check if the user want to list the page based on channel slug filter

        if ($channelSlug)
        {
            $channelSlug = Channel::where('slug', $channelSlug)->first();
            if ($channelSlug !== null)
            {
                $threads = $channelSlug->threads();
            } else
            {
                $threads = [];
            }
        } else
        {
            $threads = Thread::with('channel')->latest();
        }

        //check if the user want to list the treads created by certain username

        if($userName = \request('by')){
            $userId = User::where('name', $userName)->firstOrFail()->id;
            $threads = $threads->where('user_id', $userId);
        }

         $threads =  $threads->paginate(6);


        return view('threads.index', compact('threads'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (auth()->check())
        {
            return view('threads.create');
        } else
        {
            return redirect(route('login'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeThread $request)

    {

        $theStoredThread = Thread::create([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'channel_id' => $request->input('channelId')
        ]);

        return redirect($theStoredThread->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function show($channelId, Thread $thread)
    {
        //当在路由中使用/threads/{thread}的方式后，这里的$thread的数值
        //实际就是Thread:find($id)的结果了，这里laravel做了智能处理，很方便。

        return view('threads.show',[
            'thread' => $thread,
            'replies' => $thread->replies()->paginate(2)
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy($channel, Thread $thread)
    {
        //
        $thread->replies()->delete();
        $thread->delete();

        return redirect()->route('threads');

    }
}
