@extends('themes.limitless.layouts.default')

@section('load')

<script type="text/javascript" src="{{ admin_asset('js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ admin_asset('js/plugins/forms/selects/select2.min.js') }}"></script>

<script type="text/javascript" src="{{ admin_asset('js/core/app.js') }}"></script>
<script type="text/javascript" src="{{ admin_asset('js/pages/datatables_basic.js') }}"></script>
<script type="text/javascript" src="{{ admin_asset('js/plugins/velocity/velocity.min.js') }}"></script>
<script type="text/javascript" src="{{ admin_asset('js/plugins/velocity/velocity.ui.min.js') }}"></script>
<script type="text/javascript" src="{{ admin_asset('js/plugins/buttons/spin.min.js') }}"></script>
<script type="text/javascript" src="{{ admin_asset('js/plugins/buttons/ladda.min.js') }}"></script>

<script type="text/javascript" src="{{ admin_asset('js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ admin_asset('js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ admin_asset('js/pages/datatables_basic.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content">
    <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Group</span> Details</h4>
    </div>
</div>

<ul class="nav nav-lg nav-tabs nav-tabs-bottom">
    <li class="active"><a href="#detail-tab" data-toggle="tab"><i class="icon-users2 position-left"></i> Group Detail</a></li>
    <li><a href="#menu-tab" data-toggle="tab"><i class="icon-menu2 position-left"></i> Group Menu List</a></li>
    <li><a href="#user-tab" data-toggle="tab"><i class="icon-user position-left"></i> Group User List</a></li>
    <li><a href="#permission-tab" data-toggle="tab"><i class="icon-key position-left"></i> Group Permission List</a></li>
</ul>
<!-- /page header -->
@endsection

@section('content')

<!-- Grid -->
<div class="row">
    <div class="col-md-12 tab-content">

        <div class="tab-pane active" id="detail-tab">
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
                        <div class="form-group">
                            <label class="control-label col-lg-2">Type</label>
                            <div class="col-lg-10">
                                <label class="control-label"><span class="label label-{{ $group->typeClass() }}">{{$group->type}}</span></label>
                            </div>
                        </div>

                        <div class="text-right" style="padding-bottom: 5px">
                            <a href="javascript:history.back()" class="btn btn-default">Back</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="tab-pane" id="menu-tab">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        Group menu list
                        <a type="button" class="btn btn-primary pull-right" href="{{ route('admin.groups.showMenuGroup', ['id' => $group->id]) }}" style="color: white">Add Menu to Group</a>
                    </h5>
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
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane" id="user-tab">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        Group user list
                        <a type="button" class="btn btn-primary pull-right" href="{{ route('admin.groups.showUserGroup', ['id' => $group->id]) }}" style="color: white">Add User to Group</a>
                    </h5>
                </div>

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
                        @foreach ($group->users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    <div class="text-semibold"><a href="menu_link">{{$user->username}}</a></div>
                                </td>
                                <td>{{$user->email}}</td>
                                <td><span class="label label-success">{{$user->name}}</span></td>
                                <td>{{$user->language}}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-button" href="{{ route('admin.groups.removeUser', ['group' => $group->id, 'user' => $user->id]) }}"  class="btn btn-default">Remove</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane" id="permission-tab">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h5 class="panel-title">
                        Group permission list
                        <a type="button" class="btn btn-primary pull-right" href="{{ route('admin.groups.showPermissionGroup', ['id' => $group->id]) }}" style="color: white">Add Permission to Group</a>
                    </h5>
                </div>
                <table class="table datatable-basic">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th colspan="5">Description</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group->permissions as $permission)
                            <tr>
                                <td>{{$permission->id}}</td>
                                <td>
                                    <div class="text-semibold"><a href="menu_link">{{$permission->title}}</a></div>
                                </td>
                                <td colspan="5">{{$permission->description}}</td>
                                <td class="text-center">
                                    <div>
                                        <div class="panel panel-body border-top-primary text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn bg-slate btn-icon"><i class="icon-grid-alt"></i></button>
                                                <button type="button" class="btn bg-slate dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="{{ route('admin.groups.removePermission', ['group' => $group->id, 'permission' => $permission->id]) }}"> Remove</a></li>
                                                    <li><a href="{{ route('admin.groups.removePermission', ['group' => $group->id, 'permission' => $permission->id]) }}"> Revoke</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /grid -->


@endsection

@section('script')
<script type="text/javascript">
    $(".styled, .multiselect-container input").uniform({
        radioClass: 'choice'
    });
</script>
@endsection
