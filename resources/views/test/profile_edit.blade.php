@extends('layouts.admin')

@section('load')
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
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
        <li><a href="/profiles">Profile</a></li>
        <li><a href="/profiles/{{ $profile->user->id }}">Detail</a></li>
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

                <form method="post" class="form-horizontal" action="/profiles/{{ $profile->user->id }}" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-lg-2">Username</label>
                        <div class="col-lg-10">
                            <input name="username" type="text" class="form-control" placeholder="{{ $profile->user->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input name="email" type="text" class="form-control" placeholder="{{ $profile->email }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Name</label>
                        <div class="col-lg-10">
                            <input name="name" type="text" class="form-control" placeholder="{{ $profile->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Nickname</label>
                        <div class="col-lg-10">
                            <input name="nickname" type="text" class="form-control" placeholder="{{ $profile->nickname }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Avatar</label>
                        <div class="col-lg-10">
                            <input type="file" name="avatar" class="file-styled uploader form-control">
                            <!-- <input name="avatar" type="text" class="form-control" placeholder="{{ $profile->avatar }}"> -->
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Language</label>
                        <div class="col-lg-10">
                            <select name="language" class="form-control" value="{{ $profile->language }}">
                                <option value="en" selected="{{ $profile->language == 'en' }}">en</option>
                                <option value="mn" selected="{{ $profile->language == 'mn' }}">mn</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Role</label>
                        <div class="col-lg-10">
                            <select name="role_id" class="form-control">
                                @foreach($roles as $role)
                                <option value="{{$role->id}}" selected="{{ $role->name == $profile->role->name }}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="col-lg-2">
                            <div class="checkbox checkbox-left">
                                <label>
                                    <input name="password" type="checkbox" class="styled">
                                    Change Password?
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">New password</label>
                        <div class="col-lg-10">
                            <input name="new_password" type="password" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-2">Retype New Password</label>
                        <div class="col-lg-10">
                            <input name="new_password2" type="password" class="form-control">
                        </div>
                    </div>

                    <div class="text-right">
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
@endsection
