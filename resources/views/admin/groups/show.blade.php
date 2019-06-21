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
                    <div class="form-group">
                        <label class="control-label col-lg-2">Group name<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Menu ID" name="parent_id" value="{{$group->title}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-2">Parent ID<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="Menu ID" name="parent_id" value="{{$group->parent_id}}" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <!-- <label class="control-label col-lg-2">Description</label>
                        <div class="col-lg-10">
                            <label class="control-label">{{$group->description}}</label>
                        </div> -->
                        <label class="control-label col-lg-2">Description<span class="text-danger">*</span></label>
                        <div class="col-lg-10">
                            <!-- <input type="text" class="form-control" placeholder="Menu ID" name="parent_id" value="{{$group->description}}" disabled> -->
                            <label class="control-label">{{$group->description}}</label>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Type</label>
                    <div class="col-lg-10">
                        <label class="control-label"><span class="label label-{{ $group->typeClass() }}">{{$group->type}}</span></label>
                    </div>
                </div>

                <div class="text-right" style="padding-bottom: 5px">
                    <a href="javascript:history.back()" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
        <!-- /horizotal form -->

    </div>

    <div class="col-md-12">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h1 class="panel-title">
                    Group menu list
                    <a type="button" class="btn btn-primary pull-right" href="{{ route('admin.groups.showMenuGroup', ['id' => $group->id]) }}" type="btn btn-primary">Add Menu to Group</a>
                </h1>
            </div>

            <table class="table datatable-basic">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Link</th>
                        <th>Status</th>
                        <th>Visibility</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($group->menus as $menu)
                    <tr>
                        <td>{{$menu->id}}</td>
                        <td>
                            <div class="text-semibold"><a href="menu_link">{{$menu->title}}</a></div>
                            <div class="text-muted">{{$menu->subtitle}}</div>
                        </td>
                        <td>{{$menu->link}}</td>
                        <td><span class="label label-success">{{$menu->status}}</span></td>
                        <td>{{$menu->visibility}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a type="button" class="btn btn-button" href="{{ route('admin.groups.removeMenu', ['group' => $group->id, 'menu' => $menu->id]) }}"  class="btn btn-default">Remove</a>
                                <button type="button" class="btn btn-default">Details</button>
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
