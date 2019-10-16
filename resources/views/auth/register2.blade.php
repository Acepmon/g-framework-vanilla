@extends('themes.car-web.layouts.default')

@section('title', 'Car')

@section('load')

@endsection

@section('content')
<!-- Masthead -->
<div class="bg-page-header"> </div>

<section class="bg-transparent">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card sell-car shadow-soft-blue">
                    <div class="card-header">
                        <div class="step-process sp-3">
                            <div class='progress_inner_step step-1 done'>
                                <label for='step-1'>Agreement</label>
                            </div>
                            <div class='progress_inner_step step-2 active'>
                                <label for='step-2'>Create username & password</label>
                            </div>
                            <div class='progress_inner_step step-3'>
                                <label for='step-3'>Add your information</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pb-5">

                        <form class="maz-form" id="register-form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <input type="text" name="redirectto" value="{{ url('/register-step-3') }}" hidden>
                            <input type="text" name="username" id="username" value="" hidden>
                            <input type="text" name="avatar" id="avatar" value="{{ url(asset(config('system.avatar.default'))) }}" hidden>

                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" name="email" id="email" maxlength="191" class="form-control @error('email') is-invalid @enderror" placeholder="example@mail.com" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" id="name" maxlength="191" class="form-control @error('name') is-invalid @enderror" placeholder="Dorj Pagam" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Type your password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm password:</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" id="millage" placeholder="Confirm your password">
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="social-login">
                                        <div class="social-login-title">
                                            Login with Social network
                                        </div>
                                        <a href="{{ route('login.provider', 'facebook') }}" class="btn btn-facebook btn-round btn-block my-2 py-3 shadow-soft-blue btn-icon-left"><i class="icon-social-facebook"></i> Facebook</a>
                                        <a href="{{ route('login.provider', 'google') }}" class="btn btn-light btn-round btn-block my-2 py-3 shadow-soft-blue btn-icon-left"><i class="icon-social-google"></i> Gmail</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- NEXT PREV BUTTON START -->
                        <div style="float:right;">
                            <a href="{{ url('/register-step-1') }}" class="btn btn-light btn-round px-5 py-2 mr-3" id="prevBtn">Previous</a>
                            <button class="btn btn-danger btn-round shadow-red px-5 py-2" type="button" id="nextBtn" onclick="document.getElementById('register-form').submit()">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pageType-footer">
    <div class="container">
        <div class="row">
            <div class="sell-type-img reg-car">
                <img src="{{ asset('car-web/img/sell-car.png') }}" alt="">
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        var $emailField = $('#email');
        var $usernameField = $('#username');
        function onChange() {
            $usernameField.val($emailField.val());
        };
        $('#email')
            .change(onChange)
            .keyup(onChange);
    });
</script>
@endsection
