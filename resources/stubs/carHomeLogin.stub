@extends('themes.car-web.layouts.default')
@section('load')

@endsection
@section('title')

@endsection

@section('content')
    <!-- Masthead -->
    <header class="masthead text-center">
        <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="hero-slider owl-carousel owl-theme">

                            @banners([{"field":"location_id", "key":1}])
                            @php
                                $bannerList=json_decode($banners);
                            @endphp
                            @if(count($bannerList) > 0)
                                @foreach($bannerList as $bnr)
                                    <div class="slider-item">
                                        <div class="slider-img animated slideInLeft" style="bottom: 0; left: -50px;">
                                            <a href="{{$bnr->link}}" target="_blank">
                                                <img src="{{$bnr->banner}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="slider-item">
                                    <div class="slider-text animated slideInLeft" style="top: 0; left: 100px">
                                        <h1>Зээлийн хүү</h1>
                                    </div>
                                    <div class="slider-text animated slideInLeft slider-highlight"
                                         style="top: 50px; left: 50px">3%
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
                                <div class="card-header px-5 pt-5 pb-3 mb-3">
                                    <h1>Car dealer login</h1>
                                </div>
                                <div class="col-12 p-5">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group mb-3 text-left form-group-feedback form-group-feedback-left">
                                            <span class="font-weight-bold">Username</span>

                                            <input class="form-control mt-2 @error('name') is-invalid @enderror" id="username" type="text" placeholder="Username" name="username" value="{{ old('username', env('APP_ENV') == 'development' ? 'admin' : '') }}" required autocomplete="username" autofocus>
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group text-left">
                                            <span class="font-weight-bold">Password</span>
                                            <input id="password" type="password" class="form-control mt-2 @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ env('APP_ENV') == 'development' ? 'admin' : '' }}" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn col-12 btn-danger btn-lg btn-round shadow mt-4 mb-3">Login</button>
                                    </form>
                                    <a data-toggle="modal" data-target="#myModal">Forget password</a>
                                    <div class="col-12 mt-5">
                                        <button type="button" class="btn bg-secondary col-9 btn-default btn-lg btn-round mt-4">Sign up</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </header>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Forget password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body mt-4">
                    <form method="POST" >
                        @csrf
                        <div class="form-group mb-3 text-left form-group-feedback form-group-feedback-left">
                            <span class="font-weight-bold">E-mail</span>

                            <input class="form-control mt-2 @error('email') is-invalid @enderror" id="email" type="text" placeholder="E-mail" name="email" value="{{ old('username', env('APP_ENV') == 'development' ? 'admin' : '') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn col-12 btn-danger btn-lg btn-round shadow mt-4 mb-5">Recover password</button>
                        <a class="" data-dismiss="modal">Login</a>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $('.scrollDown').click(function(event){
            // Preventing default action of the event
            event.preventDefault();
            // Getting the height of the document
            var n = $(document).height();
            $('html, body').animate({ scrollTop: 1200 }, 400);
        });
    </script>
@endsection
