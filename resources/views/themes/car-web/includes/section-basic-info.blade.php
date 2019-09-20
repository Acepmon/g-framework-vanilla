@if ($content)
<section class="detail-items bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="detail-basic-information">
                    <div class="detail-section-title">Basic information</div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="title">Overall</div>
                            <div class="info-list">
                                <ul>
                                    @if ($content->metaValue('type'))
                                        <li><i class="carIcon-car-3"></i>{{ $content->metaValue('type') }} </li>
                                    @endif

                                    @if ($content->metaValue('colorNameInterior'))
                                        <li><span class="color" data-color="white"></span> {{ $content->metaValue('colorNameInterior') }} (Interior)</li>
                                    @endif

                                    @if ($content->metaValue('manCount'))
                                        <li><i class="carIcon-seat-belt"></i>{{ $content->metaValue('manCount') }} (Passenger) </li>
                                    @endif

                                    @if ($content->metaValue('colorNameExterior'))
                                        <li><span class="color" data-color="black"></span>{{ $content->metaValue('colorNameExterior') }} (Exterior)</li>
                                    @endif

                                    @if ($content->metaValue('doorCount'))
                                        <li><i class="carIcon-car"></i>{{ $content->metaValue('doorCount') }} (door) </li>
                                    @endif

                                    @if ($content->metaValue('cabinNumber'))
                                        <li><i class="fab fa fa-barcode"></i>{{ $content->metaValue('cabinNumber') }} </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title">Power</div>
                            <div class="info-list">
                                <ul>
                                    @if ($content->metaValue('engine'))
                                        <li><i class="carIcon-engine"></i>{{ $content->metaValue('engine') }}</li>
                                    @endif
                                    @if ($content->metaValue('fuelType'))
                                        <li><i class="carIcon-gas-station"></i>{{ $content->metaValue('fuelType') }}</li>
                                    @endif

                                    @if ($content->metaValue('transmission'))
                                        <li><i class="carIcon-gearshift"></i>{{ $content->metaValue('transmission') }}</li>
                                    @endif

                                    @if ($content->metaValue('wheelPosition'))
                                        <li><i class="carIcon-steering-wheel"></i>{{ $content->metaValue('wheelPosition') }} wheel</li>
                                    @endif

                                    @if ($content->metaValue('chassis'))
                                        <li><i class="carIcon-chassis"></i>{{ $content->metaValue('chassis') }}</li>
                                    @endif

                                    @if ($content->metaValue('speedLimit'))
                                        <li><i class="carIcon-dashboard"></i>{{ $content->metaValue('speedLimit') }} (Speed limit) </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
