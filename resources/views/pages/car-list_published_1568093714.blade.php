@extends('themes.car-web.layouts.default')

@section('title')
Car dealer
@endsection

@section('load')
<link href="{{ asset('car-web/vendor/bootstrap-slider/css/bootstrap-slider.min.css') }}" rel="stylesheet">

@endsection

@section('content')

<div class="bg-page-header"></div>

@php
function metaHas($items, $key, $value) {
  return $items->whereHas('metas', function($query) use($key, $value) {
    $query->where('key', $key)->where('value', $value);
  });
}
function idize($value) {
  return str_replace(' ', '_', strtolower($value));
}
$categories = [
  'Car Type', 'Manufacturer', 'Color', 'Fuel', 'Transmission', 'Option', 'An accident', 'Passenger', 'Steering Wheel', 'Area'
  ];

$orderBy = request('orderBy', "updated_at");
$order = request('order', "desc");
$page = request('page', "1");
$itemsPerPage = request('itemsPerPage', "10");
$allItems = App\Content::with('metas')->where('type', App\Content::TYPE_CAR)->orderBy($orderBy, $order);
$items = $allItems;

$request = [];
$request['carCondition'] = request('carCondition', 'new');
$request['car_type'] = request('car_type', 'Sedan');
foreach($request as $key=>$value) {
  $items = metaHas($items, $key, $value);
}

//$items = metaHas($items, 'wheelPosition', 'left');
//{{ \\count(metaHas($allItems, 'Car Type', $taxonomy->term->name)->get()) }}

/*TODO
* Change idize function name
* Fix request parameters on top and left page-top-navbar
* Add Year slider
* Make taxonomy count iterable
*/

@endphp
<section class="section detail-page">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="left-bar-title">
          Search Vehicle <i class="fab fa fa-search"></i>
        </div>
          <div class="accordion shadow-soft-blue" id="accordionExample">
                @foreach($categories as $index=>$category)
                <div class="card">
                <div class="accordian-head" id="{{ $category }}">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#{{ idize($category) }}" aria-expanded="false" aria-controls="{{ idize($category) }}">
                        {{ $category }}<i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>

                <div id="{{ idize($category) }}" class="collapse {{ ($index==0)?'show':'' }}" aria-labelledby="{{ $category }}" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                    <form action="car-list">
                      @foreach(App\TermTaxonomy::where('taxonomy', $category)->get() as $taxonomy)
                      <div class="custom-control custom-radio">
                        <!-- <a href="/car-list?{{ idize($category) . '=' . $taxonomy->term->name }}" class="text-body text-decoration-none"> -->
                          <input type="radio" id="{{$taxonomy->term->name}}" name="{{ idize($category) }}" class="custom-control-input" value="{{ $taxonomy->term->name }}" {{ (isset($request[idize($category)]) && $request[idize($category)]==$taxonomy->term->name)?'checked':'' }} onchange="this.form.submit()">
                          <label class="custom-control-label  d-flex justify-content-between" for="{{$taxonomy->term->name}}">{{ $taxonomy->term->name }} 
                          <div class="text-muted">{{ $taxonomy->count }}</div></label>
                          <input type="hidden" name="carCondition" value="{{ $request['carCondition'] }}"/>
                      </div>
                      @endforeach
                      </form>
                  </div>
                </div>
              </div>
              @endforeach

              <div class="card">
                <div class="accordian-head" id="year-accordian">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#year" aria-expanded="false" aria-controls="year">
                        Year <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="year" class="collapse" aria-labelledby="year-accordian" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                      <span id="ex18-label-2a" class="d-none">Example low value</span>
                      <span id="ex18-label-2b" class="d-none">Example high value</span>
                      <input id="ex18b" type="text"/>
                  </div>
                </div>
              </div>
            </div>
      </div>
      <div class="col-md-9">
          <div class="card shadow-soft-blue page-top-navbar">
                <div class="d-flex justify-content-around">
                  <a class="{{ ($request['carCondition'] == 'new')?'active':'' }}" href="car-list?carCondition=new">Importation</a>
                  <a class="{{ ($request['carCondition'] == 'used')?'active':'' }}" href="car-list?carCondition=used">Used in Mongolia</a>
                </div>
            </div>
              <div class="container">
                <div class="row">
                    @if ($items->get() && sizeof($items->get()) != 0)
                      <div class="car-list">
                        @foreach($items->paginate($itemsPerPage) as $car)
                        <!-- card start -->
                        <div class="card">
                            <div class="card-body">
                                <div class="card-img">
                                    <img src="{{ $car->metaValue('thumbnail')?(App\Config::getStorage() . $car->metaValue('thumbnail')):'#' }}" class="img-fluid" alt="alt">
                                </div>
                                <div class="card-description">
                                    <div class="card-caption">
                                        <div class="card-title">{{ $car->title }}</div>
                                        <div class="meta">{{ $car->metaValue('buildYear') }}/{{ $car->metaValue('importDate') }} | {{ $car->metaValue('mileage') }}km</div>
                                        <div class="price">{{ $car->metaValue('price') }} ₮</div>
                                        <div class="favorite">
                                        <i class="icon-heart"></i> Add to interest list
                                        </div>
                                    </div>
                                <div class="info">
                                    <span class="carIcon-engine">
                                        <p>{{ $car->metaValue('displacement') }} L</p>
                                    </span>
                                    <span class="carIcon-car-6">
                                        <p>{{ $car->metaValue('mileage') }} KM</p>
                                    </span>
                                    <span class="carIcon-gas-station">
                                        <p>{{ $car->metaValue('fuelType') }} </p>
                                    </span>
                                    <span class="carIcon-gearshift">
                                        <p>{{ $car->metaValue('transmission') }}</p>
                                    </span>
                                    <span class="carIcon-steering-wheel">
                                        <p>{{ $car->metaValue('wheelPosition') }} wheel</p>
                                    </span>
                                    <span class="color" data-color="black">
                                        <p>{{ $car->metaValue('colorName') }}</p>
                                    </span>

                                    <div class="tag">
                                        @foreach($car->metas->where('key', 'advantages') as $advantage)
                                            <a href="#">{{ $advantage->value }}</a>
                                        @endforeach
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- card end -->
                        @endforeach
                    </div>   
                    @else
                    <div class="text-center text-muted col-lg-12 mt-3"><p>No results found</p></div>
                    @endif
              </div>
            </div>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination d-flex justify-content-end">
                  <li class="page-item {{ ($page <= 1)?'disabled':'' }}">
                      <a class="page-link" href="car-list?page={{$page-1}}" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                  </li>
                  @for($i = 1; $i <= $items->paginate($itemsPerPage)->lastPage(); $i++)
                  <li class="page-item {{ ($i == $page)?'active':'' }}"><a class="page-link" href="car-list?page={{$i}}">{{ $i }}</a></li>
                  @endfor
                  <li class="page-item {{ ($page >= $items->paginate($itemsPerPage)->lastPage())?'disabled':'' }}">
                        <a class="page-link" href="car-list?page={{$page+1}}" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                  </li>
                </ul>
              </nav>
            <!-- Pagination end -->
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script src="{{ asset('car-web/vendor/bootstrap-slider/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('car-web/vendor/owl.carousel.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
@endsection

