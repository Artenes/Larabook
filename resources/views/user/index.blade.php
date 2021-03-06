@extends('layouts.default')

@section('content')

    <h1>All users</h1>

    @foreach($users->chunk(4) as $userSet)

        <div class="row users">

            @foreach($userSet as $user)

                <div class="col-md-3 user-block">

                    @include('user.partials.avatar', ['size' => 70])

                    <h4 class="user-block-username">
                        <a href="{{ route('user.profile', $user->name) }}">{{ $user->name }}</a>
                    </h4>

                </div>

            @endforeach

        </div>

    @endforeach

    {{ $users->links() }}

@endsection
