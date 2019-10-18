@php

// Get All items
$orderBy = request('orderBy', "updated_at");
$order = request('order', "desc");
$page = request('page', "1");
$itemsPerPage = request('itemsPerPage', "15");

$premium = \Modules\Car\Entities\Car::filterByPremium(Null, clone $allItems);
$filterPremium = request('premium', False);
if ($filterPremium) {
  $allItems = clone $premium;
}

$allItems = \Modules\Car\Entities\Car::order($orderBy, $order, $allItems);

// Items filtering
$items = \Modules\Car\Entities\Car::filter(clone $allItems, $request);
if (!$filterPremium) {
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
.detail-page .car-list .card-img .img-fluid {
  min-height: 100%;
  object-fit: cover;
}
</style>
@endpush

<div class="row">
    <div class="card shadow-soft-blue page-top-navbar">
    <div class="d-flex justify-content-start">
        <span class="total-cars">{{ count($items) }} VEHICLES</span>
        <input type="hidden" name="orderBy" id="orderBy" value="{{ $orderBy }}" />
        <input type="hidden" name="premium" id="premium" value="{{ $filterPremium }}" />

        <div class="sort-cars">
        <ul>
            <li class="{{ ($orderBy=='updated_at')?'active':'' }}"><a href="#" onclick="formSubmit('orderBy', 'updated_at')">Recent cars</a></li>
            <li class="{{ ($orderBy=='buildYear')?'active':'' }}"><a href="#" onclick="formSubmit('orderBy', 'buildYear')">Product year</a></li>
            <li class="{{ ($orderBy=='importDate')?'active':'' }}"><a href="#" onclick="formSubmit('orderBy', 'importDate')">Income year</a></li>
            <li class="{{ ($orderBy=='priceAmount')?'active':'' }}"><a href="#" onclick="formSubmit('orderBy', 'priceAmount')">Low price</a></li>
        </ul>
        </div>
    </div>
    </div>
    @if ($items->all() && sizeof($items->all()) != 0)
    <div class="car-list {{ (isset($auction) && $auction)?'auction-list':'' }}">
    <input type="hidden" name="advantage" id="advantage" value="{{ $request['advantages'] }}" />
    @if (isset($auction) && $auction)
        @foreach($items->forPage($page, $itemsPerPage) as $car)
            @include('themes.car-web.includes.car-list-card', array('car'=>$car, 'auction'=>True))
        @endforeach
    @else
        @foreach($items->forPage($page, $itemsPerPage) as $car)
            @include('themes.car-web.includes.car-list-card', array('car'=>$car))
        @endforeach
    @endif
    </div>
    @else
    <div class="text-center text-muted col-lg-12 mt-3">
    <p>No results found</p>
    </div>
    @endif
</div>

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