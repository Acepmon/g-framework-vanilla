@extends('themes.limitless.layouts.default')

@section('load')
	<!-- Theme JS files -->
    <script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/validation/validate.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switch.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/styling/uniform.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/demo_pages/form_validation.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">User Details</span></h4>
    </div>

    <div class="header-elements">
        <div class="heading-btn-group">
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
        </div>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="{{ route('admin.menus.index') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a></li>
            <a href="{{ route('admin.profile.index') }}" class="breadcrumb-item">Users</a>
            <span class="breadcrumb-item active">Detail</span>
        </div>
    </div>

    <div class="header-elements d-none">
        <div class="breadcrumb justify-content-center">
            <a href="#" class="breadcrumb-elements-item"><i class="icon-comment-discussion mr-2"></i>Link</a>
            <div class="breadcrumb-elements-item dropdown p-0">
                <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="icon-gear mr-2"></i>Dropdown</a>
                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-84px, 40px, 0px);">
                    <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                    <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<div class="d-md-flex align-items-md-start">
    @include('admin.profile.includes.sidebar')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

            <!-- Tab content -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Edit User Detail</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">

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

                            <form method="post" class="form-horizontal form-validate-jquery" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Username</label>
                                    <div class="col-lg-10">
                                        <input name="username" type="text" class="form-control" value="{{ Auth::user()->username }}" placeholder="e.g. user123, john_doe...">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Email</label>
                                    <div class="col-lg-10">
                                        <input id="email" name="email" type="email" type="text" class="form-control" value="{{ Auth::user()->email }}" placeholder="e.g. user@example.com...">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Name</label>
                                    <div class="col-lg-10">
                                        <input name="name" type="text" class="form-control" value="{{ Auth::user()->name }}" placeholder="e.g. John Doe...">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Avatar</label>
                                    <div class="col-lg-10 row">
                                            <img id="avatar" src="{{ (Auth::user()->avatar)?'/storage/'.Auth::user()->avatar:asset('limitless/bootstrap4/images/placeholder.jpg')}}" class="rounded-circle mr-2" height="34"/>

                                            <div class="uniform-uploader col-lg-11"><input type="file" class="form-control-uniform" onchange="readURL(this);" data-fouc=""><span class="filename" style="user-select: none;">No file selected</span><span class="action btn btn-light" style="user-select: none;">Choose File</span></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Language</label>
                                    <div class="col-lg-10">
                                        <select name="language" class="form-control" value="{{ Auth::user()->language }}">
                                            <option value="en" selected="{{ Auth::user()->language == 'en' }}">en</option>
                                            <option value="mn" selected="{{ Auth::user()->language == 'mn' }}">mn</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Groups</label>
                                    <div class="col-lg-10">
                                        <select name="groups[]" id="groups" data-placeholder="Select Groups..." multiple="multiple" class="select">
                                            @foreach($groups as $group)
                                                @php $selected = False @endphp
                                                @foreach(Auth::user()->groups as $user_group)
                                                    @php $selected = ($selected || $user_group->id == $group->id) @endphp
                                                @endforeach
                                                <option value="{{ $group->id }}" {{ $selected?'selected':'' }}>{{ $group->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <div class="uniform-checker">
                                                        <input id="password_checked" name="password_checked" type="checkbox" class="form-check-input-styled" onchange="toggle_password_form(this)" data-fouc="">
                                                </div>
                                                Change Password?
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">New password</label>
                                    <div class="col-lg-10">
                                        <input id="new_password" name="new_password" type="password" class="form-control" disabled="true" placeholder="Minimum 6 characters allowed">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label col-lg-2">Retype New Password</label>
                                    <div class="col-lg-10">
                                        <input id="new_password2" name="new_password2" type="password" class="form-control" disabled="true" placeholder="Retype password">
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

            <!-- /tab content -->

            </div>
        </div>
    </div>
</div>
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

function toggle_password_form(checkbox) {
    var toggle = checkbox.checked;
    $('#new_password').val('');
    $('#new_password2').val('');
    $('#new_password').attr('disabled', !toggle);
    $('#new_password2').attr('disabled', !toggle);
}

</script>
@endsection
