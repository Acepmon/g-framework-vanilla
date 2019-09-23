@if ($content)
<div class="card">
    <div class="card-body">
        <div class="dealer-information row">

            @if ($content->metaValue('doctorVerified') && !$content->metaValue('doctorVerificationRequest'))
                <div class="dealer-more col-lg-4">
                    <div class="value"><i class="icon-check"></i></div>
                    <div class="title">Verified by <br><span class="font-weight-bold">DOCTOR</span> Service</div>
                </div>
            @else
                <div class="dealer-more col-lg-4">
                    <div class="value"><i class="icon-cross3"></i></div>
                    <div class="title">Not Verified</div>
                </div>
            @endif

            <div class="dealer-more col-lg-4">
                <div class="value">
                    <p>{{ $content->metaValue('viewed') ? $content->metaValue('viewed') : 0 }}</p>
                </div>
                <div class="title">Viewed</div>
            </div>

            <div class="dealer-more col-lg-4">
                <div class="value">
                    <p>{{ $content->metaValue('interested') ? $content->metaValue('interested') : 0 }}</p>
                </div>
                <div class="title">Interested</div>
            </div>

        </div>
    </div>
</div>
@endif
