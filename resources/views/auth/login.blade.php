@extends('themes.limitless.layouts.login')

@section('title', 'Login')

@section('load')

@endsection

@section('content')
<div class="content d-flex justify-content-center align-items-center">
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="card mb-0">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">Login to your account</h5>
                    <span class="d-block text-muted">Enter your credentials below</span>
                </div>
                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username', env('APP_ENV') == 'development' ? 'admin' : '') }}" required autocomplete="username" autofocus>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>

                <div class="form-group form-group-feedback form-group-feedback-left">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{ env('APP_ENV') == 'development' ? 'admin' : '' }}" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                    <a href="{{ route('register') }}" class="btn btn-default btn-block">Register</a>
                </div>

                <div class="text-center">
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>

@include('themes.limitless.includes.footer')
@endsection
