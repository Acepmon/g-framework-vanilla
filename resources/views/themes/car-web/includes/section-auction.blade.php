<section class="mainPage-items bg-dark">
    <div class="container">
        <div class="row">
            @contents({"filter":[{"field":"type", "key":"car"}, {"field":"status", "key":"published"}],
            "metasFilter": [{"key": "isAuction", "value": 1}],"limit":12, "returnVariable":"carAuctionPremium"})
            <div class="section-title text-light">
                <h2>Auction cars</h2>
                <span>
            <a href="/auction">See all ({{count($carAuctionPremium)}}) <i class="fab fa fa-angle-right"></i></a>
          </span>
            </div>
        </div>
            <div class="card-list auction mx-n3">
                <div class="row">

                    @foreach($carAuctionPremium as $auctionPrmCars)
                        @if(count($interestedCars) > 0)
                            @foreach($interestedCars as $intCars)
                                @if($intCars == $auctionPrmCars->id)
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
                        <div class="col-lg-3 col-md-4">
                            <!-- card start -->
                            <div class="card cd-box auction-car">
                                <div class="premium-tag shadow-soft-blue"><img src="{{asset('car-web/img/icons/corona.svg')}}" alt=""></div>
                                    <div class="card-img">
                                        <img src="{{(getMetasValue($auctionPrmCars->metas, 'thumbnail'))}}" class="img-fluid" alt="alt">
                                        <div class="info">
                                        <span class="carIcon-engine"><p>{{(getMetasValue($auctionPrmCars->metas, 'capacityAmount'))}} {{(getMetasValue($auctionPrmCars->metas, 'capacityUnit'))}}</p></span>
                                        <span class="carIcon-car-6"><p>{{(getMetasValue($auctionPrmCars->metas, 'mileageAmount'))}} {{(getMetasValue($auctionPrmCars->metas, 'mileageUnit'))}}</p></span>
                                        <span class="carIcon-gas-station"><p>{{(getMetasValue($auctionPrmCars->metas, 'fuelType'))}}</p></span>
                                        <span class="carIcon-gearshift"><p>{{(getMetasValue($auctionPrmCars->metas, 'transmission'))}}</p></span>
                                        <span class="carIcon-steering-wheel"><p>{{(getMetasValue($auctionPrmCars->metas, 'wheelPosition'))}}</p></span>
                                        <span class="color" data-color="white"><p>{{(getMetasValue($auctionPrmCars->metas, 'colorName'))}}</p></span>
                                    </div>
                                    <div class="card-caption">
                                        <div id="countdown" class="countdown"  data-countdown="Jan 5, 2020 15:37:25"></div>
                                        <div class="favorite saveToInterested" data-target="{{ $auctionPrmCars->id }}">
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
                                            <a href="{{$auctionPrmCars->slug}}" class="card-title">{{$auctionPrmCars->title}}</a>

                                        </div>
                                        <div class="card-meta">
                                            <div class="year">{{(getMetasValue($auctionPrmCars->metas, 'buildYear'))}} / {{(getMetasValue($auctionPrmCars->metas, 'importDate'))}}</div>
                                            <div class="price">{{(getMetasValue($auctionPrmCars->metas, 'priceAmount'))}}{{(getMetasValue($auctionPrmCars->metas, 'priceUnit'))}}</div>
                                        </div>
                                        <div class="overall">{{(getMetasValue($auctionPrmCars->metas, 'mileageAmount'))}} {{(getMetasValue($auctionPrmCars->metas, 'mileageUnit'))}}
                                            | {{(getMetasValue($auctionPrmCars->metas, 'fuelType'))}}
                                            | {{(getMetasValue($auctionPrmCars->metas, 'capacityAmount'))}} {{(getMetasValue($auctionPrmCars->metas, 'capacityUnit'))}}</div>
                                    </div>

                                </div>

                            </div>
                            <!-- card end -->
                        </div>
                        <!-- col-end -->
                    @endforeach
                </div>
            </div>
        </div>
</section>

