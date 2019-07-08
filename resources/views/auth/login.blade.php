@extends('themes.limitless.layouts.login')

@section('title', 'Login')

@section('load')

@endsection

@section('content')
<div class="content">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                <h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
            </div>

            <div class="form-group has-feedback has-feedback-left">
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

            <div class="form-group has-feedback has-feedback-left">
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
    </form>
    @include('themes.limitless.includes.footer')
</div>
@endsection
