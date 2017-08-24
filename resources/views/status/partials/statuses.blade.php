@forelse($statuses as $status)

    @include('status.partials.status')

@empty

    <p>This user hasn't yet posted a status.</p>

@endforelse