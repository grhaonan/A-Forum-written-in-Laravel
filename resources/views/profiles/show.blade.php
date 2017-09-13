@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>{{$profileUser->name}}
                        <small>Since {{$profileUser->created_at->diffForHumans()}}</small>
                    </h1>
                </div>
                @foreach($threads as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="level">
                            <span class="flex">
                            <a href={{route('profiles', $profileUser->name)}}>{{$profileUser->name}}</a>
                                Posted:
                                {{$thread->title}}
                            </span>
                                <span>
                            {{$thread->created_at->diffForHumans()}}
                            </span>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="body">{{$thread->body}}</div>
                        </div>
                    </div>{{--panel ends--}}
                @endforeach
                {{$threads->links()}}
            </div>

        </div>
    </div>

@endsection