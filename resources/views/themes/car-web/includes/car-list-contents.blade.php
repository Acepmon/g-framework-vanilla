@php

// Get All items
$orderBy = request('orderBy', "updated_at");
$order = request('order', "desc");
$page = request('page', "1");
$itemsPerPage = request('itemsPerPage', "15");

$premium = \Modules\Car\Entities\Car::filterByPremium(Null, clone $allItems);
$publishType = request('publishType', Null);
if ($publishType) {
  $allItems = \Modules\Car\Entities\Car::filterByPremium(Null, clone $allItems, $publishType);
}

// $allItems = \Modules\Car\Entities\Car::order($orderBy, $order, $allItems);
if($type == 'search'){
    // Search
    $search = request('search', "");
    $allItems = $allItems->where('title', 'LIKE', '%'.$search.'%');
}

// Items filtering
$items = \Modules\Car\Entities\Car::filter(clone $allItems, $request);
$items = \Modules\Car\Entities\Car::order($orderBy, $order, $items);
if (!$publishType) {
  $items = \Modules\Car\Entities\Car::filterByPremium(null, clone $items)->get()->merge($items->get());
} else {
  $items = $items->get();
}

// Post items filtering
$itemCount = count($items->all());
$maxPage = intval(ceil($itemCount / $itemsPerPage));
if ($itemCount < $page * $itemsPerPage) {
  $page = $maxPage;
}

@endphp

@push('styles')
<style>
.car-list .card-img .img-fluid {
  min-height: 100%;
  object-fit: cover;
}
</style>
@endpush

@include('themes.car-web.includes.car-list-menu')
</div>

@php
@endphp

<div class="col-lg-9 col-md-8">
<div class="card shadow-soft-blue page-top-navbar">
    @if($type == 'search')
        <div class="card-body">
            <span class="d-flex justify-content-start font-weight-bold mb-2">
                Search result
            </span>
            <div class="input-group">
                <span class="input-group-prepend">
                    <div class="form-control bg-transparent"><i class="fa fa-search"></i></div>
                </span>
                <input name="search" type="text" class="form-control border-left-0" placeholder="Enter search text" value="{{ $search }}">
            </div>
            <button type="submit" hidden>Search</button>
        </div>
    @endif
    <div class="d-flex justify-content-start">
        <span class="total-cars">Нийт {{ count($items) }}</span>
        <input type="hidden" name="orderBy" id="orderBy" value="{{ $orderBy }}" />
        <input type="hidden" name="publishType" id="publishType" value="{{ $request['publishType'] }}" />

    <div class="sort-cars">
    <ul>
        <li class="{{ ($orderBy=='updated_at')?'active':'' }}"><a href="#" onclick="formSubmit('orderBy', 'updated_at')">Сүүлд нийтлэгдсэн</a></li>
        <li class="{{ ($orderBy=='buildYear')?'active':'' }}"><a href="#" onclick="formSubmit('orderBy', 'buildYear')">Үйлдвэрлэгдсэн он</a></li>
        <li class="{{ ($orderBy=='importDate')?'active':'' }}"><a href="#" onclick="formSubmit('orderBy', 'importDate')">Орж ирсэн он</a></li>
        <li class="{{ ($orderBy=='priceAmount')?'active':'' }}"><a href="#" onclick="formSubmit('orderBy', 'priceAmount')">Хямд үнэ</a></li>
    </ul>
    </div>
</div>
</div>
@if ($items->all() && sizeof($items->all()) != 0)
<div class="car-list {{ ($type == 'auction')?'auction-list':'' }}">
<input type="hidden" name="advantage" id="advantage" value="{{ $request['advantages'] }}" />
@if ($type == 'auction')
    @foreach($items->forPage($page, $itemsPerPage) as $car)
        @include('themes.car-web.includes.car-list-card', array('car'=>$car, 'type'=>'auction'))
    @endforeach
@else
    @foreach($items->forPage($page, $itemsPerPage) as $car)
        @include('themes.car-web.includes.car-list-card', array('car'=>$car))
    @endforeach
@endif
</div>
@else
<div class="text-center text-muted col-lg-12 mt-3">
<p>Үр дүн олдсонгүй</p>
</div>
@endif

@if ($items->all() && sizeof($items->all()) != 0)
<!-- Pagination -->
<nav aria-label="Page navigation">
    <input type="hidden" value="{{ max($page, 1) }}" name="page" id="page" />
    <ul class="pagination d-flex justify-content-end">
    <li class="page-item {{ ($page <= 1)?'disabled':'' }}">
        <button class="page-link" onclick="formSubmit('page', {{$page-1}})" aria-label="Previous">
        <span aria-hidden="true"><i class="fab fa fa-angle-left"></i></span>
        </button>
    </li>
    @for($i = 1; $i <= $maxPage; $i++)
        <li class="page-item {{ ($i == $page)?'active':'' }}"><button class="page-link" onclick="formSubmit('page', {{$i}})">{{ $i }}</button></li>
        @endfor
        <li class="page-item {{ ($page >= $maxPage)?'disabled':'' }}">
        <button class="page-link" onclick="formSubmit('page', {{$page+1}})" aria-label="Next">
            <span aria-hidden="true"><i class="fab fa fa-angle-right"></i></span>
        </button>
        </li>
    </ul>
</nav>
<!-- Pagination end -->
@endif

@push('scripts')
<script>
function addToInterest(event, value) {
    event.preventDefault();
    event.stopPropagation();
    var target = event.target.closest('div');
    // target.innerHTML = 'Loading';
    $.ajax({
      url: '/ajax/user/interested_cars', 
      dataType: 'json',
      method: 'PUT',
      data: {
          'content_id': value
      },
      success: function (data) {
        if (data.status == 'added') {
          target.innerHTML = '<span class="text-danger"><i class="fas fa-heart"></i> Жагсаалтанд нэмэгдсэн</span>';
        } else if (data.status == 'removed') {
          target.innerHTML = '<span class=""><i class="far fa-heart"></i> Жагсаалтанд нэмэх</span>';
        }
      },
      error: function (error) {
        if (error.status == 401) {
          window.location.href = "{{ url('/login') }}";
        }
      }
    });
}
</script>
@endpush