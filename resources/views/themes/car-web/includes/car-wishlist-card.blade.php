@if($car)
<div class="card">
    <div class="card-header wish-title bg-dark text-white font-weight-bold rounded-top">
        
        <div id="tooltip" title="{{$car->title}}"><span class=font-size-lg>"</span> {{$car->title}}</div>
    </div>
    <div class="wish-detail text-black rounded-bottom border pl-4 pr-4"
        style="background-color: #f8f9fa">
        <div class="wl-detail-row mt-2">
            <i class="icon-tag mr-4"></i>{{ numerizePrice($car->metaValue('priceAmountStart')) }} {{ $car->metaValue('priceUnit') }}
        </div>
        <div class="wl-detail-row">
            <i class="icon-phone mr-4"></i>{{ str_limit($car->author->metaValue('phone'), 9) }}
            <button class="btn btn-sm btn-outline-dark float-right" type="button">Watch</button>
        </div>
        <div class="wl-detail-row mt-2">
            <img src="{{asset('car-web/img/Cars/4.jpg')}}"
                class="rounded-circle float-left mr-2 mt-2" width="32px" height="32"
                style="width: 32px" alt="alt">
            <p class="">Enkhtuvshin
                <br>
                <span>2019-03-01</span>
            </p>
        </div>
    </div>
</div>
@endif