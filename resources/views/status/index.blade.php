@extends('layouts.default')

@section('content')

    <h2>Post a Status</h2>

    <form action="{{ route('status.store') }}" method="POST">

        {{ csrf_field() }}

        <label>Status</label>
        <p><input type="text" name="status"></p>

        <button class="btn btn-primary">Post Status</button>

    </form>

    <h2>Statuses</h2>

    @foreach($statuses as $status)
        <article>
            {{$status['body']}}
        </article>
    @endforeach

@endsection
