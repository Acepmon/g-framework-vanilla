@extends('themes.car-web.layouts.default')
@section('load')

@endsection
@section('title')

@endsection

@section('content')
    <!-- Masthead -->
    <header class="masthead text-center">
        <div class="container">
            <div class="w-50 d-inline-block">
                <div class="card masthead-search shadow-lg-3d">
                    <div class="card-header px-5 pt-5 pb-3 mb-3">
                        <h1>Recover password</h1>
                    </div>
                    <div class="col-12 p-5">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group mb-3 text-left form-group-feedback form-group-feedback-left">
                                <span class="font-weight-bold">Email</span>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group text-left">
                                <span class="font-weight-bold">Password</span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group text-left">
                                <span class="font-weight-bold">Password confirm</span>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn col-12 btn-primary btn-lg btn-round shadow mt-4">Save</button>
                        </form>
                        {{--<a class="" href="#">Forget password</a>--}}
                        {{--<div class="col-12 mt-5">--}}
                        {{--<button type="button" class="btn bg-secondary col-9 btn-default btn-lg btn-round mt-4">Sign up</button>--}}
                        {{--</div>--}}

                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
