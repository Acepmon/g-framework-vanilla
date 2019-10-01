@extends('themes.limitless.layouts.login')

@section('title', __('Reset Password'))

@section('load')

@endsection

@section('content')
<!-- Content area -->
<div class="content d-flex justify-content-left align-items-center">

    <!-- Password recovery form -->
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="card mb-0 wmin-sm-300">
            <div class="card-body">
                <div class="text-center mb-3">
                    <i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                    <h5 class="mb-0">{{ __('Reset Password') }}</h5>
                    <span class="d-block text-muted">We'll send you instructions in email</span>
                </div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="form-group form-group-feedback form-group-feedback-right">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    <div class="form-control-feedback">
                        <i class="icon-mail5 text-muted"></i>
                    </div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary"><i class="icon-spinner11 mr-2"></i> {{ __('Send Password Reset Link') }}</button>
            </div>
        </div>
    </form>
    <!-- /password recovery form -->

</div>
<!-- /content area -->

@endsection
