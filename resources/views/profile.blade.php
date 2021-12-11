@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>My Profile</h1>
                    <p>Welcome to {{ $user->name }}'s profile</p>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    @auth()
                        @include('forms.create_tweet')
                    @endauth

                    <div class="mt-5">
                        <h3>{{ $user->name }}'s Tweet</h3>
                        <hr>
                        @forelse($user->tweets as $tweet)
                            <div class="alert alert-info">
                                <strong>{{ $user->name }}</strong>
                                <br>
                                Date Created: {{ $tweet->created_at->diffForHumans() }}
                                <h3>{{ $tweet->tweet_text }}</h3>
                                @can('alter-tweet', $tweet)
                                    <div>
                                        <a href="" class="btn btn-info btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </div>
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
                        @empty
                           <div class="alert alert-warning">
                               {{ $user->name }} does not have any tweets.
                           </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
