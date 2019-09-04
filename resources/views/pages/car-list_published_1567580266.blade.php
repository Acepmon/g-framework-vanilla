@extends('themes.car-web.layouts.default')

@section('title')
Car dealer
@endsection

@section('load')
<link href="{{ asset('car-web/vendor/bootstrap-slider/css/bootstrap-slider.min.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="bg-page-header"></div>

<section class="section detail-page">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="left-bar-title">
          Search Vehicle <i class="fab fa fa-search"></i>
        </div>
          <div class="accordion shadow-soft-blue" id="accordionExample">
              <div class="card">
                <div class="accordian-head" id="carType">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#car-type" aria-expanded="true" aria-controls="car-type">
                        Car type<i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
            
                <div id="car-type" class="collapse show" aria-labelledby="carType" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                      <div class="custom-control custom-radio">
                          <input type="radio" id="sedan" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label  d-flex justify-content-between" for="sedan">Sedan <div class="text-muted">65</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="suv" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="suv">SUV <div class="text-muted">128</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="sport" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label  d-flex justify-content-between" for="sport">Sport <div class="text-muted">98</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="trucks" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label  d-flex justify-content-between" for="trucks">Trucks <div class="text-muted">7</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="vans" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label  d-flex justify-content-between" for="vans">Vans <div class="text-muted">154</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="bus" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label  d-flex justify-content-between" for="bus">Bus <div class="text-muted">25</div></label>
                        </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="accordian-head" id="model">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#manufacture" aria-expanded="false" aria-controls="manufacture">
                        Manufacturer / Model <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="manufacture" class="collapse" aria-labelledby="model" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                      <div class="custom-control custom-radio">
                          <input type="radio" id="Toyota" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Toyota">Toyota <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Lexus" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Lexus">Lexus <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Nissan" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Nissan">Nissan <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Mercedes benz" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Mercedes benz">Mercedes benz <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Volkswagen" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Volkswagen">Volkswagen <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Mini" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Mini">Mini <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Audi" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Audi">Audi <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="BMW" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="BMW">BMW <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Ford" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Ford">Ford <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Land Rover" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Land Rover">Land Rover <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Daihatsu" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Daihatsu">Daihatsu <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Dodge" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Dodge">Dodge <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Honda" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Honda">Honda <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Hyundai" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Hyundai">Hyundai <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Kia" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Kia">Kia <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Jeep" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Jeep">Jeep <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Subaru" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Subaru">Subaru <div class="text-muted">0</div></label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="Suzuki" name="carTyoe" class="custom-control-input">
                          <label class="custom-control-label d-flex justify-content-between" for="Suzuki">Suzuki <div class="text-muted">0</div></label>
                        </div>
                  </div>
                </div>
              </div>
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
              <div class="card">
                <div class="accordian-head" id="manufacturer-accordian">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#manufacturer" aria-expanded="false" aria-controls="manufacturer">
                        Manufacturer  <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="manufacturer" class="collapse" aria-labelledby="manufacturer-accordian" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="accordian-head" id="distance">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#distance" aria-expanded="false" aria-controls="distance">
                        Distance driven <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="distance" class="collapse" aria-labelledby="distance" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="accordian-head" id="price-accordian">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#price" aria-expanded="false" aria-controls="price">
                        Price / Installment <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="price" class="collapse" aria-labelledby="price-accordian" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="accordian-head" id="color-accordian">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#color" aria-expanded="false" aria-controls="color">
                        Color <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="color" class="collapse" aria-labelledby="color-accordian" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="accordian-head" id="fuel-accordian">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#fuel" aria-expanded="false" aria-controls="fuel">
                        Fuel <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="fuel" class="collapse" aria-labelledby="fuel-accordian" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="accordian-head" id="transmission-accordian">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#transmission" aria-expanded="false" aria-controls="transmission">
                        Transmission <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="transmission" class="collapse" aria-labelledby="transmission-accordian" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="accordian-head" id="option-accordian">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#option" aria-expanded="false" aria-controls="option">
                        Option <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="option" class="collapse" aria-labelledby="option-accordian" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="accordian-head" id="accident-accordian">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#accident" aria-expanded="false" aria-controls="accident">
                        An accident <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="accident" class="collapse" aria-labelledby="accident-accordian" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="accordian-head" id="passenger-accordian">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#passenger" aria-expanded="false" aria-controls="passenger">
                        Passenger <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="passenger" class="collapse" aria-labelledby="passenger-accordian" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="accordian-head" id="steeringWheel-accordian">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#sterringWheel" aria-expanded="false" aria-controls="sterringWheel">
                        Steering wheel <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="sterringWheel" class="collapse" aria-labelledby="steeringWheel-accordian" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="accordian-head" id="area-accordian">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#area" aria-expanded="false" aria-controls="area">
                        Area <i class="fab fa fa-angle-down"></i>
                    </button>
                  </h2>
                </div>
                <div id="area" class="collapse" aria-labelledby="area-accordian" data-parent="#accordionExample">
                  <div class="card-body bg-light">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                  </div>
                </div>
              </div>
              
            </div>
      </div>
      <div class="col-md-9">
          <div class="card shadow-soft-blue page-top-navbar">
                <div class="d-flex justify-content-around">
                  <a class="active" href="#">Importation</a>
                  <a href="#">Used in Mongolia</a>
                </div>
            </div>
              <div class="container">
                <div class="row">
                  <div class="car-list">
                    <!-- card start -->
                    <div class="card">
                      <div class="card-body">
                        <div class="card-img">
                            <img src="{{ asset('car-web/img/Cars/1.jpg') }}" class="img-fluid" alt="alt">
                          </div>
                        <div class="card-description">
                            <div class="card-caption">
                                <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
                                <div class="meta">2006/2013 | 17,820km</div>
                                  <div class="price">12 Сая ₮</div>
                                <div class="favorite">
                                  <i class="icon-heart"></i> Add to interest list
                                </div>
                              </div>
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

                              <div class="tag">
                                  <a href="#">1 person</a>
                                  <a href="#">In Garage</a>
                                  <a href="#">4 Season tire</a>
                                  <a href="#">Bank Loan</a>
                                </div>
                            </div>

                        </div>
        
                      </div>
        
                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card">
                      <div class="card-body">
                        <div class="card-img">
                            <img src="{{ asset('car-web/img/Cars/2.jpg') }}" class="img-fluid" alt="alt">
                          </div>
                        <div class="card-description">
                            <div class="card-caption">
                                <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
                                <div class="meta">2006/2013 | 17,820km</div>
                                  <div class="price">12 Сая ₮</div>
                                <div class="favorite">
                                  <i class="icon-heart"></i> Add to interest list
                                </div>
                              </div>
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

                              <div class="tag">
                                  <a href="#">1 person</a>
                                  <a href="#">In Garage</a>
                                  <a href="#">4 Season tire</a>
                                  <a href="#">Bank Loan</a>
                                </div>
                            </div>

                        </div>
        
                      </div>
        
                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card">
                      <div class="card-body">
                        <div class="card-img">
                            <img src="{{ asset('car-web/img/Cars/3.jpg') }}" class="img-fluid" alt="alt">
                          </div>
                        <div class="card-description">
                            <div class="card-caption">
                                <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
                                <div class="meta">2006/2013 | 17,820km</div>
                                  <div class="price">12 Сая ₮</div>
                                <div class="favorite">
                                  <i class="icon-heart"></i> Add to interest list
                                </div>
                              </div>
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

                              <div class="tag">
                                  <a href="#">1 person</a>
                                  <a href="#">In Garage</a>
                                  <a href="#">4 Season tire</a>
                                  <a href="#">Bank Loan</a>
                                </div>
                            </div>

                        </div>
        
                      </div>
        
                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card">
                      <div class="card-body">
                        <div class="card-img">
                            <img src="{{ asset('car-web/img/Cars/4.jpg') }}" class="img-fluid" alt="alt">
                          </div>
                        <div class="card-description">
                            <div class="card-caption">
                                <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
                                <div class="meta">2006/2013 | 17,820km</div>
                                  <div class="price">12 Сая ₮</div>
                                <div class="favorite">
                                  <i class="icon-heart"></i> Add to interest list
                                </div>
                              </div>
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

                              <div class="tag">
                                  <a href="#">1 person</a>
                                  <a href="#">In Garage</a>
                                  <a href="#">4 Season tire</a>
                                  <a href="#">Bank Loan</a>
                                </div>
                            </div>

                        </div>
        
                      </div>
        
                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card">
                      <div class="card-body">
                        <div class="card-img">
                            <img src="{{ asset('car-web/img/Cars/5.jpg') }}" class="img-fluid" alt="alt">
                          </div>
                        <div class="card-description">
                            <div class="card-caption">
                                <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
                                <div class="meta">2006/2013 | 17,820km</div>
                                  <div class="price">12 Сая ₮</div>
                                <div class="favorite">
                                  <i class="icon-heart"></i> Add to interest list
                                </div>
                              </div>
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

                              <div class="tag">
                                  <a href="#">1 person</a>
                                  <a href="#">In Garage</a>
                                  <a href="#">4 Season tire</a>
                                  <a href="#">Bank Loan</a>
                                </div>
                            </div>

                        </div>
        
                      </div>
        
                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card">
                      <div class="card-body">
                        <div class="card-img">
                            <img src="{{ asset('car-web/img/Cars/6.jpg') }}" class="img-fluid" alt="alt">
                          </div>
                        <div class="card-description">
                            <div class="card-caption">
                                <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
                                <div class="meta">2006/2013 | 17,820km</div>
                                  <div class="price">12 Сая ₮</div>
                                <div class="favorite">
                                  <i class="icon-heart"></i> Add to interest list
                                </div>
                              </div>
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

                              <div class="tag">
                                  <a href="#">1 person</a>
                                  <a href="#">In Garage</a>
                                  <a href="#">4 Season tire</a>
                                  <a href="#">Bank Loan</a>
                                </div>
                            </div>

                        </div>
        
                      </div>
        
                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card">
                      <div class="card-body">
                        <div class="card-img">
                            <img src="{{ asset('car-web/img/Cars/7.jpg') }}" class="img-fluid" alt="alt">
                          </div>
                        <div class="card-description">
                            <div class="card-caption">
                                <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
                                <div class="meta">2006/2013 | 17,820km</div>
                                  <div class="price">12 Сая ₮</div>
                                <div class="favorite">
                                  <i class="icon-heart"></i> Add to interest list
                                </div>
                              </div>
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

                              <div class="tag">
                                  <a href="#">1 person</a>
                                  <a href="#">In Garage</a>
                                  <a href="#">4 Season tire</a>
                                  <a href="#">Bank Loan</a>
                                </div>
                            </div>

                        </div>
        
                      </div>
        
                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card">
                      <div class="card-body">
                        <div class="card-img">
                            <img src="{{ asset('car-web/img/Cars/8.jpg') }}" class="img-fluid" alt="alt">
                          </div>
                        <div class="card-description">
                            <div class="card-caption">
                                <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
                                <div class="meta">2006/2013 | 17,820km</div>
                                  <div class="price">12 Сая ₮</div>
                                <div class="favorite">
                                  <i class="icon-heart"></i> Add to interest list
                                </div>
                              </div>
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

                              <div class="tag">
                                  <a href="#">1 person</a>
                                  <a href="#">In Garage</a>
                                  <a href="#">4 Season tire</a>
                                  <a href="#">Bank Loan</a>
                                </div>
                            </div>

                        </div>
        
                      </div>
        
                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card">
                      <div class="card-body">
                        <div class="card-img">
                            <img src="{{ asset('car-web/img/Cars/8.jpg') }}" class="img-fluid" alt="alt">
                          </div>
                        <div class="card-description">
                            <div class="card-caption">
                                <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
                                <div class="meta">2006/2013 | 17,820km</div>
                                  <div class="price">12 Сая ₮</div>
                                <div class="favorite">
                                  <i class="icon-heart"></i> Add to interest list
                                </div>
                              </div>
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

                              <div class="tag">
                                  <a href="#">1 person</a>
                                  <a href="#">In Garage</a>
                                  <a href="#">4 Season tire</a>
                                  <a href="#">Bank Loan</a>
                                </div>
                            </div>

                        </div>
        
                      </div>
        
                    </div>
                    <!-- card end -->
                    <!-- card start -->
                    <div class="card">
                      <div class="card-body">
                        <div class="card-img">
                            <img src="{{ asset('car-web/img/Cars/8.jpg') }}" class="img-fluid" alt="alt">
                          </div>
                        <div class="card-description">
                            <div class="card-caption">
                                <div class="card-title">Santa fe The Prime diesel 2.0 2wd</div>
                                <div class="meta">2006/2013 | 17,820km</div>
                                  <div class="price">12 Сая ₮</div>
                                <div class="favorite">
                                  <i class="icon-heart"></i> Add to interest list
                                </div>
                              </div>
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

                              <div class="tag">
                                  <a href="#">1 person</a>
                                  <a href="#">In Garage</a>
                                  <a href="#">4 Season tire</a>
                                  <a href="#">Bank Loan</a>
                                </div>
                            </div>

                        </div>
        
                      </div>
        
                    </div>
                    <!-- card end -->
        
                </div>   
              </div>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination d-flex justify-content-end">
                  <li class="page-item disabled">
                      <a class="page-link" href="#" aria-label="Previous">
                          <span aria-hidden="true">&laquo;</span>
                        </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                      <a class="page-link" href="#" aria-label="Next">
                          <span aria-hidden="true">&raquo;</span>
                        </a>
                  </li>
                </ul>
              </nav>
      </div>
    </div>
  </div>
</section>
@endsection

@section('script')
<script src="{{ asset('car-web/vendor/bootstrap-slider/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('car-web/vendor/owl.carousel.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
@endsection

