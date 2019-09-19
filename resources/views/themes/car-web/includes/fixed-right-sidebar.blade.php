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

        <div class="card hero-slider owl-carousel owl-theme">
            @foreach($premium as $car)
            <div class="slider-item" style="width: 120px; height: 67px; min-height: 67px;">
                <a href="{{ $car->id }}" target="_blank">
                    <img src="{{ (substr($car->metaValue('thumbnail'), 0, 4) !== 'http')?(App\Config::getStorage() . $car->metaValue('thumbnail')):$car->metaValue('thumbnail') }}">
                </a>
                <span id="figCaption">{{ $car->title }}</span>
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

<style>
.fixed-sidebar {
    width: 100%;
    padding-left: 100%;
    height: 0;
}
.sticky-content {
    width: 160px;
    padding: 0 20px;
    display: grid;
    grid-gap: 10px;
}

.fixed-sidebar .owl-stage {
    padding-left: 0px!important;
}
.fixed-sidebar .owl-dot {
    zoom: 0.6!important;
}
</style>