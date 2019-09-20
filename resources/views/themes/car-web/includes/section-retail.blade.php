@if ($content)
<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="detail-option-information py-5">
                    <div class="detail-section-title">Retail store</div>
                    <div class="row">
                        <div class="col-md-5">
                            <img src="{{ $content->metaValue('retailImage') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-7">
                            <div class="retail-information">
                                <div class="d-flex justify-content-between retail-head py-2">
                                <div class="retail-name">{{ $content->metaValue('retailName') }}</div>
                                <!-- <div class="retail-phone">999999999</div> -->
                            </div>
                            <div class="row py-2">
                                <div class="col-md-4 font-weight-bold">Retail address</div>
                                <div class="col-md-8">{{ $content->metaValue('retailAddress') }}</div>
                            </div>
                            <!--
                            <div class="row py-2">
                                <div class="col-md-4 font-weight-bold">open hours</div>
                                <div class="col-md-8">Monday to Saturday 9:00am to 18:00 pm Lunch 12:00 to 13:00</div>
                            </div>
                            -->
                            <div class="row py-2">
                                <div class="col-md-4 font-weight-bold">Mobile Number</div>
                                <div class="col-md-8">{{ $content->metaValue('retailPhone') }}</div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-4 font-weight-bold">All Vehicles</div>
                                <div class="col-md-8">{{ $content->metaValue('retailVehicles') }} vehicles</div>
                            </div>
                            <div class="row py-2">
                                <div class="col-md-4 font-weight-bold">Website</div>
                                <div class="col-md-8">{{ $content->metaValue('retailWebsite') }}</div>
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
