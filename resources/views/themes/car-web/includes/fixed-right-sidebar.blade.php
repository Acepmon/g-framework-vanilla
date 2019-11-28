<div class="fixed-sidebar sticky-top">
    <div class="sticky-content" style="width: 120px">
        <div class="card">
            <div class="wish-list text-center">
                @auth
                    <!-- <a data-toggle="modal" href="#modalAddWishlist"> --><a href="/wishlist">
                        <span class="badge badge-danger rounded float-right">шинэ</span>
                        <div id="wish-animation"> </div>
                        <h5>Хүслийн <br>жагсаалт</h5>
                    </a>
                @else
                    <!-- <a href="{{ route('login') }}"> --><a href="/wishlist">
                        <span class="badge badge-danger rounded float-right">шинэ</span>
                        <div id="wish-animation"> </div>
                        <h5>Хүслийн <br>жагсаалт</h5>
                    </a>
                @endauth
            </div>
            <script>
                    var animation = bodymovin.loadAnimation({
                        container: document.getElementById('wish-animation'),
                        renderer: 'svg',
                        loop: true,
                        rendererSettings: {
                            progressiveLoad: true
                        },
                        autoplay: true,
                        path: '{{ asset("car-web/img/wish.json")}}'
                    });
                </script>
        </div>
        <div class="border-0">
            <a href="{{ config('car.appStoreLink') }}" target="_blank">
                <img src="{{ asset('car-web/img/store_app.png') }}"/>
            </a>
            <a href="{{ config('car.playStoreLink') }}" target="_blank">
                <img src="{{ asset('car-web/img/store_play.png') }}" style="padding-top: 2px"/>
            </a>
        </div>

        {{--
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
        --}}

        @foreach($sideBanners as $bnr)
        <a href="{{ $bnr->link }}" target="_blank">
            <img src="{{ $bnr->banner }}">
        </a>
        @endforeach
    </div>
</div>
