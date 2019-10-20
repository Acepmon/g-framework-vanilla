<section class="mainPage-items bg-light homeFreeCars">
    <div class="container">

        <div class="row">
            <div class="section-title">
                <h2>Normal cars</h2>
                <span>
            <a href="/buy">See all ( @contentsTotal({"filter":[{"field":"type", "key":"car"}, {"field":"status", "key":"published"}]}) ) <i class="fab fa fa-angle-right"></i></a>
          </span>
            </div>
            <div class="car-list">
                <div class="row">
                    @contents({"filter":[{"field":"type", "key":"car"}, {"field":"status", "key":"published"}], "limit":10,
                    "returnVariable":"carsOther"})

                    @foreach($carsOther as $othCars)
                        @if(count($interestedCars) > 0)
                            @foreach($interestedCars as $intCars)
                                @if($intCars == $othCars->id)
                                    @php
                                        $itsIntCar=true;
                                    @endphp
                                    @break;
                                @else
                                    @php
                                        $itsIntCar=false;
                                    @endphp
                                @endif
                            @endforeach
                        @endif
                        <div class="col-lg-6 col-md-6">
                            <!-- card start -->
                            <a href="{{$othCars->slug}}" target="_blank" class="card">
                                <div class="card-body">
                                    <div class="card-img">
                                        <img src="{{(getMetasValue($othCars->metas,'thumbnail'))}}" class="img-fluid" alt="alt">
                                    </div>
                                    <div class="card-description">
                                        <div class="card-caption">
                                            <div class="card-title">{{$othCars->title}}</div>
                                            <div class="meta">{{(getMetasValue($othCars->metas,'buildYear'))}} / {{(getMetasValue($othCars->metas,'importDate'))}} | {{(getMetasValue($othCars->metas,'mileageAmount'))}} {{(getMetasValue($othCars->metas,'mileageUnit'))}}</div>
                                            <div class="price">{{numerizePrice((getMetasValue($othCars->metas,'priceAmount')))}} {{(getMetasValue($othCars->metas, 'priceUnit'))}}</div>
                                            <div class="favorite saveToInterested" data-target="{{ $othCars->id }}">
                                                @if($itsIntCar==true)
                                                    <i class="fas fa-heart"></i> Added to interest list
                                                @else
                                                    <i class="icon-heart"></i> Add to interest list
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- card end -->
                    @endforeach
                    <a class="btn btn-danger btn-round shadow-red mx-auto my-3 px-5" href="/buy">See all vehicles</a>
                </div>
            </div>
        </div>
    </div>
</section>

