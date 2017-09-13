@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($threads as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                                <div class="flex">
                                    {{$thread->user->name}}
                                    Post:
                                    <a href="{{$thread->path()}}">{{$thread->title}}</a>
                                </div>
                                <strong><a href="{{$thread->path()}}">{{$thread->replies()->count()}} {{str_plural('reply', $thread->replies()->count())}}</a></strong>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="body">{{$thread->body}}</div>
                        </div>
                    </div>
                @endforeach
                {{$threads->links()}}
            </div>
        </div>
    </div>
@endsection
