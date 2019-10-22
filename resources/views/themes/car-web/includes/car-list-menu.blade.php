@php
$categorySlug = [
'car-type', 'car-manufacturer', 'car-year', 'car-distance-driven', 'car-price', 'car-colors', 'car-fuel', 'car-transmission', 'car-options', 'car-accident', 'car-mancount', 'car-wheel-pos', 'provinces'
];
$categoryName = [
'Car Type', 'Manufacturer', 'Year', 'Distance Driven', 'Price / Installment', 'Color', 'Fuel', 'Transmission', 'Option', 'An accident', 'Passenger', 'Steering Wheel', 'Area'
];
@endphp

<div class="car-filter accordion shadow-soft-blue" id="accordionExample">
    @foreach($categorySlug as $index=>$category)
    <div class="card">
        <div class="accordian-head" id="{{ $category }}-accordion">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#{{ $category }}" aria-expanded="false" aria-controls="{{ $category }}">
            {{ $categoryName[$index] }}<i class="fab fa fa-angle-down"></i>
            </button>
        </h2>
        </div>

        @if($category == 'car-type')
        <div id="{{ $category }}" class="collapse {{ request($category, False)?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light grid-radio gr-3">
            @foreach(App\TermTaxonomy::where('taxonomy', $category)->get() as $taxonomy)
            <div class="cd-radio">
            <input type="checkbox" id="{{ $taxonomy->term->name }}" name="{{ $category }}[]" class="custom-control-input" value="{{ $taxonomy->term->name }}" {{ in_array($taxonomy->term->name, $request['carType'])?'checked':''}}>
            <label class="custom-control-label " for="{{ $taxonomy->term->name }}">
                <img src="{{ asset('car-web/img/icons/'.strtolower($taxonomy->term->name).'.svg') }}">
                <span>{{ $taxonomy->term->name }}</span>
            </label>
            </div>
            @endforeach
        </div>
        </div>
        @elseif($category == 'car-colors')
        <div id="{{ $category }}" class="collapse {{ request($category, False)?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light grid-radio gr-2">
            @foreach(App\TermTaxonomy::where('taxonomy', $category)->get() as $taxonomy)
            <div class="custom-control custom-radio">
            <input type="checkbox" id="color-{{ strtolower($taxonomy->term->name) }}" name="{{ $category }}[]" class="custom-control-input"
                value="{{ $taxonomy->term->name }}" {{ in_array($taxonomy->term->name, $request['colorName'])?'checked':''}}>
            <label class="custom-control-label d-flex" for="color-{{ strtolower($taxonomy->term->name) }}"><span class="color-icon color"
                data-color="{{ strtolower($taxonomy->term->name) }}">
                <p>{{ ucfirst($taxonomy->term->name) }}</p>
                </span></label>
            </div>
            @endforeach
        </div>
        </div>
        @elseif($category == 'car-year')
        <div id="{{ $category }}" class="collapse {{ request($category, False)?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light grid-radio">
            <select id="min-year" class="form-control" name="year" onchange="formSubmit('year','year')">
            <option value="">Select year</option>
            @for($i=date('Y'); $i>=1990; $i--)
            <option value="{{ $i }}" {{ $request['buildYear']==$i?'selected':'' }}>{{ $i }}</option>
            @endfor
            </select>
        </div>
        </div>
        @elseif($category == 'car-distance-driven')
        <div id="{{ $category }}" class="collapse {{ request($category, False)?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light grid-radio">
            <select id="distance_driven" class="form-control" name="distance_driven" onchange="formSubmit('distance_driven','no-value')">
            <option value="">Select distance</option>
            @for($i=1; $i<=10; $i++)
            <option value="{{ $i }}" {{ $request['distanceDriven']==$i?'selected':'' }}>{{ $i }}km</option>
            @endfor
            </select>
        </div>
        </div>
        @elseif($category == 'car-price')
        <div id="{{ $category }}" class="collapse {{ (request('min_price', False) || request('max_price'))?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light grid-radio">
            <div class="form-row">
            <div class="col-md-6">
                <select id="min_price" class="form-control" name="min_price" onchange="formSubmit('min_price','no-value')">
                <option value="0">Min</option>
                @for($i=100; $i<=10000; $i+=100)
                <option value="{{ $i }}" {{ $request['minPrice']==$i?'selected':'' }}>{{ $i }} мянга</option>
                @endfor
                </select>
            </div>
            <div class="col-md-6">
                <select id="max_price" class="form-control" name="max_price" onchange="formSubmit('max_price','no-value')">
                <option value="">Max</option>
                @for($i=$request['minPrice']; $i<=10000; $i+=100)
                <option value="{{ $i }}" {{ $request['maxPrice']==$i?'selected':'' }}>{{ $i }} мянга</option>
                @endfor
                </select>
            </div>
            </div>
        </div>
        </div>
        @else
        <div id="{{ $category }}" class="collapse {{ request($category, False)?'show':'' }}" aria-labelledby="{{ $category }}">
        <div class="card-body bg-light">
            @foreach(App\TermTaxonomy::where('taxonomy', $category)->get() as $taxonomy)
            <div class="custom-control custom-radio">
            <!-- <a href="/car-list?{{ $category . '=' . $taxonomy->term->name }}" class="text-body text-decoration-none"> -->
            <input type="checkbox" id="{{$taxonomy->term->name}}" name="{{ $category }}[]" class="custom-control-input" value="{{ $taxonomy->term->name }}" {{ in_array($taxonomy->term->name, request($category, []))?'checked':'' }}>
            <label class="custom-control-label  d-flex justify-content-between" for="{{$taxonomy->term->name}}">{{ $taxonomy->term->name }}
                <div class="text-muted">{{ $taxonomy->count }}</div>
            </label>
            </div>
            @endforeach
        </div>
        </div>
        @endif
    </div>
    @endforeach

</div>

@push('scripts')
<script>
$("input[type=radio]").click(submitMenu);
$("input[type=checkbox]").click(submitMenu);

function submitMenu(event) {
    event.preventDefault();
    if (event.target.defaultChecked) {
      event.target.checked = false;
    }
    $('#mainForm').submit();
}
</script>
@endpush