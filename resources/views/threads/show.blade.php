@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Threads List</div>
                    <div class="panel-body">
                        <article>
                            <a href="#">{{$thread->user->name}}</a>
                            Published this thread
                            {{$thread->created_at->diffForHumans()}}...
                            <h3>{{$thread->title}}</h3>
                        </article>
                        <div class="body">{{$thread->body}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($thread->replies as $reply)
                 @include('threads.reply')
                @endforeach
            </div>
        </div>


        @if(auth()->check())
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="POST" action="{{$thread->path(). '/replies'}}">
                    {{csrf_field()}}
                   <div class="form-group">
                       <textarea class="form-control" name="body" id="body" placeholder="Have something to say" rows="5"></textarea>
                   </div>
                    <button type="submit" class="btn btn-default" >POST</button>
                </form>
            </div>
        </div>
        @else
        <p class="text-center">Please <a href="{{route('login')}}">sign in</a> to participate in this discuss</p>
        @endif

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
@endsection
