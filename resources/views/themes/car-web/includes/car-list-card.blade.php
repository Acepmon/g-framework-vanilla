@if($car)
<div class="card" onclick="window.open('{{ $car->slug }}','_blank');" style="cursor: pointer">
    <div class="card-body">
        <div class="card-img">
            @if($car->metaValue('publishType') == 'best_premium' || $car->metaValue('publishType') == 'premium')
            <div class="premium-tag shadow-soft-blue"><img src="{{ asset('car-web/img/icons/corona.svg') }}" alt=""></div>
            @endif
            <a href="{{ $car->slug }}">
                <img src="{{ (substr($car->metaValue('thumbnail'), 0, 4) !== 'http')?(App\Config::getStorage() . $car->metaValue('thumbnail')):$car->metaValue('thumbnail') }}" class="img-fluid" alt="alt">
            </a>
        </div>
        <div class="card-description">
            <div class="card-caption">
                <div class="card-title"><a href="{{ $car->slug }}" style="color: inherit">{{ $car->title }}</a></div>
                <div class="meta">{{ $car->metaValue('buildYear') }}/{{ $car->metaValue('importDate') }} | {{ $car->metaValue('mileage') }}km</div>
                <div class="price">{{ $car->metaValue('price') }} ₮</div>
                @if($car->metaValue('interset'))
                <div class="favorite" onclick="addToInterest(event, '{{$car->slug}}')">
                    <span class="text-danger"><i class="fas fa-heart"></i> Added to interest list</span>
                </div>
                @else
                <div class="favorite" onclick="addToInterest(event, '{{$car->slug}}')">
                    <span class=""><i class="far fa-heart"></i> Add to interest list</span>
                </div>
                @endif
            </div>
            <div class="info">
                <span class="info-icon">
                    <img src="{{ asset('car-web/img/icons/engine.svg') }}" alt="">
                    <p>{{ ucfirst($car->metaValue('capacity')) }}</p>
                </span>
                <span class="info-icon">
                    <img src="{{ asset('car-web/img/icons/wheel.svg') }}" alt="">
                    <p>{{ ucfirst($car->metaValue('wheelPosition')) }} wheel</p>
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
                <span class="info-icon color" data-color="{{ $car->metaValue('colorName') }}">
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
