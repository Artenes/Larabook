@extends('layouts.default')

@section('content')

    <h1>All users</h1>

    @foreach($users->chunk(4) as $userSet)

        <div class="row users">

            @foreach($userSet as $user)

                <div class="col-md-3 user-block">

                    @include('layouts.partials.avatar', ['size' => 70, 'userInstance' => $user])
                    <h4 class="user-block-username">{{ $user->name }}</h4>

                </div>

            @endforeach

        </div>

    @endforeach

    {{ $users->links() }}

@endsection
