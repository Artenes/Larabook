@if(count($statuses) > 0)

    @foreach($statuses as $status)
        @include('status.partials.status')
    @endforeach

@else

    <p>This user hasn't yet posted a status.</p>

@endif