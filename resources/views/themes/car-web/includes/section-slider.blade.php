@if($contents)
<section class="mainPage-items bg-white">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>{{ $title }}</h2>
                <span>
                    <a href="{{ $morelink }}">See all ({{ count($contents) }}) <i class="fab fa fa-angle-right"></i></a>
                </span>
            </div>
        </div>
    </div>
    <div class="card-list usedInMn">
        <div class="container">
            <div class="row">
                <div class="card-slide owl-carousel owl-theme">
                    @foreach($contents as $car)
                    <!-- card start -->
                    <div class="card cd-box auto-height">
                        @if($car->metaValue('premium'))
                        <div class="premium-tag shadow-soft-blue"><img src="{{ asset('car-web/img/icons/corona.svg') }}" alt=""></div>
                        @endif
                        <div class="brand-name"></div>
                        <div class="card-img">
                            <img src="{{ (substr($car->metaValue('thumbnail'), 0, 4) !== 'http')?(App\Config::getStorage() . $car->metaValue('thumbnail')):$car->metaValue('thumbnail') }}" class="img-fluid" alt="alt">

                            <div class="info">
                                <span class="carIcon-engine">
                                    <p>{{ ucfirst($car->metaValue('displacement')) }} L</p>
                                </span>
                                <span class="carIcon-car-6">
                                    <p>{{ $car->metaValue('mileage') }} KM</p>
                                </span>
                                <span class="carIcon-gas-station">
                                    <p>{{ ucfirst($car->metaValue('fuelType')) }}</p>
                                </span>
                                <span class="carIcon-gearshift">
                                    <p>{{ ucfirst($car->metaValue('transmission')) }}</p>
                                </span>
                                <span class="carIcon-steering-wheel">
                                    <p>{{ ucfirst($car->metaValue('wheelPosition')) }} wheel</p>
                                </span>
                                <span class="color" data-color="white">
                                    <p>{{ ucfirst($car->metaValue('colorName')) }}</p>
                                </span>
                            </div>
                            <div class="card-caption">
                                <div class="meta">
                                    {{ $car->metaValue('buildYear') }}/{{ $car->metaValue('importDate') }} | {{ $car->metaValue('mileage') }}km | {{ ucfirst($car->metaValue('fuelType')) }}
                                </div>
                                <div class="favorite">
                                    <i class="icon-heart"></i>
                                </div>
                            </div>
                        </div>

                        <div class="card-body shadow">
                            <div class="card-description">
                                <div class="card-title">
                                    <a href="{{ $car->slug }}" class="text-decoration-none text-dark">{{ $car->title }}</a>
                                </div>
                                <div class="card-meta">
                                    <div class="status">{{ ucfirst($car->metaValue('priceType')) }} </div>
                                    <div class="price">{{ $car->metaValue('price') }} ₮</div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- card end -->
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<style>
.owl-stage {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;

    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.owl-item{
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    height: auto !important;
}
</style>
@endif