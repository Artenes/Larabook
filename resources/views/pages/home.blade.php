@extends('layouts.default')

@section('content')

    <div class="jumbotron">
        <h1>{{ config('app.name') }}</h1>
        <p>Welcome to the premier place to talk about Laravel with others. Why don't you sign up to see what the fuss is about?</p>
        <p>
            <a class="btn btn-lg btn-primary" href="#" role="button">Sign up »</a>
        </p>
    </div>

@endsection