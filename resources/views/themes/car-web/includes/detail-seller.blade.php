@if ($user)
<div class="card">
    <div class="card-body">
        <div class="dealer-information">
            <div class="dealer-img">
                <img src="{{ $user->avatar_url() }}" alt="" class="img-fluid">
            </div>
            <div class="dealer-meta">
                <div class="dealer-name">{{ $user->name }}</div>
                <div class="dealer-status">{{ $user->groups->implode('title', ',') == 'Member'?'Энгийн хэрэглэгч':$user->groups->implode('title', ',') }}</div>
                <div class="dealer-contact"> <i class="fab fa fa-phone-alt text-muted"></i> {{ $user->metaValue('phone') }}</div>
            </div>
        </div>
    </div>
</div>
@endif
