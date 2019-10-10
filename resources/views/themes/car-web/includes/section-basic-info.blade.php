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
                                            <li>
                                                <span class="info-icon">
                                                    <img src="{{ asset('car-web/img/icons/sedan.svg') }}" alt="">
                                                    <p>{{ $content->metaValue('type') }}</p>
                                                </span>
                                            </li>
                                        @endif

                                        @if ($content->metaValue('manCount'))
                                            <li>
                                                <span class="info-icon">
                                                    <img src="{{ asset('car-web/img/icons/passenger.svg') }}" alt="">
                                                    <p>{{ $content->metaValue('manCount') }} (passenger)</p>
                                                </span>
                                            </li>
                                        @endif

                                        @if ($content->metaValue('doorCount'))
                                            <li>
                                                <span class="info-icon">
                                                    <img src="{{ asset('car-web/img/icons/door.svg') }}" alt="">
                                                    <p>{{ $content->metaValue('doorCount') }} (Door)</p>
                                                </span>
                                            </li>
                                        @endif

                                        @if ($content->metaValue('colorNameInterior'))
                                            <li>
                                                <span class="color info-icon" data-color="white">
                                                    <p>{{ $content->metaValue('colorNameInterior') }} (Interior)</p>
                                                </span>
                                            </li>
                                        @endif

                                        @if ($content->metaValue('colorNameExterior'))
                                            <li>
                                                <span class="color info-icon" data-color="black">
                                                    <p>{{ $content->metaValue('colorNameExterior') }} (Exterior)</p>
                                                </span>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="title">Power</div>
                                <div class="info-list">
                                    <ul>
                                        @if ($content->metaValue('engine'))
                                            <li>
                                                <span class="info-icon">
                                                    <img src="{{ asset('car-web/img/icons/engine.svg') }}" alt="">
                                                    <p>{{ $content->metaValue('engine') }}</p>
                                                </span>
                                            </li>
                                        @endif

                                        @if ($content->metaValue('wheelPosition'))
                                            <li>
                                                <span class="info-icon">
                                                    <img src="{{ asset('car-web/img/icons/wheel.svg') }}" alt="">
                                                    <p>{{ $content->metaValue('wheelPosition') }} wheel</p>
                                                </span>
                                            </li>
                                        @endif

                                        @if ($content->metaValue('transmission'))
                                            <li>
                                                <span class="info-icon">
                                                    <img src="{{ asset('car-web/img/icons/gearShift.svg') }}" alt="">
                                                    <p>{{ $content->metaValue('transmission') }}</p>
                                                </span>
                                            </li>
                                        @endif

                                        @if ($content->metaValue('fuelType'))
                                            <li>
                                                <span class="info-icon">
                                                    <img src="{{ asset('car-web/img/icons/fuel.svg') }}" alt="">
                                                    <p>{{ $content->metaValue('fuelType') }}</p>
                                                </span>
                                            </li>
                                        @endif

                                        @if ($content->metaValue('chassis'))
                                            <li>
                                                <span class="info-icon">
                                                    <img src="{{ asset('car-web/img/icons/transmission.svg') }}" alt="">
                                                    <p>{{ $content->metaValue('chassis') }}</p>
                                                </span>
                                            </li>
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
