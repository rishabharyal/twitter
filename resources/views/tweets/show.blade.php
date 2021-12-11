<div class="alert alert-info">
    <strong>{{ $user->name }}</strong>
    <br>
    Date Created: {{ $tweet->created_at->diffForHumans() }}
    <h3>{{ $tweet->tweet_text }}</h3>
    @can('alter-tweet', $tweet)
        <form method="POST" action="{{ route('tweet.destroy', $tweet->id) }}">
            @csrf
            @method('DELETE')
            <a href="{{ route('tweet.edit', $tweet->id) }}" class="btn btn-info btn-sm">Edit</a>
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    @endcan
    <hr>
    <ul class="list-group list-group-flush">
        @foreach($tweet->comments as $comment)
            <li class="list-group-item">
                <h5>{{ $comment->comment }}</h5>
                {{ $comment->created_at->diffForHumans() }}
            </li>
        @endforeach
        <li class="list-group-item">
            <form action="{{ route('comment.store') }}" method="POST">
                @csrf
                <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                <div class="row form-group">
                    <div class="col-10">
                        <input type="text" class="form-control" name="comment" id="comment" placeholder="Reply to this sweet...">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-block btn-primary form-control">Reply</button>
                    </div>
                </div>
            </form>
        </li>
    </ul>
</div>
