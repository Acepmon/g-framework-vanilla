@extends('themes.limitless.layouts.default')

@section('load')

<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>

<!-- <script type="text/javascript" src="{{ asset('limitless/js/core/app.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/pages/datatables_basic.js') }}"></script>

<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/velocity/velocity.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/velocity/velocity.ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/buttons/spin.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/buttons/ladda.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/plugins/forms/selects/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('limitless/bootstrap4/js/pages/datatables_basic.js') }}"></script>
@endsection

@section('pageheader')
<div class="page-header-content header-elements-inline">
    <div class="page-title d-flex">
        <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Group</span> Details</h4>
    </div>
</div>

<ul class="nav nav-tabs nav-tabs-bottom">
    <li class="nav-item"><a href="#detail-tab" data-toggle="tab"><i class="icon-users2 mr-2"></i> Group Detail</a></li>
    <li class="nav-item"><a href="#menu-tab" data-toggle="tab"><i class="icon-menu2 mr-2"></i> Group Menu List</a></li>
    <li class="nav-item"><a href="#user-tab" data-toggle="tab"><i class="icon-user mr-2"></i> Group User List</a></li>
    <li class="nav-item"><a href="#permission-tab" data-toggle="tab"><i class="icon-key mr-2"></i> Group Permission List</a></li>
</ul>
<!-- /page header -->
@endsection

@section('content')

<!-- Grid -->
<div class="row">
    <div class="col-md-12 tab-content">

        <div class="tab-pane active" id="detail-tab">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="" method="POST">
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Group name<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Menu ID" name="parent_id" value="{{$group->title}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Parent ID<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Menu ID" name="parent_id" value="{{$group->parent_id}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <!-- <label class="col-form-label col-lg-2">Description</label>
                            <div class="col-lg-10">
                                <label class="col-form-label">{{$group->description}}</label>
                            </div> -->
                            <label class="col-form-label col-lg-2">Description<span class="text-danger">*</span></label>
                            <div class="col-lg-10">
                                <!-- <input type="text" class="form-control" placeholder="Menu ID" name="parent_id" value="{{$group->description}}" disabled> -->
                                <label class="col-form-label">{{$group->description}}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-lg-2">Type</label>
                            <div class="col-lg-10">
                                <label class="col-form-label"><span class="label label-{{ $group->typeClass() }}">{{$group->type}}</span></label>
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
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">
                        Group menu list
                    </h5>
                    <a type="button" class="btn btn-primary" href="{{ route('admin.groups.showMenuGroup', ['id' => $group->id]) }}" style="color: white">Add Menu to Group</a>
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
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">
                        Group user list
                    </h5>
                    <a type="button" class="btn btn-primary" href="{{ route('admin.groups.showUserGroup', ['id' => $group->id]) }}" style="color: white">Add User to Group</a>
                </div>

                <table class="table table-condensed datatable-basic">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group->users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    @include('themes.limitless.includes.user-media', $user)
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('admin.groups.removeUser', ['group' => $group->id, 'user' => $user->id]) }}" class="btn btn-xs btn-link">Remove</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane" id="permission-tab">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">
                        Group permission list
                    </h5>   
                    <a type="button" class="btn btn-primary" href="{{ route('admin.groups.showPermissionGroup', ['id' => $group->id]) }}" style="color: white">Add Permission to Group</a>
                </div>
                <table class="table table-condensed datatable-basic">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th colspan="5">Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group->permissions as $permission)
                            <tr>
                                <td>{{$permission->id}}</td>
                                <td>
                                    <div class="font-weight-semibold"><a href="{{ route('admin.permissions.show', [$permission->id]) }}">{{$permission->title}}</a></div>
                                </td>
                                <td colspan="5">{{$permission->description}}</td>
                                <td>
                                    <a href="{{ route('admin.groups.removePermission', ['group' => $group->id, 'permission' => $permission->id]) }}" class="btn btn-link btn-xs">Remove</a>
                                    <a href="{{ route('admin.groups.removePermission', ['group' => $group->id, 'permission' => $permission->id]) }}" class="btn btn-link btn-xs">Revoke</a>
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
