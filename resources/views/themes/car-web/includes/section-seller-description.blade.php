@if ($content)
<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="detail-option-information">
                    <div class="detail-section-title">Dealer Description</div>

                    <div class="dealer-description">
                        <p>{!! $content->metaValue('sellerDescription') !!}</p>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</section>
@endif
