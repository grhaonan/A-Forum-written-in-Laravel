<div class="panel panel-default">
    <div class="panel-heading">
        <a href={{route('profiles', $reply->creator->name)}}>
            {{$reply->creator->name}}
        </a>
        Replied
        {{$reply->created_at->diffForHumans()}}...
    </div>
    <div class="panel-body">
        <div class="body">{{$reply->body}}</div>
    </div>
</div>