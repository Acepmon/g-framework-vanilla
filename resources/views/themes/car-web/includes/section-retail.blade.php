@if ($content)
    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-option-information py-5">
                        <div class="detail-section-title">Retail store</div>
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
                                        <div class="row py-2">
                                            <div class="col-md-4 font-weight-bold">Retail address</div>
                                            <div class="col-md-8">{{ $content->metaValue('retailAddress') }}</div>
                                        </div>
                                    @endif

                                    @if ($content->metaValue('retailOpenHours'))
                                        <div class="row py-2">
                                            <div class="col-md-4 font-weight-bold">Open hours</div>
                                            <div class="col-md-8">{{ $content->metaValue('retailOpenHours') }}</div>
                                        </div>
                                    @endif

                                    @if ($content->metaValue('retailVehicles'))
                                        <div class="row py-2">
                                            <div class="col-md-4 font-weight-bold">A reserved vehicle</div>
                                            <div class="col-md-8">{{ $content->metaValue('retailVehicles') }} vehicles</div>
                                        </div>
                                    @endif

                                    @if ($content->metaValue('retailWebsite'))
                                        <div class  ="row py-2">
                                            <div class="col-md-4 font-weight-bold">Website</div>
                                            <div class="col-md-8">{{ $content->metaValue('retailWebsite') }}</div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </section>
@endif
