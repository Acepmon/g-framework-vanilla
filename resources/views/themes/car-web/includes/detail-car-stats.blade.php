@if ($content)
<div class="card">
    <div class="card-body">
        <div class="dealer-information px-3">

            @if ($content->metaValue('isVerified'))
                <div class="dealer-more">
                    <div class="value"><i class="icon-check"></i></div>
                    <div class="title">Verified</div>
                </div>
            @endif

            <div class="dealer-more">
                <div class="value">
                    <p>{{ $content->metaValue('viewed') }}</p>
                </div>
                <div class="title">Viewed</div>
            </div>

            <div class="dealer-more">
                <div class="value">
                    <p>{{ $content->metaValue('interested') }}</p>
                </div>
                <div class="title">Interested</div>
            </div>

        </div>
    </div>
</div>
@endif
