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
                                <textarea class="form-control" name="title" id="title" placeholder="The thread title" rows="1"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Thread Body</label>
                                <textarea class="form-control" name="body" id="body" placeholder="The thread body" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Channel ID</label>
                                <textarea class="form-control" name="channel_id" id="channel_id" placeholder="The channel id" rows="1"></textarea>
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