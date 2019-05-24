@extends('layouts.login')
@section('load')
@section('content')


<!-- Content area -->
<div class="content">

    <!-- Advanced login -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                <h5 class="content-group">Create account <small class="display-block">All fields are required</small></h5>
            </div>

            <div class="content-divider text-muted form-group"><span>Your credentials</span></div>

            <div class="form-group has-feedback has-feedback-left">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Username" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="form-control-feedback">
                    <i class="icon-user-check text-muted"></i>
                </div>
                <span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> This username is already taken</span>
            </div>

            <div class="form-group has-feedback has-feedback-left">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Create password" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="form-control-feedback">
                    <i class="icon-user-lock text-muted"></i>
                </div>
            </div>
            <div class="form-group has-feedback has-feedback-left">
                <input id="password-confirm" type="password" class="form-control" placeholder="Repeat password" name="password_confirmation" required autocomplete="new-password" autofocus>
                <div class="form-control-feedback">
                    <i class="icon-user-lock text-muted"></i>
                </div>
            </div>

            <div class="content-divider text-muted form-group"><span>Your privacy</span></div>

            <div class="form-group has-feedback has-feedback-left">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your email" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="form-control-feedback">
                    <i class="icon-mention text-muted"></i>
                </div>
            </div>
            <button type="submit" class="btn bg-teal btn-block btn-lg">Register <i class="icon-circle-right2 position-right"></i></button>
            <div class="text-center">
                <a href="{{ route('login') }}">back</a>
            </div>
        </div>
    </form>
    <!-- /advanced login -->


    <!-- Footer -->
    @include('includes.footer')
    <!-- /footer -->

</div>
<!-- /content area -->
@endsection
