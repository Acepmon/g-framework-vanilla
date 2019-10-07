@extends('themes.limitless.layouts.login')

@section('title', 'Login')

@section('load')

@endsection

@section('content')
<div class="content d-flex justify-content-left align-items-center">
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
                    <input id="username" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
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
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>

                <div class="form-group d-flex align-items-center">
                    <div class="form-check mb-0">
                        <label class="form-check-label">
                            <input type="checkbox" name="remember" id="remember" class="form-input-styled" {{ old('remember') ? 'checked' : '' }} data-fouc>
                            Remember Me
                        </label>
                    </div>

                    <a href="{{ route('password.request') }}" class="ml-auto">Forgot password?</a>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </div>

                <div class="form-group text-center text-muted content-divider">
                    <span class="px-2">or sign in with</span>
                </div>

                <div class="form-group text-center">
                    <a href="{{ route('login.provider', 'facebook') }}" class="btn btn-outline bg-indigo border-indigo text-indigo btn-icon rounded-round border-2"><i class="icon-facebook"></i></a>
                    <a href="{{ route('login.provider', 'google') }}" class="btn btn-outline bg-pink-300 border-pink-300 text-pink-300 btn-icon rounded-round border-2 ml-2"><i class="icon-google"></i></a>
                </div>

                <div class="form-group text-center text-muted content-divider">
                    <span class="px-2">Don't have an account?</span>
                </div>

                <div class="form-group">
                    <a href="{{ route('register') }}" class="btn btn-light btn-block">Register</a>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
