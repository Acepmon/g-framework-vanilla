@if($car)
<a class="card {{ (isset($auction) && $auction)?'auction-car':'' }}" href="{{ $car->slug }}">
<div class="card-body">
        <div class="card-img">
            @if(isPremium($car))
            <div class="premium-tag shadow-soft-blue"><img src="{{ asset('car-web/img/icons/corona.svg') }}" alt=""></div>
            @endif
            @if(isset($auction) && $auction && $car->metaValue('isAuction'))
            <div class="maz-auction-time">
                <div id="countdown" class="countdown" data-countdown="{{ $car->metaValue('endsAt') }}"></div>
                <!-- may 5, 2020 15:37:25 -->
            </div>
            @endif
            <img src="{{ (substr($car->metaValue('thumbnail'), 0, 4) !== 'http')?(App\Config::getStorage() . $car->metaValue('thumbnail')):$car->metaValue('thumbnail') }}" class="img-fluid" alt="alt">
        </div>
        <div class="card-description">
            <div class="card-caption">
                <div class="card-title">{{ (strlen($car->title) > 40)?substr($car->title, 0, 37) . '...':$car->title }}</div>
                <div class="meta">{{ $car->metaValue('buildYear') }}/{{ $car->metaValue('importDate') }} | {{ $car->metaValue('mileage') }}km</div>
                <div class="price">{{ numerizePrice($car->metaValue('priceAmount')) }} {{ $car->metaValue('priceUnit') }}</div>
                @if(count(metaHas(Auth::user(), 'interestedCars', $car->id)->get()) > 0)
                <div class="favorite" onclick="addToInterest(event, {{$car->id}})">
                    <span class="text-danger"><i class="fas fa-heart"></i> Added to interest list</span>
                </div>
                @else
                <div class="favorite" onclick="addToInterest(event, {{$car->id}})">
                    <span class=""><i class="far fa-heart"></i> Add to interest list</span>
                </div>
                @endif
            </div>
            <div class="info">
                <span class="info-icon">
                    <img src="{{ asset('car-web/img/icons/engine.svg') }}" alt="">
                    <p>{{ ucfirst($car->metaValue('capacityAmount')) . ' ' . strtoupper($car->metaValue('capacityUnit')) }}</p>
                </span>
                <span class="info-icon">
                    <img src="{{ asset('car-web/img/icons/wheel.svg') }}" alt="">
                    <p>{{ ucfirst($car->metaValue('wheelPosition')) }}</p>
                </span>
                <span class="info-icon">
                    <img src="{{ asset('car-web/img/icons/gearShift.svg') }}" alt="">
                    <p>{{ ucfirst($car->metaValue('transmission')) }}</p>
                </span>
                <span class="info-icon">
                    <img src="{{ asset('car-web/img/icons/fuel.svg') }}" alt="">
                    <p>{{ ucfirst($car->metaValue('fuelType')) }} </p>
                </span>
                <span class="info-icon">
                    <img src="{{ asset('car-web/img/icons/transmision.svg') }}" alt="">
                    <p>{{ $car->metaValue('axleCount') }} WD</p>
                </span>
                <span class="info-icon color" data-color="{{ strtolower($car->metaValue('colorName')) }}">
                    <p>{{ ucfirst($car->metaValue('colorName')) }}</p>
                </span>

                <div class="tag">
                    @foreach($car->metas->where('key', 'advantages') as $advantage)
                    <div onclick="event.preventDefault(); formSubmit('advantage', '{{$advantage->value}}')">{{ $advantage->value }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</a>
@endif
