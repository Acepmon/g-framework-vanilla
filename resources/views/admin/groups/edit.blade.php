@extends('layouts.admin')

@section('load')
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
    <div class="col-md-12">
        <div class="col-md-6">

            <!-- Horizontal form -->
            <div class="panel panel-flat">
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('admin.groups.update', ['id' => $group->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="title" placeholder="Enter group name..." value="{{$group->title}}" required="required" aria-required="true" invalid="true">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Parent ID</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Parent ID" name="parent_id">{{$group->parent_id}}</input>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2">Description</label>
                            <div class="col-lg-10">
                                <textarea rows="5" cols="5" class="form-control" placeholder="Description" name="description">{{$group->description}}</textarea>
                            </div>
                        </div>

                        <div class="text-right">
                            <a href="javascript:history.back()" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /horizotal form -->

        </div>

        <div class="col-md-6">

            <!-- Horizontal form -->
            <div class="panel panel-flat">
                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('admin.groups.update', ['id' => $group->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="control-label col-lg-2">Group ID <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Menu ID" name="parent_id">{{$group->group_id}}</input>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Menu ID</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Menu ID" name="parent_id">{{$group->menu_id}}</input>
                            </div>
                        </div>
                        <div class="text-right">
                            <a href="javascript:history.back()" class="btn btn-default">Back</a>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /horizotal form -->

        </div>
    </div>
</div>
<!-- /grid -->


@endsection

@section('script')
@endsection
