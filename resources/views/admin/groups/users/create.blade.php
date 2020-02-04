@extends('themes.limitless.layouts.default')

@section('load')
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>

<!-- <script type="text/javascript" src="{{ asset('limitless/js/core/app.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/pages/datatables_basic.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add User to Groups</span></h4>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.groups.index') }}">Groups</a>
            <a class="breadcrumb-item" href="{{ route('admin.groups.show', ['id' => $group->id]) }}">Group Detail</a>
            <span class="breadcrumb-item active">Add User to Groups</span>
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
<!-- /page header -->
@endsection

@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="" method="POST">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">Group ID <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" placeholder="User ID" name="group_id" value="{{$group->title}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-2">User ID</label>
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
                        <a href="javascript:history.back()" class="btn btn-light">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form class="form-horizontal" action="" method="GET">
            <div class="form-group row">
                <label class="col-form-label col-lg-1">Search type</label>
                <div class="col-lg-11">
                    <div class="row">
                        <div class="col-lg-3">
                            <select class="form-control" id="type" name="type" type="text">
                                <option value="username">Username</option>
                                <option value="email">E-mail</option>
                                <option value="name">Name</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" placeholder="Please search value here" name="search">
                        </div>
                        <div class="col-lg-3">
                            <select class="form-control" id="lang" name="lang" type="text">
                                <option value="">All</option>
                                @foreach(Modules\System\Entities\User::LANG_ARRAY as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <table class="table datatable-basic">
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
                    <div class="font-weight-semibold"><a href="user_link">{{$user->username}}</a></div>
                </td>
                <td>{{$user->email}}</td>
                <td><span class="label label-success">{{$user->name}}</span></td>
                <td>{{$user->language}}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <a type="" class="btn btn-button" href="{{ route('admin.groups.createUser', ['group' => $group->id, 'user' => $user->id]) }}" class="btn btn-light">Attach</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
@endsection
