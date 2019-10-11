@if ($content)
    <section class="bg-white detail-option-information">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-section-title">
                        <p>
                            Retail store
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    @if ($content->metaValue('retailImage'))
                        <img src="{{ $content->metaValue('retailImage') }}" alt="" class="img-fluid">
                    @endif
                </div>
                <div class="col-md-7">
                    <div class="retail-information">
                        @if ($content->metaValue('retailName'))
                            <div class="d-flex justify-content-between retail-head py-2">
                                <div class="retail-name">{{ $content->metaValue('retailName') }}</div>

                                @if ($content->metaValue('retailPhone'))
                                    <div class="retail-phone">{{ $content->metaValue('retailPhone') }}</div>
                                @endif
                            </div>
                        @endif

                        @if ($content->metaValue('retailAddress'))
                            <div class="retail-row">
                                <div class="row-title">Retail address</div>
                                <div class="row-info">{{ $content->metaValue('retailAddress') }}</div>
                            </div>
                        @endif

                        @if ($content->metaValue('retailOpenHours'))
                            <div class="retail-row">
                                <div class="row-title">Open hours</div>
                                <div class="row-info">{{ $content->metaValue('retailOpenHours') }}</div>
                            </div>
                        @endif

                        @if ($content->metaValue('retailVehicles'))
                            <div class="retail-row">
                                <div class="row-title">A reserved vehicle</div>
                                <div class="row-info">{{ $content->metaValue('retailVehicles') }} vehicles</div>
                            </div>
                        @endif

                        @if ($content->metaValue('retailWebsite'))
                            <div class  ="retail-row">
                                <div class="row-title">Website</div>
                                <div class="row-info">{{ $content->metaValue('retailWebsite') }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
