@extends('themes.limitless.layouts.default')

@section('load')
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/validation/validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/inputs/touchspin.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/select2.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/switch.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('limitless/js/pages/form_validation.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User Create</span></h4>
    </div>

    <div class="heading-elements">
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="/"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="active">Create</li>
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
                <h5 class="panel-title">New User</h5>
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

                <form method="post" class="form-horizontal form-validate-jquery" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-lg-2">Username <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input name="username" required="true" type="text" class="form-control" placeholder="e.g. user123, john_doe..." value="{{Request::old('username')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Email <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input name="email" required="true" type="email" class="form-control" placeholder="e.g. user@example.com..." value="{{Request::old('email')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Password <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input id="password" name="password" required="true" type="password" class="form-control" placeholder="Minimum 8 characters allowed">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Re-password <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input name="password_confirmation" required="true" type="password" class="form-control" placeholder="Retype password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input name="name" required="true" type="text" class="form-control" placeholder="e.g. John Doe..." value="{{Request::old('name')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Avatar</label>
                        <div class="col-lg-10">
                            <div class="media-left">
                                <img id="avatar" src="{{ asset('limitless/images/placeholder.jpg') }}" class="img-circle img-md"/>
                            </div>
                            <div class="media-body">
                                <input type="file" name="avatar" class="file-styled form-control" onchange="readURL(this);" value="{{Request::old('avatar')}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Language <span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <select name="language" class="form-control" value="{{Request::old('language')}}">
                                <option value="en" selected="{{ Request::old('language') == 'en' }}">en</option>
                                <option value="mn" selected="{{ Request::old('language') == 'mn' }}">mn</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Groups</label>
                        <div class="col-lg-10">
                            <select name="groups[]" id="groups" data-placeholder="Select Groups..." multiple="multiple" class="select">
                                @foreach($groups as $group)
                                    @php $selected = False @endphp
                                    @if(Request::old('groups'))
                                        @foreach(Request::old('groups') as $user_group)
                                            @php $selected = ($selected || $user_group == $group->id) @endphp
                                        @endforeach
                                    @endif
                                    <option value="{{ $group->id }}" {{ $selected?'selected':'' }}>{{ $group->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                                <div class="text-left"><a href="{{ route('admin.users.index') }}" class="btn btn-default"><i class="icon-arrow-left52 position-left"></i> Back</a>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="text-right">
                                <button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
                                <button type="submit" class="btn btn-primary">Submit form <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
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

</script>
@endsection
