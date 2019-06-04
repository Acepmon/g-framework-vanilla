@extends('layouts.login')
@section('load')
	<script type="text/javascript" src="/assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="/assets/js/pages/form_validation.js"></script>
@endsection
@section('content')


<!-- Content area -->
<div class="content">

    <!-- Advanced login -->
    <form method="POST" action="{{ route('register') }}" class="form-validate-jquery" enctype="multipart/form-data">
        @csrf
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                <h5 class="content-group">Create account <small class="display-block">All fields are required</small></h5>
            </div>

            <div class="content-divider text-muted form-group"><span>Your credentials</span></div>

            <div class="form-group has-feedback has-feedback-left">
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

            <div class="form-group has-feedback has-feedback-left">
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
            <div class="form-group has-feedback has-feedback-left">
                <input id="password-confirm" type="password" class="form-control" placeholder="Repeat password" name="password_confirmation" required autocomplete="new-password" autofocus>
                <div class="form-control-feedback">
                    <i class="icon-user-lock text-muted"></i>
                </div>
            </div>

            <div class="content-divider text-muted form-group"><span>Your profile</span></div>

            <div class="form-group has-feedback has-feedback-left">
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

            <div class="form-group has-feedback has-feedback-left">
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

            <div class="form-group has-feedback has-feedback-left">
                <div class="row">
                    <div class="col-lg-2">
                        <img id="avatar_view" src="/assets/images/placeholder.jpg" class="img-circle img-md"/>
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
            </div>

            <div class="form-group has-feedback has-feedback-left">
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
