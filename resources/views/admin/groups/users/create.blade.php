

@extends('layouts.admin')

@section('load')
<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

<script type="text/javascript" src="assets/js/core/app.js"></script>
<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Starters</span> - 2 Columns</h4>
    </div>

    <div class="heading-elements">
        <a href="#" class="btn btn-labeled btn-labeled-right bg-blue heading-btn">Button <b><i class="icon-menu7"></i></b></a>
    </div>
</div>

<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
        <li><a href="2_col.html">Starters</a></li>
        <li class="active">2 columns</li>
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
    <div class="col-md-6">

        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-body">
                <form class="form-horizontal" action="" method="POST">
                    <div class="panel panel-flat">
                        <div class="panel-body">
                                <div class="form-group">
                                    <label class="control-label col-lg-2">Group ID <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="User ID" name="group_id" value="{{$group->title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-2">User ID</label>
                                    <!-- <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="Menu ID" name="menu_id">
                                    </div> -->
                                    <ul class="col-lg-10 nav nav-tabs">
                                        <li class="dropdown col-lg-12">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">User ID<span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-right col-lg-12">
                                            @foreach ($users as $user)
                                            <li><a data-toggle="tab">{{$user->username}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    </ul>
                                </div>
                        </div>
                    </div>
                    <div class="text-right" style="padding-bottom: 5px">
                        <a href="javascript:history.back()" class="btn btn-default">Back</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>

    <div class="col-md-12">
        <div class="panel panel-flat">                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>Name</th>
                            <th>Language</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>
                                <div class="text-semibold"><a href="user_link">{{$user->username}}</a></div>
                            </td>
                            <td>{{$user->email}}</td>
                            <td><span class="label label-success">{{$user->name}}</span></td>
                            <td>{{$user->language}}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a type="" class="btn btn-button" href="{{ route('admin.groups.createUser', ['group' => $group->id, 'user' => $user->id]) }}" class="btn btn-default">Attach</a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
<!-- /grid -->


@endsection

@section('script')
@endsection
