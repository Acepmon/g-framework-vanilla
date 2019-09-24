@extends('themes.limitless.layouts.login')
@section('load')
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/validation/validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switch.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/pages/form_validation.js') }}"></script>
@endsection
@section('content')


<!-- Content area -->
<div class="content d-flex justify-content-center align-items-center">

    <!-- Advanced login -->
    <form class="login-form" method="POST" action="{{ route('register') }}" class="form-validate-jquery" enctype="multipart/form-data">
        @csrf
        <div class="card card-body login-form">
            <div class="text-center mb-3">
                <i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
                <h5 class="mb-0">Create account</h5>
                <span class="d-block text-muted">All fields are required</span>
            </div>

            <div class="content-divider text-muted form-group"><span>Your credentials</span></div>

            <div class="form-group form-group-feedback form-group-feedback-left">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                <span class="invalid-feedback validation-error-label" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="form-control-feedback">
                    <i class="icon-user-check text-muted"></i>
                </div>
                <!--span class="help-block text-danger"><i class="icon-cancel-circle2 position-left"></i> This username is already taken</span-->
            </div>

            <div class="form-group form-group-feedback form-group-feedback-left">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Create password" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                @error('password')
                <span class="invalid-feedback validation-error-label" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="form-control-feedback">
                    <i class="icon-user-lock text-muted"></i>
                </div>
            </div>
            <div class="form-group form-group-feedback form-group-feedback-left">
                <input id="password-confirm" type="password" class="form-control" placeholder="Repeat password" name="password_confirmation" required autocomplete="new-password" autofocus>
                <div class="form-control-feedback">
                    <i class="icon-user-lock text-muted"></i>
                </div>
            </div>

            <div class="content-divider text-muted form-group"><span>Your profile</span></div>

            <div class="form-group form-group-feedback form-group-feedback-left">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Your email" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback validation-error-label" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="form-control-feedback">
                    <i class="icon-mention text-muted"></i>
                </div>
            </div>

            <div class="form-group form-group-feedback form-group-feedback-left">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{ old('name') }}" autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback validation-error-label" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <div class="form-control-feedback">
                    <i class="icon-user-check text-muted"></i>
                </div>
            </div>

            {{-- <div class="form-group form-group-feedback form-group-feedback-left">
                <div class="row">
                    <div class="col-lg-2">
                        <img id="avatar_view" src="{{ asset('limitless/images/placeholder.jpg') }}" class="img-circle img-md"/>
                    </div>
                    <div class="col-lg-10">
                        <input type="file" name="avatar" class="file-styled form-control" onchange="readURL(this);" value="{{Request::old('avatar')}}">
                    </div>
                </div>
                @error('avatar')
                <span class="invalid-feedback validation-error-label" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div> --}}

            {{-- <div class="form-group form-group-feedback form-group-feedback-left">
                <select name="language" class="form-control" value="{{Request::old('language')}}">
                    <option value="en" selected="{{ Request::old('language') == 'en' }}">en</option>
                    <option value="mn" selected="{{ Request::old('language') == 'mn' }}">mn</option>
                </select>
                @error('language')
                <span class="invalid-feedback validation-error-label" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-control-feedback">
                    <i class="icon-flag3 text-muted"></i>
                </div>
            </div> --}}

            <div class="form-group">
                <button type="submit" class="btn bg-teal btn-block btn-lg">Register</button>
            </div>

            <div class="form-group text-center text-muted content-divider">
                <span class="px-2">or register with</span>
            </div>

            <div class="form-group text-center">
                <a href="{{ route('login.provider', 'facebook') }}" class="btn btn-outline bg-indigo border-indigo text-indigo btn-icon rounded-round border-2"><i class="icon-facebook"></i></a>
                <a href="{{ route('login.provider', 'google') }}" class="btn btn-outline bg-pink-300 border-pink-300 text-pink-300 btn-icon rounded-round border-2 ml-2"><i class="icon-google"></i></a>
            </div>

            <div class="form-group text-center text-muted content-divider">
                <span class="px-2">Already have an account?</span>
            </div>

            <a href="{{ route('login') }}" class="btn btn-light btn-block">Back to Login</a>
        </div>
    </form>
    <!-- /advanced login -->



</div>
<!-- /content area -->

    <!-- Footer -->
    @include('themes.limitless.includes.footer')
    <!-- /footer -->
@endsection

@section('script')
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar_view')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
