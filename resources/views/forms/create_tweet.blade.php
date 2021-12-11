@if(isset($tweet))
    <form action="{{ route('tweet.update', $tweet->id) }}" method="POST">
        @method('PUT')
@else
    <form action="{{ route('tweet.store') }}" method="POST">
@endif

        @csrf
        <div class="form-group">
            <label for="tweet_text">Tweet</label>
            <textarea name="tweet_text" id="tweet_text" placeholder="Enter your tweet..." rows="3" class="form-control">{{ isset($tweet) ? $tweet->tweet_text : '' }}</textarea>
        </div>
        <div class="form-group d-flex mt-3">
            <button class="btn btn-info">{{ isset($tweet) ? 'Update' : 'Tweet It!' }}</button>
        </div>
    </form>
