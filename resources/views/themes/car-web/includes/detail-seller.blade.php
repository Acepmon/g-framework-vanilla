@if ($user)
<div class="card">
    <div class="card-body">
        <div class="dealer-information">
            <div class="dealer-img">
                <img src="{{ $user->avatar_url() }}" alt="" class="img-fluid">
            </div>
            <div class="dealer-meta">
                <div class="dealer-name">{{ $user->name }}</div>
                <div class="dealer-status">{{ $user->metaValue('carType') }}</div>
                <div class="dealer-contact"> <i class="icon-phone"></i> {{ $user->metaValue('phone') }}</div>
            </div>
        </div>
    </div>
</div>
@endif
