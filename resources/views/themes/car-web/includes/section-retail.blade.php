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
                    @if ($content->metaValue('image'))
                        <img src="{{ $content->metaValue('image') }}" alt="" class="img-fluid">
                    @endif
                </div>
                <div class="col-md-7">
                    <div class="retail-information">
                        @if ($content->title)
                            <div class="d-flex justify-content-between retail-head py-2">
                                <div class="retail-name">{{ $content->title }}</div>

                                <!-- @if ($content->metaValue('phone'))
                                    <div class="retail-phone">{{ format_phone($content->metaValue('phone')) }}</div>
                                @endif -->
                            </div>
                        @endif

                        @if ($content->metaValue('address'))
                            <div class="retail-row">
                                <div class="row-title">Хаяг</div>
                                <div class="row-info">{{ $content->metaValue('address') }}</div>
                            </div>
                        @endif

                        @if ($content->metaValue('openHours'))
                            <div class="retail-row">
                                <div class="row-title">Нээлттэй цаг</div>
                                <div class="row-info">{{ $content->metaValue('openHours') }}</div>
                            </div>
                        @endif

                        <!-- @if ($content->metaValue('vehicles'))
                            <div class="retail-row">
                                <div class="row-title">A reserved vehicle</div>
                                <div class="row-info">{{ $content->metaValue('vehicles') }} vehicles</div>
                            </div>
                        @endif -->

                        @if ($content->metaValue('website'))
                            <div class  ="retail-row">
                                <div class="row-title">Утас</div>
                                <div class="row-info">{{ format_phone($content->metaValue('phone')) }}</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
