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
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add Menu to Group</span></h4>
    </div>
</div>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a class="breadcrumb-item" href="index.html"><i class="icon-home2 mr-2"></i> Home</a>
            <a class="breadcrumb-item" href="{{ route('admin.groups.index') }}">Groups</a>
            <a class="breadcrumb-item" href="{{ route('admin.groups.show', ['id' => $group->id]) }}">Group Detail</a>
            <span class="breadcrumb-item active">Add Menu to Groups</span>
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
    <div class="col-md-6">

        <!-- Horizontal form -->
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal" action="" method="POST">
                    <div class="card">
                        <div class="card-body">
                                <div class="form-group">
                                    <label class="col-form-label col-lg-2">Group ID <span class="text-danger">*</span></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="Menu ID" name="group_id" value="{{$group->title}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label col-lg-2">Menu ID</label>
                                    <!-- <div class="col-lg-10">
                                        <input type="text" class="form-control" placeholder="Menu ID" name="menu_id">
                                    </div> -->
                                    <ul class="col-lg-10 nav nav-tabs">
                                        <li class="dropdown col-lg-12">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu ID<span class="caret"></span></a>
                                        <ul class="dropdown-menu dropdown-menu-right col-lg-12">
                                            @foreach ($group->menus as $menu)
                                            <li><a data-toggle="tab">{{$menu->title}}</a></li>
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
        <!-- /horizotal form -->
    </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form class="form-horizontal" action="" method="GET">
                <div class="form-group">
                    <label class="col-form-label col-lg-1">Search type</label>
                    <div class="col-lg-11">
                        <div class="row">
                            <div class="col-lg-3">
                                <select class="form-control" id="type" name="type" type="text">
                                    <option value="title">Title</option>
                                    <option value="link">Link</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <input type="text" class="form-control" placeholder="Please search value here" name="search">
                            </div>
                            <div class="col-lg-2">
                                <select class="form-control" id="status" name="status" type="text">
                                    <option value="">All</option>
                                    @foreach(Modules\System\Entities\Menu::STATUS_ARRAY as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-control" id="visibility" name="visibility" type="text">
                                    <option value="">All</option>
                                    @foreach(Modules\System\Entities\Menu::VISIBILITY_ARRAY as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-1">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
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
                    @foreach ($menus as $menu)
                    <tr>
                        <td>{{$menu->id}}</td>
                        <td>
                            <div class="font-weight-semibold"><a href="menu_link">{{$menu->title}}</a></div>
                            <div class="text-muted">{{$menu->subtitle}}</div>
                        </td>
                        <td>{{$menu->link}}</td>
                        <td><span class="label label-success">{{$menu->status}}</span></td>
                        <td>{{$menu->visibility}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a type="" class="btn btn-button" href="{{ route('admin.groups.createMenu', ['group' => $group->id, 'menu' => $menu->id]) }}" class="btn btn-light">Attach</a>
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
