@extends('themes.car-web.layouts.absolute')
@section('load')

@endsection
@section('title')

@endsection

@section('content')
    <!-- Masthead -->
    <header class="masthead text-center">
        <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 d-flex align-items-end">
                        <div class="hero-slider owl-carousel owl-theme">
                            @banners([{"field":"location_id", "key":1}])
                            @if(count($banners) > 0)
                                @foreach($banners as $bnr)
                                    <div class="slider-item">
                                        <a href="{{$bnr->link}}" target="_blank">
                                            <img src="{{$bnr->banner}}" alt="">
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <div class="slider-item">
                                    <img src="{{asset('car-web/img/slider-1.png')}}" alt="">
                                </div>
                                <div class="slider-item">
                                    <img src="{{asset('car-web/img/slider-2.png')}}" alt="" class="img-fluid">
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="col-md-5" style="z-index: 1">
                        <div class="card masthead-search shadow-lg-3d  pl-5 pr-5">
                            <div class="">
                                <div class="card-header px-5 pt-5 pb-3 mb-3">
                                    <h1>Car dealer login</h1>
                                </div>
                                <div class="col-12 p-5">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group mb-3 text-left form-group-feedback form-group-feedback-left">
                                            <span class="font-weight-bold">Username</span>

                                            <input class="form-control mt-2 @error('username') is-invalid @enderror" id="username" type="text" placeholder="Username" name="username" value="{{ old('username', env('APP_ENV') == 'development' ? 'admin' : '') }}" required autocomplete="username" autofocus>
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
                                    <a href="#" data-toggle="modal" data-target="#myModal">Forget password</a>
                                    <div class="col-12 mt-5">
                                        <button onclick="window.location.href='/register'" type="button" class="btn btn-light btn-round px-5 py-2 col-9">Sign up</button>
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
                <div class="modal-header text-center">
                    <h4 class="modal-title">Forget password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body mt-4 pr-lg-5 pl-lg-5 text-center">
                    <form method="POST">
                        @csrf
                        <div class="form-group mb-3 text-left form-group-feedback form-group-feedback-left">
                            <span class="font-weight-bold">Email address</span>

                            <input class="form-control mt-2 @error('email') is-invalid @enderror" id="email" type="text" placeholder="Email" name="email" value="{{ old('username', env('APP_ENV') == 'development' ? 'admin' : '') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-submit col-12 btn-danger btn-lg btn-round shadow mt-4 mb-4">Recover password</button>
                        <a href="#" class="text-dark" data-dismiss="modal">Login</a>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    {{--<a type="button" href="/register" class="btn btn-round btn-default bg-secondary mt-5 col-md-6 mb-5">sign up</a>--}}
                    <button onclick="window.location.href='/register'" type="button" class="btn btn-light btn-round px-5 py-2 col-9 mb-5">Sign up</button>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="mailSuccess">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h4 class="modal-title">Forget password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body mt-4 pr-lg-5 pl-lg-5 text-center">
                   Mail has been sent!
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-submit").click(function(e){
            e.preventDefault();

            var email = $("input[name=email]").val();

            $.ajax({
                type:'POST',
                url: "{{ route('password.email') }}",
                data:{email:email},
                success:function(data){
                    $('#myModal').modal('hide');
                    $('#mailSuccess').modal('show');

                }
            }).fail(function(data){
                //$("#demo-spinner").css({'display': 'none'});
                console.error("FAIL!");
                //console.error(err);
            });



        });

    </script>
@endsection
