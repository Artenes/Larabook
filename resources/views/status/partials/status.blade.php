<article class="media status-media">
    <div class="pull-left">
        <img src="{{ $status->user->present()->gravatar }}" alt="{{ $status->user->name }}"
             class="media-objetc">
    </div>
    <div class="media-body">
        <h4 class="media-heading">{{ $status->user->name }}</h4>
        <p>{{ $status->present()->timeSincePublished }}</p>
        {{$status['body']}}
    </div>
</article>