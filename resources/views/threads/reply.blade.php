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

    @can('delete', $reply)
    <div class="panel-footer">
        <form action="{{route('deleteReply', $reply->id)}}" method="POST">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <button type="submit" class="btn btn-danger btn-xs">Delete Reply</button>
        </form>
    </div>
    @endcan
</div>