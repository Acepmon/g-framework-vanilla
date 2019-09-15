<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('car-web/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Owl Carousel core CSS -->
        <link href="{{ asset('car-web/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('car-web/vendor/owl.carousel/assets/owl.theme.default.css') }}" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="{{ asset('car-web/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('car-web/css/car-icons/style.css') }}" rel="stylesheet">
        <link href="{{ asset('car-web/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"type="text/css">

        <!-- Animation style for this template -->
        <link href="{{ asset('car-web/css/animate.css') }}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{ asset('car-web/css/style.min.css') }}" rel="stylesheet">

        @yield('load')
    </head>

    <body class="detail-page">

        @include('themes.car-web.includes.header')

        <div class="bg-page-header"></div>

        <section class="first-section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @include('themes.car-web.includes.detail-title', ['content', $content])
                    </div>
                </div>
            </div>
        </section>

        <!-- Detail page Grid -->
        <section class="detail-items bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @include('themes.car-web.includes.detail-slide-gallery', ['content', $content])
                    </div>
                    <div class="col-md-4">

                    <div class="row">
                        <div class="col-md-12 mb-2">
                            @include('themes.car-web.includes.detail-seller', ['user' => $content->author])
                        </div>

                        <div class="col-md-12 mb-2">
                            @include('themes.car-web.includes.detail-car-stats', ['content' => $content])
                        </div>

                        <div class="col-md-12 px-5">
                            <a class="btn btn-danger btn-round btn-block my-4 shadow-red p-3" href="#">Online purchase</a>
                            <a class="btn btn-light btn-round btn-block my-4 shadow-soft-blue p-3 btn-icon-left" href="#"><i class="icon-heart"></i>
                                Save to interested</a>
                        </div>

                    </div>

                    </div>

                </div>
            </div>
        </section>

        <!-- Basic information start -->
        <section class="detail-items bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <div class="detail-basic-information">
                        <div class="detail-section-title">Basic information</div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="title">Overall</div>
                            <div class="info-list">
                            <ul>
                                <li><i class="carIcon-car-3"></i>Sedan </li>
                                <li><span class="color" data-color="white"></span> Pearl white (Interior)</li>
                                <li><i class="carIcon-seat-belt"></i>5 (Passenger) </li>
                                <li><span class="color" data-color="black"></span>Black (Exterior)</li>
                                <li><i class="carIcon-car"></i>4 (door) </li>
                                <li><i class="fab fa fa-barcode"></i>1FMEU73E89UA22338 </li>
                            </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title">Power</div>
                            <div class="info-list">
                            <ul>
                                <li><i class="carIcon-engine"></i>1499 L </li>
                                <li><i class="carIcon-gas-station"></i>Gasoline </li>
                                <li><i class="carIcon-gearshift"></i>Automatic </li>
                                <li><i class="carIcon-steering-wheel"></i>Right wheel </li>
                                <li><i class="carIcon-chassis"></i>4 WD </li>
                                <li><i class="carIcon-dashboard"></i>180 km/h (Speed limit) </li>
                            </ul>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Finance section start -->
        <section class="mainPage-items bg-light text-center mt-5">
            <div class="container">
            <div class="row">
                <div class="col-md-12 text-center finance-section">
                <div class="finance-title">
                    <h1>This car I want to buy, how much is the month?</h1>
                    <p>Save your money and make an installment.</p>
                </div>
                <div class="row">
                    <div class="col-md-8">
                    <div class="card shadow-soft-blue">
                        <div class="card-body text-left">
                        <form>
                            <p>Advance payment (first 20%)</p>
                            <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="email" class="form-control" id="inputEmail4" placeholder="First price ₮">
                            </div>
                            <div class="form-group col-md-4">
                                <select class="form-control">
                                <option>20%</option>
                                <option>30%</option>
                                <option>40%</option>
                                <option>50%</option>
                                <option>60%</option>
                                </select>
                            </div>
                            </div>
                            <p>Installment period</p>
                            <div class="select-month">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="6month" name="financeMonth" class="custom-control-input">
                                    <label class="custom-control-label" for="6month">6 month</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="12month" name="financeMonth" class="custom-control-input">
                                    <label class="custom-control-label" for="12month">12 month</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="24month" name="financeMonth" class="custom-control-input">
                                    <label class="custom-control-label" for="24month">24 month</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="48month" name="financeMonth" class="custom-control-input">
                                    <label class="custom-control-label" for="48month">48 month</label>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4">
                    <div class="card monthly-payment">
                        <div class="card-body">
                        <h3>Monthly payment</h3>
                        <div class="monthly">486,271 $</div>
                        <div class="info">
                            <p>1 year interest:</p>
                            <p class="font-weight-bold">427,938 $</p>
                        </div>
                        <div class="info">
                            <p>total cost</p>
                            <p class="font-weight-bold">24,427,938 $</p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!-- Option information start -->
        <section class="detail-items bg-white">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="detail-option-information">
                    <div class="detail-section-title">Option information</div>
                    <div class="row p-3">
                    <div class="col-md-3 p-0">
                        <div class="title">Exterior</div>
                        <div class="info-list">
                        <ul>
                            <li><i class="fab fa fa-check"></i>HID/ Led light </li>
                            <li><i class="fab fa fa-check"></i> Pearl white (Interior)</li>
                            <li><i class="fab fa fa-check"></i>Sunroof</li>
                            <li><i class="fab fa fa-check"></i></span>Aluminum wheel</li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="title">Guts</div>
                        <div class="info-list">
                        <ul>
                            <li><i class="fab fa fa-check"></i>Steering wheel remote control</li>
                            <li><i class="fab fa fa-check"></i>Power Steering </li>
                            <li><i class="fab fa fa-check"></i>Room Mirror: ECM </li>
                            <li><i class="fab fa fa-check"></i>Room Mirror: High Pass </li>
                            <li><i class="fab fa fa-check"></i>Leather seat </li>
                            <li><i class="fab fa fa-check"></i>Electric seat: driver's seat</li>
                            <li><i class="fab fa fa-check"></i>Electric seat: Passenger seat</li>
                            <li><i class="fab fa fa-check"></i>Heated Seat: Driver's Seat</li>
                            <li><i class="fab fa fa-check"></i>Hot wire seat: Passenger seat</li>
                            <li><i class="fab fa fa-check"></i>Heated seats: rear seat</li>
                            <li><i class="fab fa fa-check"></i>ElecMemory sheet: driver's seattric</li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="title">Safety</div>
                        <div class="info-list">
                        <ul>
                            <li><i class="fab fa fa-check"></i>Steering wheel remote control</li>
                            <li><i class="fab fa fa-check"></i>Power Steering </li>
                            <li><i class="fab fa fa-check"></i>Room Mirror: ECM </li>
                            <li><i class="fab fa fa-check"></i>Room Mirror: High Pass </li>
                            <li><i class="fab fa fa-check"></i>Leather seat </li>
                            <li><i class="fab fa fa-check"></i>Electric seat: driver's seat</li>
                            <li><i class="fab fa fa-check"></i>Electric seat: Passenger seat</li>
                            <li><i class="fab fa fa-check"></i>Heated Seat: Driver's Seat</li>
                            <li><i class="fab fa fa-check"></i>Hot wire seat: Passenger seat</li>
                            <li><i class="fab fa fa-check"></i>Heated seats: rear seat</li>
                            <li><i class="fab fa fa-check"></i>ElecMemory sheet: driver's seattric</li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-md-3 p-0">
                        <div class="title">Convenience</div>
                        <div class="info-list">
                        <ul>
                            <li><i class="fab fa fa-check"></i>Steering wheel remote control</li>
                            <li><i class="fab fa fa-check"></i>Power Steering </li>
                            <li><i class="fab fa fa-check"></i>Room Mirror: ECM </li>
                            <li><i class="fab fa fa-check"></i>Room Mirror: High Pass </li>
                            <li><i class="fab fa fa-check"></i>Leather seat </li>
                            <li><i class="fab fa fa-check"></i>Electric seat: driver's seat</li>
                            <li><i class="fab fa fa-check"></i>Electric seat: Passenger seat</li>
                            <li><i class="fab fa fa-check"></i>Heated Seat: Driver's Seat</li>
                            <li><i class="fab fa fa-check"></i>Hot wire seat: Passenger seat</li>
                            <li><i class="fab fa fa-check"></i>Heated seats: rear seat</li>
                            <li><i class="fab fa fa-check"></i>ElecMemory sheet: driver's seattric</li>
                        </ul>
                        </div>
                    </div>

                    </div>
                </div>
                <hr>
                </div>
            </div>
            </div>
        </section>

        <section class="mainPage-items bg-light text-center">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="diagmostic-information">
                    <h1>Diagmostic summary</h1>

                    <a class="btn btn-white  my-4 shadow-soft-blue p-3" href="#">+ Performance Condition Check</a>
                    <ul class="diagmostic-list">
                    <li><span data-type="Sheet"></span> Sheet metal 0</li>
                    <li><span data-type="Exchange"></span> Exchange 0</li>
                    <li><span data-type="Corrosion"></span> Corrosion 0</li>
                    <li><span data-type="Scrathes"></span> Scrathes 0</li>
                    <li><span data-type="Uneveness"></span> Uneveness 0</li>
                    <li><span data-type="Damage"></span> Damage 0</li>
                    </ul>
                    <img src="{{ asset('car-web/img/car-wireframe.png') }}" alt="">
                </div>
                </div>

            </div>
            </div>
        </section>

        <section class="bg-white">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-option-information">
                        <div class="detail-section-title">Description</div>

                        <div class="dealer-description">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum ullam, explicabo iure delectus asperiores sed aliquam provident magnam similique accusantium magni! Neque dolorum similique aliquam id recusandae aliquid nihil sit, blanditiis corporis? Odit, repudiandae recusandae. Libero rem aliquid, distinctio vel ad ab nostrum nulla repellendus modi officia eligendi officiis ducimus labore? Ad, praesentium laborum fugiat vitae doloremque qui beatae consectetur.</p>
                        </div>
                    </div>
                    </div>
                </div>
                <hr>
            </div>
            </div>
        </section>

        <section class="bg-white">
            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="detail-option-information py-5">
                        <div class="detail-section-title">Retail store</div>
                        <div class="row">
                        <div class="col-md-5">
                        <img src="{{ asset('car-web/img/retail.png') }}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-7">
                        <div class="retail-information">
                            <div class="d-flex justify-content-between retail-head py-2">
                            <div class="retail-name">Amgalan auto plaza</div>
                            <div class="retail-phone">999999999</div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-4 font-weight-bold">Retail address</div>
                            <div class="col-md-8">БЗД, Амгалангийн тойрог / Нохойны хөшөөтэй/ зүүн тийш өнгөрөөд 300м яваад төв замын хойд талд</div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-4 font-weight-bold">open hours</div>
                            <div class="col-md-8">Monday to Saturday 9:00am to 18:00 pm Lunch 12:00 to 13:00</div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-4 font-weight-bold">A reserved vehicle</div>
                            <div class="col-md-8">A reserved vehicle</div>
                        </div>
                        <div class="row py-2">
                            <div class="col-md-4 font-weight-bold">Website</div>
                            <div class="col-md-8">www.yourdomain.com</div>
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
                <hr>
            </div>
            </div>
        </section>

        <!-- Hot deal Grid -->
        <section class="bg-white mt-5">
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
                    <!-- card start -->
                    <div class="card">
                    <div class="brand-name"></div>
                    <div class="card-img">
                        <img src="{{ asset('car-web/img/Cars/1.jpg') }}" class="img-fluid" alt="alt">
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
                        <div class="meta">2006/2013 | 17,820km | Gasoline</div>
                        <div class="favorite">
                            <i class="icon-heart"></i>
                        </div>
                        </div>
                    </div>

                    <div class="card-body shadow">
                        <div class="card-description">
                        <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
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

        <!-- Hot deal Grid -->
        <section class="bg-white">
            <div class="container">
            <div class="row">
                <div class="section-title">
                <h2>Similar price</h2>
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
                        <img src="{{ asset('car-web/img/Cars/1.jpg') }}" class="img-fluid" alt="alt">
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
                        <div class="meta">2006/2013 | 17,820km | Gasoline</div>
                        <div class="favorite">
                            <i class="icon-heart"></i>
                        </div>
                        </div>
                    </div>

                    <div class="card-body shadow">
                        <div class="card-description">
                        <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
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

        @include('themes.car-web.includes.footer')

        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('car-web/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('car-web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('car-web/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('car-web/vendor/owl.carousel.thumbs/owl.carousel2.thumbs.min.js') }}"></script>

        <script src="{{ asset('car-web/js/script.min.js') }}"></script>

        @yield('script')
    </body>

</html>
