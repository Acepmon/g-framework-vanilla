<div class="media">
    <div class="media-left">
        <a href="{{ route('admin.users.show', [$user->id]) }}"><img src="{{ $user->avatar_url() }}" class="img-circle img-sm" alt="{{ $user->name }}"></a>
    </div>

    <div class="media-body">
        <div class="media-heading mb-0">
            <a href="{{ route('admin.users.show', [$user->id]) }}">{{ $user->name }}</a>
        </div>
        @if ($user->username)
            <span class="text-muted">{{ '@'.$user->username }}</span>
        @elseif ($user->email)
            <span class="text-muted">{{ $user->email }}</span>
        @endif
    </div>
</div>
