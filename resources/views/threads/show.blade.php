@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="level">
                            <span class="flex">
                            <a href={{route('profiles',$thread->user->name)}}>{{$thread->user->name}}</a>
                                Posted:
                                {{$thread->title}}
                            </span>
                            @can('delete', $thread)
                           <form action="{{$thread->path()}}" method="POST">
                               {{csrf_field()}}
                               {{method_field('delete')}}
                               <button type="submit" class="btn btn-link">Delete Thread</button>
                           </form>
                            @endcan
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="body">{{$thread->body}}</div>
                    </div>
                </div>{{--panel ends--}}


                {{--show replies with pagination--}}
                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach

                {{$replies->links()}}

                {{--create reply pannel--}}
                @if(auth()->check())
                    <form method="POST" action="{{$thread->path(). '/replies'}}">
                        {{csrf_field()}}
                        <div class="form-group">
                                <textarea class="form-control" name="body" id="body" placeholder="Have something to say"
                                          rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">POST</button>
                    </form>
                @else
                    <p class="text-center">Please <a href="{{route('login')}}">sign in</a> to participate in this
                        discuss
                    </p>
                @endif
                {{--Error message flashing--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>This post was published by {{$thread->user->name}} {{$thread->created_at->diffForHumans()}},
                            and currently
                            has {{$thread->replies->count()}} {{str_plural('comment',$thread->replies()->count())}}

                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
