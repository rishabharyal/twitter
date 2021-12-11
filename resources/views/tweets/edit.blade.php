@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Tweet</h1>
                    </div>

                    <div class="card-body">
                        @include('forms.create_tweet')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
