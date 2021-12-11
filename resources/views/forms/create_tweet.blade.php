<form action="{{ route('tweet.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="tweet_text">Tweet</label>
        <textarea name="tweet_text" id="tweet_text" placeholder="Enter your tweet..." rows="3" class="form-control"></textarea>
    </div>
    <div class="form-group d-flex mt-3">
        <button class="btn btn-info">Tweet It!</button>
    </div>
</form>
