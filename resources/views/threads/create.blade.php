@extends('layouts.app')
@section('content')
    @if(auth()->check())
        <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Threads List</div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('storeThread')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label>Thread Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="The thread title">
                            </div>
                            <div class="form-group">
                                <label>Thread Body</label>
                                <textarea class="form-control" name="body" id="body" placeholder="The thread body" rows="3">{{old('body')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Channel ID</label>
                                <select name="channelId" id="channelId" class="form-control">
                                    <option class="placeholder" selected disabled value="">chose a slug</option>
                                    @foreach($channels as $channel)
                                    <option value="{{$channel->id}}">{{$channel->slug}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-default" >POST</button>
                        </form>
                    </div>
                </div>
            </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @else
        <p class="text-center">Please <a href="{{route('login')}}">Singn in</a>to post a thread</p>
    @endif
        </div>
@endsection()