@extends('admin.layouts.default')

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

	<script type="text/javascript" src="/assets/js/pages/form_validation.js"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User Details</span></h4>
    </div>

    <div class="heading-elements">
        <div class="heading-btn-group">
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-bars-alt text-primary"></i><span>Statistics</span></a>
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calculator text-primary"></i> <span>Invoices</span></a>
            <a href="#" class="btn btn-link btn-float has-text"><i class="icon-calendar5 text-primary"></i> <span>Schedule</span></a>
        </div>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="/"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="active">Detail</li>
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
<div class="has-detached-left">
    @include('admin.users.admin.includes.sidebar')

    <!-- Detached content -->
    <div class="container-detached">
        <div class="content-detached">

            <!-- Tab content -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="user">

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Edit User Detail</h5>
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

                            <form method="post" class="form-horizontal form-validate-jquery" action="{{ route('admin.users.update', ['id' =>  $user->id]) }}" enctype="multipart/form-data">
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
                                        <input id="email" name="email" type="email" type="text" class="form-control" value="{{ $user->email }}" placeholder="e.g. user@example.com...">
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
                                        <div class=" media-left">
                                            <img id="avatar" src="{{ ($user->avatar)?'/storage/'.$user->avatar:'/assets/images/placeholder.jpg'}}" class="img-circle img-md"/>
                                        </div>
                                        <div class="media-body">
                                            <input type="file" name="avatar" class="file-styled form-control" onchange="readURL(this);">
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

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Groups</label>
                                    <div class="col-lg-10">
                                        <select name="groups[]" id="groups" data-placeholder="Select Groups..." multiple="multiple" class="select">
                                            @foreach($groups as $group)
                                                @php $selected = False @endphp
                                                @foreach($user->groups as $user_group)
                                                    @php $selected = ($selected || $user_group->id == $group->id) @endphp
                                                @endforeach
                                                <option value="{{ $group->id }}" {{ $selected?'selected':'' }}>{{ $group->title }}</option>
                                            @endforeach
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
                                        <input id="new_password" name="new_password" type="password" class="form-control" disabled="true" placeholder="Minimum 6 characters allowed">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-lg-2">Retype New Password</label>
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

                </div>

                <div class="tab-pane fade" id="settings">

                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h6 class="panel-title">Settings</h6>
                        </div>

                        <table class="table datatable-basic">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Key</th>
                                    <th>Value</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->settings as $setting)
                                <tr>
                                    <td>{{ $setting->id }}</td>
                                    <td>{{ $setting->key }}</td>
                                    <td>{{ $setting->value }}</td>
                                    <!---->
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>

                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="/users/{{ $setting->id }}/edit"><i class="icon-pencil"></i> Edit</a></li>
                                                    <li><a href="#" data-toggle="modal" data-target="#modal_theme_danger" onclick="choose_setting({{ $setting->id }})"><i class="icon-trash"></i> Delete</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /tab content -->

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
