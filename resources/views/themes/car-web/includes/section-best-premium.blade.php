<section id="hot-deal" class="mainPage-items bg-white">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>Our best</h2>
                <span>
            <a href="/buy?best_premium=true">See all<i class="fab fa fa-angle-right"></i></a>
          </span>
            </div>
        </div>

            <div class="card-list mx-n3">
                <div class="row">
                    @contents({"filter":[{"field":"type", "key":"car"}, {"field":"status", "key":"published"}, {"field":"visibility", "key":"public"}], "metasFilter": [{"key":"publishType", "value":"best_premium"}], "limit":12, "returnVariable":"carDataPremium"})

                    @foreach($carDataPremium as $bpCars)
                        @if(count($interestedCars) > 0)
                            @foreach($interestedCars as $intCars)
                                @if($intCars==$bpCars->id)
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

                          <!-- col-start -->
                        <div class="col-lg-3 col-md-4">
                            <!-- card start -->
                            <a href="{{$bpCars->slug}}" target="_blank" class="card cd-box">
                                <div class="premium-tag shadow-soft-blue"><img src="{{asset('car-web/img/icons/corona.svg')}}" alt=""></div>
                                <div class="card-img">
                                    <img src="{{(getMetasValue($bpCars->metas, 'thumbnail'))}}" class="img-fluid" alt="alt">

                                    <div class="card-caption">
                                        <div class="meta">{{(getMetasValue($bpCars->metas, 'mileageAmaount'))}} {{(getMetasValue($bpCars->metas, 'mileageUnit'))}}| {{(getMetasValue($bpCars->metas, 'fuelType'))}} | {{(getMetasValue($bpCars->metas, 'capacityAmount'))}} {{(getMetasValue($bpCars->metas, 'capacityunit'))}}</div>
                                        <div class="favorite saveToInterested" data-target="{{ $bpCars->id }}">
                                            @if($itsIntCar==true)
                                                <span class="text-danger"><i class="fas fa-heart"></i></span>
                                            @else
                                                <i class="icon-heart"></i>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="card-description">
                                        <div class="card-desc-top">
                                            <div class="card-title">{{$bpCars->title}} {{$bpCars->id}}</div>
                                            <div class="price">{{numerizePrice((getMetasValue($bpCars->metas, 'priceAmount')))}} {{(getMetasValue($bpCars->metas, 'priceUnit'))}}</div>
                                        </div>

                                        <div class="card-meta">
                                            <div class="year">{{(getMetasValue($bpCars->metas, 'buildYear'))}} / {{(getMetasValue($bpCars->metas, 'importDate'))}}</div>
                                        </div>
                                        <div class="status">{{(getMetasValue($bpCars->metas, 'priceType'))}}</div>
                                    </div>
                                </div>
                            </a>
                            <!-- card end -->
                        </div>
                        <!-- col-end -->
                    @endforeach
                </div>
            </div>
        </div>
</section>
