<div class="status-post">

    <form action="{{ route('statuses.store') }}" method="POST">

        {{ csrf_field() }}

        <div class="form-group">
            <textarea name="status" placeholder="What's on your vage?" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group status-post-submit">
            <button class="btn btn-default btn-xs">Post Status</button>
        </div>

    </form>

</div>