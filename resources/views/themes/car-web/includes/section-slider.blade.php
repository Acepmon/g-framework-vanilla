@if($contents)
@php
if(!function_exists('numerizePrice')) {
    function numerizePrice($value) {
        $value /= 1000000;
        return $value . 'сая';
    }
}
@endphp
<section class="section card-list my-5">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>{{ $title }}</h2>
                <span>
                    <a href="{{ $morelink }}">See all ({{ count($contents) }}) <i class="fab fa fa-angle-right"></i></a>
                </span>
            </div>
            <div class="card-slide owl-carousel owl-theme">
                @foreach($contents as $car)
                <div class="card cd-box">
                    @if($car->metaValue('publishType') == 'best_premium' || $car->metaValue('publishType') == 'premium')
                    <div class="premium-tag shadow-soft-blue"><img src="{{ asset('car-web/img/icons/corona.svg') }}" alt=""></div>
                    @endif
                    <div class="card-img">
                        <img src="{{ (substr($car->metaValue('thumbnail'), 0, 4) !== 'http')?(App\Config::getStorage() . $car->metaValue('thumbnail')):$car->metaValue('thumbnail') }}" class="img-fluid" alt="alt">

                        <div class="card-caption">
                            <div class="meta">{{ $car->metaValue('mileage') }}km | {{ ucfirst($car->metaValue('fuelType')) }} | {{ $car->metaValue('capacityAmount') }} {{ $car->metaValue('capacityUnit') }}</div>
                            <div class="favorite">
                                <i class="icon-heart"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-2">
                        <div class="card-description">
                            <div class="card-desc-top">
                                <a href="{{ $car->slug }}" class="card-title">{{ $car->title }}</a>
                                <div class="price" style="min-width: 35%">{{ numerizePrice($car->metaValue('priceAmount')) }} {{ $car->metaValue('priceUnit') }}</div>
                            </div>

                            <div class="card-meta">
                                <div class="year">{{ $car->metaValue('buildYear') }}/{{ $car->metaValue('importDate') }}</div>
                            </div>
                            <div class="status">{{ ucfirst($car->metaValue('priceType')) }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
.card-list .owl-stage {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;

    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.card-list .owl-item {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    height: auto !important;
}
</style>
@endif