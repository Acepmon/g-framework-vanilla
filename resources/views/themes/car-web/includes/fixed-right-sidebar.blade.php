<div class="fixed-sidebar sticky-top">
    <div class="sticky-content">
        <div class="card">
            <a href="{{ url('wishlist') }}">
                <img src="{{ asset('car-web/img/bg-showcase-2.jpg') }}" style="width: 120px"/>
            </a>
        </div>
        <div class="card">
            <a href="{{ config('car.appStoreLink') }}" target="_blank">
                <img src="{{ asset('car-web/img/store_app.png') }}" style="width: 120px"/>
            </a>
            <a href="{{ config('car.playStoreLink') }}" target="_blank">
                <img src="{{ asset('car-web/img/store_play.png') }}" style="width: 120px; padding-top: 1px"/>
            </a>
        </div>

        <div class="card sidebar-slider owl-carousel owl-theme">
            @foreach($premium as $car)
            <div class="slider-item">
                <a href="{{ $car->slug }}" target="_blank" class="text-decoration-none text-dark">
                    <img class="img-fluid" src="{{ (substr($car->metaValue('thumbnail'), 0, 4) !== 'http')?(App\Config::getStorage() . $car->metaValue('thumbnail')):$car->metaValue('thumbnail') }}">
                    <div class="p-2 font-weight-bold">{{ $car->title }}</div>
                </a>
            </div>
            @endforeach
        </div>

        @foreach($sideBanners as $bnr)
        <a href="{{ $bnr->link }}" target="_blank">
            <img src="{{ $bnr->banner }}">
        </a>
        @endforeach
    </div>
</div>
