@extends('layouts.admin')

@section('load')
	<!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/styling/switch.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="/assets/js/pages/form_validation.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="/assets/js/core/app.js"></script>
	<script type="text/javascript" src="/assets/js/pages/form_validation.js"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Profile Edit</span></h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="/"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="/users">Profiles</a></li>
        <li><a href="/users/{{ $user->id }}">Detail</a></li>
        <li class="active">Edit</li>
    </ul>

    <ul class="breadcrumb-elements">
        <li><a href="#"><i class="icon-comment-discussion position-left"></i> Link</a></li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-gear position-left"></i>
                Dropdown
                <span class="caret"></span>
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
                <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
            </ul>
        </li>
    </ul>
</div>
<!-- /page header -->
@endsection

@section('content')

<!-- Grid -->
<div class="row">
    <div class="col-md-12">

        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Edit Profile Detail</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body">

                @if(Session::has('success'))
                <div class="alert alert-success no-border">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                    {{ session('success') }}
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger no-border">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                    {{ session('error') }}
                </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                        {{ $error }}
                    </div>
                    @endforeach
                @endif

                <form method="post" class="form-horizontal form-validate-jquery" action="/users/{{ $user->id }}" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-lg-2">Username</label>
                        <div class="col-lg-10">
                            <input name="username" type="text" class="form-control" value="{{ $user->username }}" placeholder="e.g. user123, john_doe...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input id="email" name="email" type="email" class="form-control" value="{{ $user->email }}" placeholder="e.g. user@example.com...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Name</label>
                        <div class="col-lg-10">
                            <input name="name" type="text" class="form-control" value="{{ $user->name }}" placeholder="e.g. John Doe...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Avatar</label>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img id="avatar" src="{{ ($user->avatar)?'/storage/'.$user->avatar:'/assets/images/placeholder.jpg'}}" class="img-circle img-md"/>
                                </div>
                                <div class="col-lg-8">
                                    <input type="file" name="avatar" class="file-styled form-control" onchange="readURL(this);"></div>
                                </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Language</label>
                        <div class="col-lg-10">
                            <select name="language" class="form-control" value="{{ $user->language }}">
                                <option value="en" selected="{{ $user->language == 'en' }}">en</option>
                                <option value="mn" selected="{{ $user->language == 'mn' }}">mn</option>
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="col-lg-2">
                            <div class="checkbox checkbox-left">
                                <label>
                                    <input id="password_checked" name="password_checked" type="checkbox" class="styled" onchange="toggle_password_form(this)">
                                    Change Password?
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">New password</label>
                        <div class="col-lg-10">
                            <input id="new_password" name="new_password" type="password" class="form-control" disabled="true" placeholder="Minimum 8 characters allowed">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Retype New Password</label>
                        <div class="col-lg-10">
                            <input id="new_password2" name="new_password2" type="password" class="form-control" disabled="true" placeholder="Retype password">
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="button" class="btn btn-default" onclick="cancel()">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>
</div>
<!-- /grid -->


@endsection

@section('script')
<script>

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

function cancel() {
    window.history.back();
}

function toggle_password_form(checkbox) {
    var toggle = checkbox.checked;
    $('#new_password').val('');
    $('#new_password2').val('');
    $('#new_password').attr('disabled', !toggle);
    $('#new_password2').attr('disabled', !toggle);
}

</script>
@endsection
