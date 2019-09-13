@extends('themes.car-web.layouts.default')

@section('title')

@endsection

@section('load')

@endsection

@section('content')


    <!-- Masthead -->
    <header class="masthead text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="hero-slider owl-carousel owl-theme">

                        @banners([{"field":"active", "key":"1"}])
                        @php
                            $bannerList=json_decode($banners);
                        @endphp
                        @if(count($bannerList) > 0)
                            @foreach($bannerList as $bnr)
                                <div class="slider-item">
                                    {{--<div class="slider-text animated slideInLeft" style="top: 0; left: 100px">--}}
                                        {{--<h1>Зээлийн хүү</h1>--}}
                                    {{--</div>--}}
                                    {{--<div class="slider-text animated slideInLeft slider-highlight" style="top: 50px; left: 50px">3%--}}
                                    {{--</div>--}}
                                    {{--<div class="slider-text animated slideInLeft" style="top: 200px; left: 200px">--}}
                                        {{--<h1>Жилийн</h1>--}}
                                    {{--</div>--}}
                                    <div class="slider-img animated slideInLeft" style="bottom: 0; left: -50px;">
                                        <img src="{{$bnr->banner_img_web}}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="slider-item">
                                <div class="slider-text animated slideInLeft" style="top: 0; left: 100px">
                                    <h1>Зээлийн хүү</h1>
                                </div>
                                <div class="slider-text animated slideInLeft slider-highlight" style="top: 50px; left: 50px">3%
                                </div>
                                <div class="slider-text animated slideInLeft" style="top: 200px; left: 200px">
                                    <h1>Жилийн</h1>
                                </div>
                                <div class="slider-img animated slideInLeft" style="bottom: 0; left: -50px;">
                                    <img src="{{asset('car-web/img/slider-1.png')}}" alt="">
                                </div>
                            </div>
                            <div class="slider-item">
                                <div class="slider-text" style="top: 5%; left: 90px">
                                    <h1>Авто машины</h1>
                                </div>
                                <div class="slider-text" style="top: 18%; left: 100px; ">
                                    <h1 style="font-size: 2rem;">Дуудлага худалдаа</h1>
                                </div>
                                <div class="slider-img" style="top: 50%; left: 50px;">
                                    <img src="{{asset('car-web/img/slider-2.png')}}" alt="" class="img-fluid">
                                </div>
                                <div class="slider-img" style="top: 25%; left: 0; z-index:-1;">
                                    <img src="{{asset('car-web/img/auction.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-5" style="z-index: 1">

                    <div class="card masthead-search shadow-lg-3d">
                        <div class="">
                            <div class="card-header px-5 pt-5 pb-3">
                                <h1>Vehicle search</h1>
                                <div class="mh-search-input">
                                    <input class="search" type="search" placeholder="Search" aria-label="Search">
                                    <button type="button" class="search-button">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20.4" height="20.4" viewBox="0 0 20.4 20.4">
                                            <path
                                                d="M152.734,14.153a5.385,5.385,0,1,1,5.417-5.385A5.379,5.379,0,0,1,152.734,14.153Zm7.223,0h-.963l-.361-.359a7.857,7.857,0,0,0,1.806-6.342A7.77,7.77,0,0,0,153.7,1.109a7.859,7.859,0,0,0-8.788,8.735,7.9,7.9,0,0,0,6.38,6.7,7.969,7.969,0,0,0,6.38-1.795l.361.359v.957l5.056,5.026a1.315,1.315,0,0,0,1.806,0,1.3,1.3,0,0,0,0-1.795Z"
                                                transform="translate(-144.854 -1.052)" fill="#2b3651" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs px-5" id="heroTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                   aria-controls="imported" aria-selected="true">Imported</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="used"
                                   aria-selected="false">Used in MN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                   aria-controls="auction" aria-selected="false">Auction</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="budget"
                                   aria-selected="false">Budget</a>
                            </li>
                        </ul>
                        <div class="tab-content p-5" id="heroTabFilter">
                            <div class="tab-pane fade show active" id="imported" role="tabpanel" aria-labelledby="imported-tab">
                                <form>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>Default select</option>
                                            <option>Default select</option>
                                            <option>Default select</option>
                                            <option>Default select</option>
                                            <option>Default select</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>Default select</option>
                                            <option>Default select</option>
                                            <option>Default select</option>
                                            <option>Default select</option>
                                            <option>Default select</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>Default select</option>
                                            <option>Default select</option>
                                            <option>Default select</option>
                                            <option>Default select</option>
                                            <option>Default select</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option>Default select</option>
                                            <option>Default select</option>
                                            <option>Default select</option>
                                            <option>Default select</option>
                                            <option>Default select</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-danger btn-lg btn-round shadow mt-4">Submit</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="used" role="tabpanel" aria-labelledby="used-tab">...</div>
                            <div class="tab-pane fade" id="auction" role="tabpanel" aria-labelledby="auction-tab">...</div>
                            <div class="tab-pane fade" id="budget" role="tabpanel" aria-labelledby="budget-tab">...</div>
                        </div>

                    </div>

                </div>
                <div class="master-head-bg">
                    <img src="{{asset('car-web/img/hero_bg.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </header>

    <section class="mainPage-items bg-white">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Hot deal</h2>
                    <span>
            <a href="#">See all (123)</a>
            <div class="more-arrow"></div>
          </span>
                </div>
            </div>
        </div>
        <div class="card-list hot-deal">
            <div class="container">
                <div class="row">
                    <div class="card-slide owl-carousel owl-theme">
                        @contents([{"field":"type", "key":"car"}, {"field":"status", "key":"draft"} ])
                        @php
                        $carDataHotList=json_decode($carDataHot);

                        function getValue($rr,$key){
                            foreach($rr->metas as $metas){
                                if($metas->key==$key){
                                return $metas->value;
                                }
                            }
                        }
                        @endphp
                        {{--{{$carDataHot}}--}}
                        @foreach($carDataHotList as $rr)
                        <div class="card">

                            <div class="brand-name"><?php echo getValue($rr, 'manufacturer') ?></div>
                            <div class="card-img">
                                {{--<img src="{{(getValue($rr, 'thumbnail'))}}" class="img-fluid" alt="alt">--}}
                                <img src="{{asset('car-web/img/Cars/3.jpg')}}" class="img-fluid" alt="alt">
                                <div class="info">
                              <span class="carIcon-engine">
                                <p><?php echo getValue($rr, 'displacement') ?></p>
                              </span>
                                    <span class="carIcon-car-6">
                                <p><?php echo getValue($rr, 'mileage') ?></p>
                              </span>
                                    <span class="carIcon-gas-station">
                                <p><?php echo getValue($rr, 'fuel') ?></p>
                              </span>
                                    <span class="carIcon-gearshift">
                                <p><?php echo getValue($rr, 'transmission') ?></p>
                              </span>
                                    <span class="carIcon-steering-wheel">
                                <p><?php echo getValue($rr, 'wheelDrive') ?></p>
                              </span>
                                    <span class="color" data-color="white">
                                <p><?php echo getValue($rr, 'colorName') ?></p>
                              </span>
                                </div>
                                <div class="card-caption">
                                    <div class="meta"><?php echo getValue($rr, 'buildYear') ?>/<?php echo getValue($rr, 'importDate') ?> | <?php echo getValue($rr, 'mileage') ?> | <?php echo getValue($rr, 'fuel') ?> <i class="show-more fab fa fa-angle-up"></i></div>
                                    <div class="favorite">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body shadow">
                                <div class="card-description">
                                    <a href="detail-page.html" class="card-title">{{$rr->title}}</a>
                                    <div class="card-meta">
                                        <div class="status"><?php echo getValue($rr, 'priceType') ?> / finance</div>
                                        <div class="price"><?php echo getValue($rr, 'price') ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                         <!-- card end -->

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Importation Grid -->
    <section class="mainPage-items bg-light">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Importation cars</h2>
                    <span>
            <a href="#">See all (123)</a>
            <div class="more-arrow"></div>
          </span>
                </div>
            </div>
        </div>
        <div class="card-list importation">
            <div class="container">
                <div class="row">
                    <div class="card-slide owl-carousel owl-theme">
                        <!-- card start -->
                        <div class="card">
                            <div class="brand-name"></div>
                            <div class="card-img">
                                <img src="{{asset('car-web/img/Cars/2.jpg')}}" class="img-fluid" alt="alt">
                                <div class="info">
                  <span class="carIcon-engine">
                    <p>1499 L</p>
                  </span>
                                    <span class="carIcon-car-6">
                    <p>52,000 KM</p>
                  </span>
                                    <span class="carIcon-gas-station">
                    <p>Gasoline</p>
                  </span>
                                    <span class="carIcon-gearshift">
                    <p>Automatic</p>
                  </span>
                                    <span class="carIcon-steering-wheel">
                    <p>Right wheel</p>
                  </span>
                                    <span class="color" data-color="black">
                    <p>Black</p>
                  </span>
                                </div>
                                <div class="card-caption">
                                    <div class="meta">2006/2013 | 17,820km | Gasoline <i class="show-more fab fa fa-angle-up"></i></div>
                                    <div class="favorite">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="card-description">
                                    <a href="detail-page.html" class="card-title">
                                        Santa fe The Prime diesel 2.0 2wd
                                    </a>
                                    <div class="card-meta">
                                        <div class="status">Change / Finance</div>
                                        <div class="price">12 Сая ₮</div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- card end -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Used in Mongolia Grid -->
    <section class="mainPage-items bg-white">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Used in Mongolia</h2>
                    <span>
            <a href="#">See all (123)</a>
            <div class="more-arrow"></div>
          </span>
                </div>
            </div>
        </div>
        <div class="card-list usedInMn">
            <div class="container">
                <div class="row">
                    <div class="card-slide owl-carousel owl-theme">
                        <!-- card start -->
                        <div class="card">
                            <div class="brand-name"></div>
                            <div class="card-img">
                                <img src="{{asset('car-web/img/Cars/3.jpg')}}" class="img-fluid" alt="alt">
                                <div class="info">
                  <span class="carIcon-engine">
                    <p>1499 L</p>
                  </span>
                                    <span class="carIcon-car-6">
                    <p>52,000 KM</p>
                  </span>
                                    <span class="carIcon-gas-station">
                    <p>Gasoline</p>
                  </span>
                                    <span class="carIcon-gearshift">
                    <p>Automatic</p>
                  </span>
                                    <span class="carIcon-steering-wheel">
                    <p>Right wheel</p>
                  </span>
                                    <span class="color" data-color="black">
                    <p>Black</p>
                  </span>
                                </div>
                                <div class="card-caption">
                                    <div class="meta">2006/2013 | 17,820km | Gasoline <i class="show-more fab fa fa-angle-up"></i></div>
                                    <div class="favorite">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="card-description">
                                    <a href="detail-page.html" class="card-title">Santa fe The Prime diesel 2.0 2wd</a>
                                    <div class="card-meta">
                                        <div class="status">Change / Finance</div>
                                        <div class="price">12 Сая ₮</div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- card end -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Used in Mongolia Grid -->
    <section class="mainPage-items bg-light">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Auction</h2>
                    <span>
            <a href="#">See all (123)</a>
            <div class="more-arrow"></div>
          </span>
                </div>
            </div>
        </div>
        <div class="card-list auction">
            <div class="container">
                <div class="row">
                    <div class="card-slide owl-carousel owl-theme">
                        <!-- card start -->
                        <div class="card">
                            <div class="brand-name"></div>
                            <div class="card-img">
                                <img src="{{asset('car-web/img/Cars/4.jpg')}}" class="img-fluid" alt="alt">
                                <div class="info">
                  <span class="carIcon-engine">
                    <p>1499 L</p>
                  </span>
                                    <span class="carIcon-car-6">
                    <p>52,000 KM</p>
                  </span>
                                    <span class="carIcon-gas-station">
                    <p>Gasoline</p>
                  </span>
                                    <span class="carIcon-gearshift">
                    <p>Automatic</p>
                  </span>
                                    <span class="carIcon-steering-wheel">
                    <p>Right wheel</p>
                  </span>
                                    <span class="color" data-color="white">
                    <p>White</p>
                  </span>
                                </div>
                                <div class="card-caption">
                                    <div class="countdown">00h:00m:00s</div>
                                    <div class="favorite">
                                        <i class="icon-heart"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="card-description">
                                    <a href="detail-page.html" class="card-title">Santa fe The Prime diesel 2.0 2wd</a>
                                    <div class="meta">2006/2013 | 17,820km | Gasoline </div>
                                    <div class="card-meta">
                                        <div class="bids">0 Bids</div>
                                        <div class="price">12 Сая ₮</div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- card end -->

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog post -->
    <section class="mainPage-items bg-white">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Auto Magazine</h2>
                    <span>
            <a href="#">See all (123)</a>
            <div class="more-arrow"></div>
          </span>
                </div>
            </div>
        </div>
        <div class="card-list magazine">
            <div class="container">
                <div class="row mx-n4">

                    <!-- card start -->
                    <div class="card-magazine col-md-6 px-2 big-blog">
                        <div class="brand-name"></div>
                        <div class="card-img">
                            <img src="{{asset('car-web/img/blog/1.jpg')}}" class="img-fluid h-100" alt="alt">
                        </div>

                        <div class="card-body">
                            <div class="card-description">
                                <div class="card-title">Нараа нараа ЦААШАА, сүүдэр сүүдэр НААШАА</div>
                                <div class="card-meta">
                                    <div class="date"><i class="icon-clock"></i> Aug 23</div>
                                    <div class="views"><i class="icon-eye"></i> 132</div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card-magazine col-md-3 px-2">
                        <div class="brand-name"></div>
                        <div class="card-img">
                            <img src="{{asset('car-web/img/blog/2.jpg')}}" class="img-fluid h-100" alt="alt">
                        </div>

                        <div class="card-body">
                            <div class="card-description">
                                <div class="card-title">Нараа нараа ЦААШАА, сүүдэр сүүдэр НААШАА</div>
                                <div class="card-meta">
                                    <div class="date"><i class="icon-clock"></i> Aug 23</div>
                                    <div class="views"><i class="icon-eye"></i> 132</div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card-magazine col-md-3 px-2">
                        <div class="brand-name"></div>
                        <div class="card-img">
                            <img src="{{asset('car-web/img/blog/3.jpg')}}" class="img-fluid h-100" alt="alt">
                        </div>

                        <div class="card-body">
                            <div class="card-description">
                                <div class="card-title">Нараа нараа ЦААШАА, сүүдэр сүүдэр НААШАА</div>
                                <div class="card-meta">
                                    <div class="date"><i class="icon-clock"></i> Aug 23</div>
                                    <div class="views"><i class="icon-eye"></i> 132</div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- card end -->

                </div>
            </div>
            <div class="container mt-3">
                <div class="row mx-n4">

                    <!-- card start -->
                    <div class="card-magazine col-md-3 px-2">
                        <div class="brand-name"></div>
                        <div class="card-img">
                            <img src="{{asset('car-web/img/blog/6.jpg')}}" class="img-fluid h-100" alt="alt">
                        </div>

                        <div class="card-body">
                            <div class="card-description">
                                <div class="card-title">Нараа нараа ЦААШАА, сүүдэр сүүдэр НААШАА</div>
                                <div class="card-meta">
                                    <div class="date"><i class="icon-clock"></i> Aug 23</div>
                                    <div class="views"><i class="icon-eye"></i> 132</div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card-magazine col-md-3 px-2">
                        <div class="brand-name"></div>
                        <div class="card-img">
                            <img src="{{asset('car-web/img/blog/5.jpg')}}" class="img-fluid h-100" alt="alt">
                        </div>

                        <div class="card-body">
                            <div class="card-description">
                                <div class="card-title">Нараа нараа ЦААШАА, сүүдэр сүүдэр НААШАА</div>
                                <div class="card-meta">
                                    <div class="date"><i class="icon-clock"></i> Aug 23</div>
                                    <div class="views"><i class="icon-eye"></i> 132</div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card-magazine col-md-6 px-2 big-blog">
                        <div class="brand-name"></div>
                        <div class="card-img">
                            <img src="{{asset('car-web/img/blog/4.jpg')}}" class="img-fluid h-100" alt="alt">
                        </div>

                        <div class="card-body">
                            <div class="card-description">
                                <div class="card-title">Нараа нараа ЦААШАА, сүүдэр сүүдэр НААШАА</div>
                                <div class="card-meta">
                                    <div class="date"><i class="icon-clock"></i> Aug 23</div>
                                    <div class="views"><i class="icon-eye"></i> 132</div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- card end -->

                </div>
            </div>
        </div>
    </section>


@endsection

@section('script')

@endsection
