@if($authUser)

    @if($user->isFollowedBy($authUser))

        <p>You are following {{ $user->name }}</p>

    @else

        <form action="{{ route('followers.store') }}" method="POST">

            {{ csrf_field() }}

            <input type="hidden" name="user_id_to_follow" value="{{ $user->id }}">
            <button type="submit" class="btn btn-primary">Follow {{ $user->name }}</button>

        </form>

    @endif

@endif