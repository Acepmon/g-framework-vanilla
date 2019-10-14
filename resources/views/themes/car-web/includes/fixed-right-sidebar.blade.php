<div class="fixed-sidebar sticky-top">
    <div class="sticky-content">
        <div class="card">
            <a href="#">
                <img src="{{ asset('car-web/img/bg-showcase-2.jpg') }}" style="width: 120px"/>
            </a>
        </div>
        <div class="card">
            <a href="#" target="_blank">
                <img src="{{ asset('car-web/img/store_app.png') }}" style="width: 120px"/>
            </a>
            <a href="#" target="_blank">
                <img src="{{ asset('car-web/img/store_play.png') }}" style="width: 120px; padding-top: 1px"/>
            </a>
        </div>

        <div class="card sidebar-slider owl-carousel owl-theme">
            @foreach($premium as $car)
            <div class="slider-item">
                <a href="{{ $car->id }}" target="_blank" class="text-decoration-none text-dark">
                    <img src="{{ (substr($car->metaValue('thumbnail'), 0, 4) !== 'http')?(App\Config::getStorage() . $car->metaValue('thumbnail')):$car->metaValue('thumbnail') }}">
                    <span>{{ $car->title }}</span>
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
