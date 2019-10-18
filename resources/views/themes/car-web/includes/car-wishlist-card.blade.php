@if($car)
<div class="card cd-box">
    <div class="card-top">
        <h2 class="title" id="tooltip" title="{{$car->title}}">{{$car->title}}</h1>
    </div>
    <div class="card-body py-2">
        <div class="wish-detail">
        <div class="price"><i class="icon-tag"></i> {{ numerizePrice($car->metaValue('priceAmountStart')) }} {{ $car->metaValue('priceUnit') }}</div>
        <div class="phone">
            <i class="icon-phone"></i> <span id="phone{{$car->id}}">{{ str_limit($car->author->metaValue('phone'), 9) }}</span>
        <button id="watchBtn{{$car->id}}" class="btn btn-sm btn-outline-dark float-right" type="button" onclick="watchPhone('{{$car->id}}', '{{$car->author->metaValue('phone')}}')">Watch</button>
        </div>
        </div>
        <div class="wish-user">
        <div class="profile-img"><img src="{{asset('car-web/img/blog/4.jpg')}}" alt=""></div>
        <div class="username">Enkhtuvshin <div class="date">2019-09-20</div>
        </div>

        </div>
    </div>
</div>
@endif