@extends('themes.limitless.layouts.default')

@section('load')
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Groups Management</span> - Edit</h4>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Admin</a>
            <a class="breadcrumb-item" href="2_col.html">Groups</a>
            <span class="breadcrumb-item active">Edit</span>
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

<!-- Grid -->
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">

            <!-- Horizontal form -->
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.groups.update', ['id' => $group->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="title" placeholder="Enter group name..." value="{{$group->title}}" required="required" aria-required="true" invalid="true">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Parent ID</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Parent ID" name="parent_id">{{$group->parent_id}}</input>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Description</label>
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
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('admin.groups.update', ['id' => $group->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Group ID <span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Menu ID" name="parent_id">{{$group->group_id}}</input>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Menu ID</label>
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
