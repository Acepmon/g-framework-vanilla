<section id="hot-deal" class="mainPage-items bg-white">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>Our best</h2>
                <span>
            <a href="#">See all (123) <i class="fab fa fa-angle-right"></i></a>
          </span>
            </div>

            <div class="card-list">
                <div class="row">
                    @contents({"filter":[{"field":"type", "key":"car"}, {"field":"status", "key":"published"}], "metasFilter": [{"key":"publishType", "value":"best_premium"}], "limit":12, "returnVariable":"carDataPremium"})

                    @foreach($carDataPremium as $bpCars)
                          <!-- col-start -->
                        <div class="col-lg-3 col-md-4">
                            <!-- card start -->
                            <a href="{{$bpCars->slug}}" target="_blank" class="card cd-box">
                                <div class="premium-tag shadow-soft-blue"><img src="{{asset('car-web/img/icons/corona.svg')}}" alt=""></div>
                                <div class="card-img">
                                    <img src="{{(getMetasValue($bpCars->metas, 'thumbnail'))}}" class="img-fluid" alt="alt">

                                    <div class="card-caption">
                                        <div class="meta">{{(getMetasValue($bpCars->metas, 'mileageAmaount'))}} {{(getMetasValue($bpCars->metas, 'mileageUnit'))}}| {{(getMetasValue($bpCars->metas, 'fuelType'))}} | {{(getMetasValue($bpCars->metas, 'capacityAmount'))}} {{(getMetasValue($bpCars->metas, 'capacityunit'))}}</div>
                                        <div class="favorite">
                                            <i class="icon-heart"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body py-2">
                                    <div class="card-description">
                                        <div class="card-desc-top">
                                            <div class="card-title">{{$bpCars->title}}</div>
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
    </div>
</section>
