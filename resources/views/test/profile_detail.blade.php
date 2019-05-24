@extends('layouts.admin')

@section('load')
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Profile Details</span></h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="/"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="/profiles">Profile</a></li>
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

<div class="row">
    <div class="col-md-12">

        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Profile Detail</h5>
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

                <form method="get" class="form-horizontal" action="/profiles/{{ $profile->user->id }}/edit">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label col-lg-2">Username</label>
                            <div class="col-lg-10">
                                <span>{{ $profile->user->name }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Email</label>
                            <div class="col-lg-10">
                                <span>{{ $profile->email }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Name</label>
                            <div class="col-lg-10">
                                <span>{{ $profile->name }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Nickname</label>
                            <div class="col-lg-10">
                                <span>{{ $profile->nickname }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Language</label>
                            <div class="col-lg-10">
                                <span>{{ $profile->language }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Role</label>
                            <div class="col-lg-10">
                                <span>{{ $profile->role->name }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Created At</label>
                            <div class="col-lg-10">
                                <span>{{ $profile->created_at }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Updated At</label>
                            <div class="col-lg-10">
                                <span>{{ $profile->updated_at }}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Deleted At</label>
                            <div class="col-lg-10">
                                <span>{{ $profile->deleted_at }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div>
                                <span><img src="/storage/{{ $profile->avatar }}" width="512" style="float:right"/></span>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary"><i class="icon-pencil position-left"></i>Edit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>
</div>

@endsection

@section('script')
@endsection
