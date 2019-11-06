@php
$categorySlug = [
'car-type', 'car-manufacturer', 'car-year', 'car-distance-driven', 'car-price', 'car-colors', 'car-fuel', 'car-transmission', 'car-options', 'car-accident', 'car-mancount', 'car-wheel-pos', 'provinces'
];
$categoryName = [
'Car Type', 'Manufacturer/Model', 'Year', 'Distance Driven', 'Price / Installment', 'Color', 'Fuel', 'Transmission', 'Option', 'An accident', 'Passenger', 'Steering Wheel', 'Area'
];
@endphp

<div class="car-filter accordion shadow-soft-blue" id="accordionExample">
    @foreach($categorySlug as $index=>$category)
    <div class="card">
        <div class="accordian-head" id="{{ $category }}-accordion">
        <h2 class="mb-0">
            @if ($category == 'car-manufacturer')
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#manufacture" aria-expanded="false" aria-controls="{{ $category }}">
            @else
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#{{ $category }}" aria-expanded="false" aria-controls="{{ $category }}">
            @endif
            {{ $categoryName[$index] }}<i class="fab fa fa-angle-down"></i>
            </button>
        </h2>
        </div>

        @if($category == 'car-type')
        <div id="{{ $category }}" class="collapse {{ request($category, False)?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light grid-radio gr-3">
            @foreach(App\TermTaxonomy::where('taxonomy', $category)->get() as $taxonomy)
            <div class="cd-radio">
            <input type="radio" id="{{ $taxonomy->term->name }}" name="{{ $category }}" class="custom-control-input" value="{{ $taxonomy->term->name }}" {{ ($taxonomy->term->name == $request['carType'])?'checked':''}}>
            <label class="custom-control-label " for="{{ $taxonomy->term->name }}">
                <img src="{{ asset('car-web/img/icons/'.strtolower($taxonomy->term->name).'.svg') }}">
                <span>{{ $taxonomy->term->name }}</span>
            </label>
            </div>
            @endforeach
        </div>
        </div>
        @elseif($category == 'car-manufacturer')
        <div id="manufacture" class="collapse {{ request($category, False)?'show':'' }}" aria-labelledby="{{ $category }}">
        <div id="manufacturerBody" class="card-body bg-light">
            <div class="manufacturer">
                @php
                $mmrequest = array_diff_key($request, ['markName'=>Null, 'modelName'=>Null]);
                $mmItems = \Modules\Car\Entities\Car::filter(clone $allItems, $mmrequest);
                //$mmItems->leftJoin('content_metas', function($join) {
                //    $join->on('contents.id', 'content_metas.id');
                //    $join->where('key', 'markName');
                //})->select('contents.*', 'content_metas.value as markName');
                //dd($mmItems->get());
                @endphp
                
                @foreach(App\TermTaxonomy::where('taxonomy', $category)->get() as $taxonomy)
                @php
                $count = getTaxonomyCount($taxonomy, $mmItems, $request);
                @endphp
                @if($count > 0)
                @php
                $manufacturers[] = $taxonomy->id;
                @endphp
                <div class="custom-control custom-radio">
                    <!-- <a href="/car-list?{{ $category . '=' . $taxonomy->term->name }}" class="text-body text-decoration-none"> -->
                    <input type="radio" id="{{$taxonomy->term->name}}" name="{{ $category }}" class="custom-control-input manufacture" value="{{ $taxonomy->term->name }}" {{ ($taxonomy->term->name == request($category, Null))?'checked':'' }}>
                    <label class="custom-control-label  d-flex justify-content-between" for="{{$taxonomy->term->name}}">{{ $taxonomy->term->name }}
                        <div class="text-muted">{{ $count }}</div>
                    </label>
                </div>
                
                @endif
                @endforeach
            </div>
        </div>
        </div>
        @elseif($category == 'car-colors')
        <div id="{{ $category }}" class="collapse {{ request($category, False)?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light grid-radio gr-2">
            @foreach(App\TermTaxonomy::where('taxonomy', $category)->get() as $taxonomy)
            <div class="custom-control custom-radio">
            <input type="radio" id="color-{{ strtolower($taxonomy->term->name) }}" name="{{ $category }}" class="custom-control-input"
                value="{{ $taxonomy->term->name }}" {{ ($taxonomy->term->name == $request['colorName'])?'checked':''}}>
            <label class="custom-control-label d-flex" for="color-{{ strtolower($taxonomy->term->name) }}"><span class="color-icon color"
                data-color="{{ strtolower($taxonomy->term->name) }}">
                <p>{{ ucfirst($taxonomy->term->name) }}</p>
                </span></label>
            </div>
            @endforeach
        </div>
        </div>
        @elseif($category == 'car-year')
        <div id="{{ $category }}" class="collapse {{ request('year', False)?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light grid-radio">
            <select id="min-year" class="form-control" name="year" onchange="formSubmit('year','no-value')">
            <option value="">Select year</option>
            @for($i=date('Y'); $i>=1990; $i--)
            <option value="{{ $i }}" {{ $request['buildYear']==$i?'selected':'' }}>{{ $i }}</option>
            @endfor
            </select>
        </div>
        </div>
        @elseif($category == 'car-distance-driven')
        <div id="{{ $category }}" class="collapse {{ request('mileageAmount', False)?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light grid-radio">
            <select id="mileageAmount" class="form-control" name="mileageAmount" onchange="formSubmit('mileageAmount','no-value')">
            <option value="">Select distance driven</option>
            <option value="0-0" {{ $request['mileageAmount']=='0-0'?'selected':'' }}>0km</option>
            <option value="1-100" {{ $request['mileageAmount']=='1-100'?'selected':'' }}>1-100km</option>
            <option value="100-1000" {{ $request['mileageAmount']=='100-1000'?'selected':'' }}>100-1,000km</option>
            <option value="1000-5000" {{ $request['mileageAmount']=='1000-5000'?'selected':'' }}>1,000-5,000km</option>
            <option value="5000-10000" {{ $request['mileageAmount']=='5000-10000'?'selected':'' }}>5,000-10,000km</option>
            <option value="10000-50000" {{ $request['mileageAmount']=='10000-50000'?'selected':'' }}>10,000-50,000km</option>
            <option value="50000-100000" {{ $request['mileageAmount']=='50000-100000'?'selected':'' }}>50,000-100,000km</option>
            <option value="100000-500000" {{ $request['mileageAmount']=='100000-500000'?'selected':'' }}>100,000-500,000km</option>
            </select>
        </div>
        </div>
        @elseif($category == 'car-price')
        <div id="{{ $category }}" class="collapse {{ (request('min_price', False) || request('max_price'))?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light grid-radio">
            <div class="form-row">
            <div class="col-md-6">
                <select id="min_price" class="form-control" name="min_price" onchange="formSubmit('min_price','no-value')">
                <option value="">Min</option>
                @for($i=100000; $i<=50000000; $i+=100000)
                <option value="{{ $i }}" {{ $request['minPrice']==$i?'selected':'' }}>{{ numerizePrice($i) }}</option>
                @endfor
                </select>
            </div>
            <div class="col-md-6">
                <select id="max_price" class="form-control" name="max_price" onchange="formSubmit('max_price','no-value')">
                <option value="">Max</option>
                @for($i=$request['minPrice']?$request['minPrice']:100000; $i<=50000000; $i+=100000)
                <option value="{{ $i }}" {{ $request['maxPrice']==$i?'selected':'' }}>{{ numerizePrice($i) }}</option>
                @endfor
                </select>
            </div>
            </div>
        </div>
        </div>
        @elseif($category == 'car-options')
        <div id="{{ $category }}" class="collapse {{ request($category, False)?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light">
            @foreach(App\TermTaxonomy::where('taxonomy', $category)->get() as $taxonomy_parent)
            @foreach($taxonomy_parent->children as $taxonomy)
                @php
                if ($taxonomy->term) {
                    $count = metaHas(\Modules\Car\Entities\Car::filter(clone $allItems, $request, $taxonomy->term->group->metaValue('metaKey')), $taxonomy->term->metaValue('metaKey'), '1')->count();
                } else {
                    $count = $taxonomy->count;
                }
                @endphp
                @if($count > 0)
                <div class="custom-control custom-radio">
                <!-- <a href="/car-list?{{ $category . '=' . $taxonomy->term->name }}" class="text-body text-decoration-none"> -->
                <input type="radio" id="{{ $taxonomy->term->name }}" name="{{ $category }}" class="custom-control-input" value="{{ $taxonomy->term->name }}" {{ ($taxonomy->term->name == request($category, Null))?'checked':'' }}>
                <label class="custom-control-label  d-flex justify-content-between" for="{{ $taxonomy->term->name }}">{{ $taxonomy->term->name }}
                    <div class="text-muted">{{ $count }}</div>
                </label>
                </div>
                @endif
            @endforeach
            @endforeach
        </div>
        </div>
        @else
        <div id="{{ $category }}" class="collapse {{ request($category, False)?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light">
            @foreach(App\TermTaxonomy::where('taxonomy', $category)->get() as $taxonomy)
            @php
            $count = getTaxonomyCount($taxonomy, $allItems, $request);
            @endphp
            @if($count > 0)
            <div class="custom-control custom-radio">
            <!-- <a href="/car-list?{{ $category . '=' . $taxonomy->term->name }}" class="text-body text-decoration-none"> -->
            <input type="radio" id="{{$taxonomy->term->name}}" name="{{ $category }}" class="custom-control-input" value="{{ $taxonomy->term->name }}" {{ ($taxonomy->term->name == request($category, Null))?'checked':'' }}>
            <label class="custom-control-label  d-flex justify-content-between" for="{{$taxonomy->term->name}}">{{ $taxonomy->term->name }}
                <div class="text-muted">{{ $count }}</div>
            </label>
            </div>
            @endif
            @endforeach
        </div>
        </div>
        @endif
    </div>
    @endforeach

</div>

@push('modals')
<!-- DEMO SPINNER TODO: CHANGE -->
<div class="spinner-border" id="demo-spinner" role="status" style="position: fixed; z-index: 1000; top: 50%; left: 50%; display: none">
  <span class="sr-only">Loading...</span>
</div>
@endpush

@push('scripts')
<script>
$("input[type=radio][name!=\"car-manufacturer\"]").click(submitMenu);
$("input[type=checkbox]").click(submitMenu);
$("input[type=radio][name!='car-manufacturer'], .page-link, .advantage-item, .sort-cars li").click(load);

function load(event) {
    $("#demo-spinner").css('display', 'block');
}

function submitMenu(event) {
    event.preventDefault();
    if (event.target.defaultChecked) {
      event.target.checked = false;
    }
    $('#mainForm').submit();
}
</script>
@endpush