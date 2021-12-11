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
                    @auth()
                        @include('forms.create_tweet')
                    @endauth

                    <div class="mt-5">
                        <h3>{{ $user->name }}'s Tweet</h3>
                        <hr>
                        @forelse($user->tweets as $tweet)
                            @include('tweets.show')
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
