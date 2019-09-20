@if($car)
<div class="card">
    <div class="card-body">
        <div class="card-img">
            <a href="{{ $car->slug }}">
                <img src="{{ (substr($car->metaValue('thumbnail'), 0, 4) !== 'http')?(App\Config::getStorage() . $car->metaValue('thumbnail')):$car->metaValue('thumbnail') }}" class="img-fluid" alt="alt">
            </a>
            @if($car->metaValue('premium'))
            <div class="bestDeal"
                    style="position: absolute; top:5px; left: 5px; background-color: white; border-radius: 3px; padding: 1px 3px">
                <i class="fas fa-crown" style="color: #FEC400"></i>
            </div>
            @endif
        </div>
        <div class="card-description">
            <div class="card-caption">
                <div class="card-title"><a href="{{ $car->slug }}" style="color: inherit">{{ $car->title }}</a></div>
                <div class="meta">{{ $car->metaValue('buildYear') }}/{{ $car->metaValue('importDate') }} | {{ $car->metaValue('mileage') }}km</div>
                <div class="price">{{ $car->metaValue('price') }} ₮</div>
                <div class="favorite">
                    <i class="icon-heart"></i> Add to interest list
                </div>
            </div>
            <div class="info">
                <span class="carIcon-engine">
                    <p>{{ ucfirst($car->metaValue('capacity')) }}</p>
                </span>
                <span class="carIcon-steering-wheel">
                    <p>{{ ucfirst($car->metaValue('wheelPosition')) }} wheel</p>
                </span>
                <span class="carIcon-gearshift">
                    <p>{{ ucfirst($car->metaValue('transmission')) }}</p>
                </span>
                <span class="carIcon-gas-station">
                    <p>{{ ucfirst($car->metaValue('fuelType')) }} </p>
                </span>
                <span class="carIcon-car-6">
                    <p>{{ $car->metaValue('axleCount') }} WD</p>
                </span>
                <span class="color" data-color="{{ $car->metaValue('colorName') }}">
                    <p>{{ ucfirst($car->metaValue('colorName')) }}</p>
                </span>

                <div class="tag">
                    @foreach($car->metas->where('key', 'advantages') as $advantage)
                    <a onclick="formSubmit('advantage', '{{$advantage->value}}')" href="#">{{ $advantage->value }}</a>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</div>
@endif