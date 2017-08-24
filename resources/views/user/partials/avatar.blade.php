<a href="{{ route('user.profile', $user->name) }}">
    <img src="{{ $user->present()->gravatar(isset($size) ? $size : 30) }}" alt="{{ $user->name }}" class="media-objetc img-circle avatar">
</a>